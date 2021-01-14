<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\User;
use App\Recipe;
use App\Role;
use App\Transaction;
use App\Subscription;
use App\Following;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function view_profile($id){
        $chef = User::where('id', $id)->get();
        $member = Auth::user();

        $following = [];
        
        if ($member) {
            $following = Following::where(['member_id'=>$member->id, 'chef_id'=>$chef->first()->id])->get();
        }
        return View::make('view_user_profile')->with(['user'=>$chef, 'following'=>$following])->render();
    }

    public function view_top_chefs(){
        $role = Role::where('name',"chef")->first();
        $chefs = User::where('role_id', $role->id)->orderBy('fame','desc')->take(20)->get();
        return view('leaderboard',['users'=>$chefs,'type'=>'chef']);
    }

    /***need to change view name */
    public function view_top_contributors(){
        $role = Role::where('name',"contributor")->first();
        $contributors = User::where('role_id', $role->id)->orderBy('fame','desc')->take(20)->get();
        return view('leaderboard',['users'=>$contributors,'type'=>'contributor']);
    }
    
    public function edit_profile(){
        $user = User::where('id', Auth()->user()->id)->get();
        return view('edit_profile',['user'=>$user]);
    }
    
    public function edited_profile(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        if(Auth()->user()->email!=$request->email)
        {
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
            User::where('id', Auth()->user()->id)->update([
                'email' => $request->email,
            ]);
        }
        if(Auth()->user()->name!=$request->name)
        {
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
            ]);
            User::where('id', Auth()->user()->id)->update([
                'name' => $request->name,
            ]);    
        }
        return redirect()->back();
    }

    public function view_subscriptions(){
        $user = Auth::user();

        if (!$user) {
            return redirect('login');
        }

        $subscription = Subscription::where('member_id',$user->id)->with('chef')->with('recipe')->where('end', '>', Carbon::now())->where('start', '<', Carbon::now())->get();
        // dd($subscription);
        return view('view_user_subscription', ['subscriptions'=>$subscription]);
    }

///////////////////////////////////////////////////////////////////////////////////////later
    public function follow(Request $request ){
        // dd($request);
        $member = Auth::user();

        if (!$member) {
            $response = array(
                'status' => 'fail',
                'msg' => $request->input('message'),
            );
            return response()->json($response);
        }

        $member_id = Auth::user()->id;
        $success = false;

        $following = [];
        

        $chef_id = $request->input('message');
        // print_r($chef_id);
        // die();
        // DB::table('followings')->insert([
            //     ['chef_id' => $chef_id,
            //     'member_id' => $member_id,
            //     'created_at' => Carbon::now()]
            // ]);
        $exist = (sizeof(DB::table('followings')->where(['member_id'=>$member_id, 'chef_id'=>$chef_id])->get()) > 0);
        
        if ($exist) {
            try {
                //code...
                $following = Following::where(['member_id'=>$member_id, 'chef_id'=>$chef_id])->delete();
                if ($following > 0) $success = true;
            } catch (\Throwable $th) {
                $out = new \Symfony\Component\Console\Output\ConsoleOutput();
                $out-> writeln($th);
                throw $th;
                $success = false;
            }
        } else {
            try {
                //code...
                $newFollowing = new Following();
                $newFollowing->chef_id = $chef_id;
                $newFollowing->member_id = $member_id;
                $newFollowing->subscribed_since = Carbon::now();
                $newFollowing->save();
                $success = true;
            } catch (\Throwable $th) {
                $out = new \Symfony\Component\Console\Output\ConsoleOutput();
                $out-> writeln($th);
                throw $th;
                $success = false;
            }
        }
        
        if ($success) {
            $response = array(
                'status' => 'success',
                'msg' => $request->input('message'),
            );
        } else {
            $response = array(
                'status' => 'fail',
                'msg' => $request->input('message'),
            );
        }

        return response()->json($response);
    }

    public function test_follow($id){
        $chef = User::where('id', $id)->get();
        $member = Auth::user();

        $following = Following::where(['member_id'=>$member->id, 'chef_id'=>$chef->first()->id])->get();
        return View::make('test_follow')->with(['user'=>$chef, 'following'=>$following])->render();
    }
/////////////////////////////////////////////////////////////////////////////////////////////

    public function home(){
        $user = User::find(Auth()->user()->id);
        
        //get following id
        $following_id = $user->following()->get()->pluck('id');
        $recipes = Recipe::whereIn('author_id',$following_id)->get();
        
        $member = Role::where('name',"member")->first();
        $best_recipes = Recipe::orderBy('average_rating','desc')->take(3);
        $hot_recipes = Recipe::orderBy('review_count','desc')->take(3);

        if(Auth()->user()->role_id == $member->id){
            return view('view_home',['recipes'=>$recipes, 'hot_recipes'=>$hot_recipes,'best_recipes'=>$best_recipes]);
        }
        else{
            $my_recipes = Recipe::where('author_id',Auth()->user()->id);
            $earnings = Transaction::where('recipient_id',Auth()->user()->id)->where('transaction_type_id',2)->sum('amount');
            return view('welcome',['my_recipes'=>$my_recipes,'recipes'=>$recipes, 'hot_recipes'=>$hot_recipes,'best_recipes'=>$best_recipes,'earnings'=>$earnings])->render();
        }
    }

    public function earnings($id){
        $subscription = Subscription::where('chef_id',$id);
        $total_earnings = Transaction::where('recipient_id',$id)->where('transaction_type_id',2)->sum('amount');
        return view('earning',['subscription'=>$subscription,'total_earnings'=>$total_earnings]);
    }


}
