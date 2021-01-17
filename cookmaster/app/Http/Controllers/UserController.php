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
    public function view_profile($id)
    {
        $chef = User::where('id', $id)->get();
        $member = Auth::user();

        $following = [];

        if ($member) {
            $following = Following::where(['member_id' => $member->id, 'chef_id' => $chef->first()->id])->get();
        }
        return View::make('view_user_profile')->with(['user' => $chef, 'following' => $following])->render();
    }

    public function view_top_chefs()
    {
        $role = Role::where('name', "chef")->first();
        $chefs = User::where('role_id', $role->id)->orderBy('fame', 'desc')->take(20)->get();
        return view('leaderboard', ['users' => $chefs, 'type' => 'chef']);
    }

    /***need to change view name */
    public function view_top_contributors()
    {
        $role = Role::where('name', "contributor")->first();
        $contributors = User::where('role_id', $role->id)->orderBy('fame', 'desc')->take(20)->get();
        return view('leaderboard', ['users' => $contributors, 'type' => 'contributor']);
    }

    public function edit_profile()
    {
        $user = User::where('id', Auth()->user()->id)->get();
        return view('edit_profile', ['user' => $user]);
    }

    public function edited_profile(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        if (Auth()->user()->email != $request->email) {
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
            User::where('id', Auth()->user()->id)->update([
                'email' => $request->email,
            ]);
        }
        if (Auth()->user()->name != $request->name) {
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
            ]);
            User::where('id', Auth()->user()->id)->update([
                'name' => $request->name,
            ]);
        }
        return redirect()->back();
    }

    public function view_subscriptions()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('login');
        }

        $subscription = Subscription::where('member_id', $user->id)->with('chef')->with('recipe')->where('end', '>', Carbon::now())->where('start', '<', Carbon::now())->get();
        // dd($subscription);
        return view('view_user_subscription', ['subscriptions' => $subscription]);
    }

    ///////////////////////////////////////////////////////////////////////////////////////later
    public function follow(Request $request)
    {
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
        $exist = (sizeof(DB::table('followings')->where(['member_id' => $member_id, 'chef_id' => $chef_id])->get()) > 0);

        if ($exist) {
            try {
                //code...
                $following = Following::where(['member_id' => $member_id, 'chef_id' => $chef_id])->delete();
                if ($following > 0) $success = true;
            } catch (\Throwable $th) {
                $out = new \Symfony\Component\Console\Output\ConsoleOutput();
                $out->writeln($th);
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
                $out->writeln($th);
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

    public function test_follow($id)
    {
        $chef = User::where('id', $id)->get();
        $member = Auth::user();

        $following = Following::where(['member_id' => $member->id, 'chef_id' => $chef->first()->id])->get();
        return View::make('test_follow')->with(['user' => $chef, 'following' => $following])->render();
    }
    /////////////////////////////////////////////////////////////////////////////////////////////

    public function home()
    {

        // $member = Role::where('name',"member")->first();
        $best_recipes = Recipe::orderBy('average_rating', 'desc')->take(3)->get();
        $hot_recipes = Recipe::orderBy('review_count', 'desc')->take(3)->get();

        if (Auth::guest()) {
            return view('welcome', ['hot_recipes' => $hot_recipes, 'best_recipes' => $best_recipes]);
        } else if (Auth::user()->role_id == 1) {
            $user = User::find(Auth()->user()->id);
            //get following id
            $following_id = $user->following()->get()->pluck('id');
            $active_subscriptions = Subscription::where('member_id', $user->id)->where('end', '>', Carbon::now())->get();
            $chef_id = User::whereIn('id', $active_subscriptions->pluck('chef_id'))->get();
            $recipes = Recipe::whereIn('author_id', $following_id)->orderBy('publish_date', 'desc')->where('recipe_type', 1)->take(5)->get();
            $subscription_recipes = Recipe::whereIn('author_id', $chef_id->pluck('id'))->where('recipe_type', 2)->orderBy('publish_date', 'desc')->take(5)->get();
            return view('welcome', ['user' => $user, 'recipes' => $recipes, 'hot_recipes' => $hot_recipes, 'best_recipes' => $best_recipes, 'subscriptions' => $subscription_recipes]);
        } else if (Auth::user()->role_id == 2 || Auth::user()->role_id == 3) {
            $user = User::find(Auth()->user()->id);
            //get following id
            $following_id = $user->following()->get()->pluck('id');
            $recipes = Recipe::whereIn('author_id', $following_id)->get();
            $my_recipes = Recipe::where('author_id', Auth()->user()->id);
            $earnings = Transaction::where('recipient_id', Auth()->user()->id)->where('transaction_type_id', 2)->sum('amount');
            $total_subscriber = count(Subscription::where('chef_id', Auth()->user()->id)->get());
            return view('welcome', ['user' => $user, 'my_recipes' => $my_recipes, 'recipes' => $recipes, 'hot_recipes' => $hot_recipes, 'best_recipes' => $best_recipes, 'earnings' => $earnings, 'total_subscriber' => $total_subscriber])->render();
        }
    }

    public function earnings()
    {
        $id = Auth::user()->id;
        $subscription = Subscription::where('chef_id', $id)->get();
        $count = count($subscription);
        $transactions = Transaction::where('recipient_id', $id)->where('transaction_type_id', 2); 
        $total_earnings = $transactions->sum('amount');
        $transaction_details = $transactions->get();
        return view('earning', ['subscription' => $subscription,'transaction_details'=>$transaction_details, 'total_earnings' => $total_earnings, 'count' => $count]);
    }

    public function view_guest_chef()
    {
        // featured chef based on highest average rating
        $recipe = Recipe::orderBy('average_rating', 'desc')->limit(1)->get();
        $author = User::where('id', $recipe[0]->author_id)->get();

        return view('guest_chef', ['recipe' => $recipe[0], 'author' => $author[0]]);
    }

    public function view_community()
    {
        $recipes = Recipe::where('recipe_type', 1)->inRandomOrder()->limit(9)->get();

        return view('community', ['recipes' => $recipes]);
    }
}
