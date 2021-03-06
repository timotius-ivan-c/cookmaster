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
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Type\Integer;

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

       // Update balance and tier
       $user_balance = User::select('balance')->where('id', $request->id)->first();
       $user_lifetime_topup = User::select('lifetime_topup')->where('id', $request->id)->first(); 
       $curr_lifetime_topup = $user_lifetime_topup->lifetime_topup + $request->amount; 
       $tier = null;

       if($curr_lifetime_topup < 500000){
           $tier = 1;
       } else if($curr_lifetime_topup >= 500000 && $curr_lifetime_topup < 1000000){
           $tier = 2; 
       } else if($curr_lifetime_topup >= 1000000 && $curr_lifetime_topup < 2000000){
           $tier = 3;
       } else if ($curr_lifetime_topup >= 2000000 && $curr_lifetime_topup < 5000000){
           $tier = 4;
       } else if($curr_lifetime_topup >= 5000000 && $curr_lifetime_topup < 10000000){
           $tier = 5;
       } else if($curr_lifetime_topup >= 10000000){
           $tier = 6; 
       }

       User::where('id', $request->id)->update([
           'balance' =>  $user_balance->balance + $request->amount,
           'lifetime_topup' => $user_lifetime_topup->lifetime_topup + $request->amount,
           'tier_id' => $tier
       ]);

       // Create new transaction
       Transaction::where('sender_id', $request->id)->insert([
           'recipient_id' => NULL,
           'sender_id' => $request->id,
           'token' => Str::random(10),
           'amount' => $request->amount,
           'date' => Carbon::now(new \DateTimeZone('Asia/Jakarta')), 
           'message' => "Added ".strval($request->amount)." to ".Auth::user()->name."'s balance",
           'transaction_type_id' => 1
       ]);
        
        return redirect()->action([TransactionController::class,'view_transaction_history']);
    }

    public function view_subscribe_page(User $user){
        
        // check if user is chef
        $target_user = User::where('id', $user->id)->first();
        if($target_user->role_id == 1){
            return redirect()->back()->with('message', "This user is neither a contributor nor a chef!"); 
        } else {
            $chef = User::where('id', $user->id)->first();
            $member = User::where('id', Auth::user()->id)->first();
                    
            return view('view_subscribe_page', ['chef' => $chef, 'member' => $member]);
        }
    }

    public function pay_subscription(Request $request) {
        $validate = Validator::make($request->all(), [
            'id' => 'required|exists:users,id',
            'duration' => ['required', Rule::in(1, 3, 6, 12, 24)],
        ]);
        
        if ($validate->fails()) {
            return redirect()->back(302, [], true)->withErrors($validate->errors());
        }

        $duration = $request->input('duration');
        $id = $request->input('id');
        $user_id = Auth::id();
        
        $subscribe_to = User::where('id',$id)->first();
        $subscriber = User::find($user_id);

        // verify that the user being subscribed to is either contributor or chef
        if ($subscribe_to->role_id != 1) {
            // if subscribing to contributor, cost=15000 per month
            if($subscribe_to->role_id == 2) {
                $amount = 15000 * $duration;
                $is_enough_balance = ($subscriber->balance > $amount);
            // if subscribing to chef, cost=30000 per month
            } else {
                $amount = 30000 * $duration;
                $is_enough_balance = ($subscriber->balance > $amount);
            }
            
            if ($is_enough_balance) {
                $now = Carbon::now();
                $new_transaction = new Transaction;
                $new_transaction->recipient_id = $subscribe_to->id;
                $new_transaction->sender_id = $subscriber->id;
                $new_transaction->token = Str::random(10);
                $new_transaction->amount = $amount;
                $new_transaction->date = $now;
                $new_transaction->message = "Subscribe to ".$subscribe_to->name.". Duration ".$duration." month(s)";
                $new_transaction->transaction_type_id = 2;
                $new_transaction->save();

                $transaction_id = $new_transaction->id;

                $subscriber->balance = $subscriber->balance - $amount;
                $subscribe_to->balance = $subscribe_to->balance + $amount;

                $subscriber->save();
                $subscribe_to->save();

                // check if user already have ongoing subs to the chef.
                $active_subscription = Subscription::where('chef_id', $id)
                                                        ->where('member_id', $user_id)
                                                        ->orderBy('end','desc')
                                                        ->first();
                $start = Carbon::now();
                $end = Carbon::now()->addMonths($duration);

                if(!empty($active_subscription)) {
                    if($active_subscription->end > $now) {
                        $start = $active_subscription->end;
                        $end = Carbon::parse($active_subscription->end)->addMonths($duration);
                    }
                } else {
                     // default start and end datetimes is now and now+duration.
                    $start = $now;
                    $end = Carbon::now()->addMonths($duration);
                }

                $new_sub = new Subscription;
                $new_sub->transaction_id = $transaction_id;
                $new_sub->chef_id = $id;
                $new_sub->member_id = $user_id;
                $new_sub->start = $start;
                $new_sub->duration = $duration;
                $new_sub->end = $end;

                $new_sub->save();
                
                if ($active_subscription) {
                    return redirect()->action([TransactionController::class,'view_transaction_history'])
                        ->with('success', "Subscription extended!");
                }
                
                return redirect()->action([TransactionController::class,'view_transaction_history'])
                    ->with('success', "Subscription started!");
                
            } else {
                return redirect()->back()->with('error', "Not enough balance. Please top up!");
            }

            

        } else {
            return redirect()->back()->with('error', "The user you are subscribing to is not contributor or chef.");
        }
        
    }
}
