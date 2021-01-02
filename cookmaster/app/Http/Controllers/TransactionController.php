<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function view_transaction_history(){
        $transactions = Transaction::where('sender_id', Auth::user()->id)->get();

        return view('view_transaction_history', ['transactions' => $transactions]);
    }
}
