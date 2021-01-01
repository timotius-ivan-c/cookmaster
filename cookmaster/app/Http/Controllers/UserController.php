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
}
