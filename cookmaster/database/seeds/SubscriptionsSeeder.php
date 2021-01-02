<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert([
            ['transaction_id' => 4, 'chef_id' => 5, 'member_id' => 6, 'start' => Carbon::create(2020, 12, 18,  10, 30, 14, 'Asia/Jakarta'), 'duration' => 12, 'end' => Carbon::create(2021, 12, 18,  10, 30, 14, 'Asia/Jakarta')],
            ['transaction_id' => 8, 'chef_id' => 10, 'member_id' => 6, 'start' => Carbon::create(2021, 01, 01,  15, 32, 42, 'Asia/Jakarta'), 'duration' => 12, 'end' => Carbon::create(2022, 01, 01,  15, 32, 42, 'Asia/Jakarta')],
            ['transaction_id' => 10, 'chef_id' => 10, 'member_id' => 7, 'start' => Carbon::create(2020, 12, 31,  23, 58, 44, 'Asia/Jakarta'), 'duration' => 12, 'end' => Carbon::create(2020, 12, 31,  23, 58, 44, 'Asia/Jakarta')],
        ]);
    }
}
