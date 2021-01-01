<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    //
    public function view_profile($id){
        $user = User::where('id', $id)->first();
        return view('view_user_profile',['user'=>$user]);
    }

    public function view_top_chefs(){
        $role = Role::where('name',"chef")->first();
        $chefs = User::where('role_id', $role->id)->orderBy('fame','desc')->take(20)->get();
        return view('chef_leaderboard',['chefs'=>$chefs]);
    }
}
