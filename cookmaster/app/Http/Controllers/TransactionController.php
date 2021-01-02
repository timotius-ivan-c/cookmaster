<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\Tier;
use App\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    // ini kira2 yang mau ditampilin, klo misalnya kelebihan/krg kabarin aja, gw benerin -jessica

    public function view_transaction_history(){
        $transactions = Transaction::where('sender_id', Auth::user()->id)->get();

        return view('view_transaction_history', ['transactions' => $transactions]);
    }

    public function view_topup_page(){

        // user data 
        $user_data = User::select('users.id as user_id', 'users.name as username', 'balance', 'fame', 'free_recipes_count', 'paid_recipes_count', 'tiers.name as tier_name', 'roles.name as role')->where('users.id', Auth::user()->id)->join('tiers', 'users.tier_id', '=', 'tiers.id')->join('roles', 'users.role_id', '=', 'roles.id')->first();

        return view('view_topup_page', ['data' => $user_data]);
    }

    public function topup(Request $request){
       $validate = Validator::make($request->all(), [
           'id' => 'required|exists:users,id',
           'amount' => 'required|gte:10000'
       ]); 

       if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors());
       }

       // Update balance
       $user_balance = User::select('balance')->where('id', $request->id)->first();

       User::where('id', $request->id)->update([
           'balance' =>  $user_balance->balance + $request->amount
       ]);

       // Create new transaction
       Transaction::where('sender_id', $request->id)->insert([
           'recipient_id' => NULL,
           'sender_id' => $request->id,
           'token' => Str::random(10),
           'amount' => $request->amount,
           'date' => Carbon::now(new \DateTimeZone('Asia/Jakarta')), 
           'message' => $request->message,
           'transaction_type_id' => 1
       ]);
        
        return redirect()->action([TransactionController::class,'view_transaction_history']);
    }

    public function view_subscribe_page(User $user){
        
        $chef = User::where('id', $user->id)->first();
        
        return view('view_subscribe_page', ['chef' => $chef]);
    }
}
