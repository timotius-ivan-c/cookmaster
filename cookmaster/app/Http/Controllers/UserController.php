<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\User;
use App\Recipe;
use App\Role;

class UserController extends Controller
{
    //
    public function view_profile($id){
        $user = User::where('id', $id)->get();
        return View::make('view_user_profile')->with('user', $user)->render();
    }

    public function view_top_chefs(){
        $role = Role::where('name',"chef")->first();
        $chefs = User::where('role_id', $role->id)->orderBy('fame','desc')->take(20)->get();
        return view('chef_leaderboard',['chefs'=>$chefs]);
    }

    /***need to change view name */
    public function view_top_members(){
        $role = Role::where('name',"contributor")->first();
        $contributors = User::where('role_id', $role->id)->orderBy('fame','desc')->take(20)->get();
        return view('contributor_leaderboard',['contributors'=>$contributors]);
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


}
