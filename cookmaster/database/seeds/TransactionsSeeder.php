<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            ['recipient_id' => NULL, 'sender_id' => 6, 'token' => Str::random(10), 'amount' => 150000, 'date' => Carbon::create(2020, 12, 16,  9, 01, 01, 'Asia/Jakarta'), 'message' => 'Top-up', 'transaction_type_id' => 1],
            ['recipient_id' => NULL, 'sender_id' => 6, 'token' => Str::random(10), 'amount' => 500000, 'date' => Carbon::create(2020, 12, 17,  10, 01, 01, 'Asia/Jakarta'), 'message' => 'Top-up', 'transaction_type_id' => 1],
            ['recipient_id' => 5, 'sender_id' => 6, 'token' => Str::random(10), 'amount' => 150000, 'date' => Carbon::create(2020, 12, 18,  10, 30, 14, 'Asia/Jakarta'), 'message' => 'Subscribed to Frank Conner', 'transaction_type_id' => 1],
            ['recipient_id' => NULL, 'sender_id' => 6, 'token' => Str::random(10), 'amount' => 1000000, 'date' => Carbon::create(2020, 12, 20,  20, 02, 00, 'Asia/Jakarta'), 'message' => 'Top-up', 'transaction_type_id' => 1],
            ['recipient_id' => NULL, 'sender_id' => 6, 'token' => Str::random(10), 'amount' => 150000, 'date' => Carbon::create(2020, 12, 25,  21, 31, 11, 'Asia/Jakarta'), 'message' => 'Top-up', 'transaction_type_id' => 1],
            ['recipient_id' => NULL, 'sender_id' => 6, 'token' => Str::random(10), 'amount' => 175000, 'date' => Carbon::create(2020, 12, 26,  10, 51, 14, 'Asia/Jakarta'), 'message' => 'Top-up', 'transaction_type_id' => 1],
            ['recipient_id' => NULL, 'sender_id' => 6, 'token' => Str::random(10), 'amount' => 50000, 'date' => Carbon::create(2020, 12, 31,  23, 58, 44, 'Asia/Jakarta'), 'message' => 'Top-up', 'transaction_type_id' => 1],   
            ['recipient_id' => 10, 'sender_id' => 6, 'token' => Str::random(10), 'amount' => 100000, 'date' => Carbon::create(2021, 01, 01,  15, 32, 42, 'Asia/Jakarta'), 'message' => 'Subscribed to William Poernomo', 'transaction_type_id' => 1],
            
            ['recipient_id' => NULL, 'sender_id' => 7, 'token' => Str::random(10), 'amount' => 150000, 'date' => Carbon::create(2021, 01, 01,  9, 11, 11, 'Asia/Jakarta'), 'message' => 'Top-up', 'transaction_type_id' => 1],
            ['recipient_id' => 10, 'sender_id' => 7, 'token' => Str::random(10), 'amount' => 100000, 'date' => Carbon::create(2020, 12, 31,  23, 58, 44, 'Asia/Jakarta'), 'message' => 'Top-up', 'transaction_type_id' => 1],
        ]);
    }
}
