<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tiers')->insert([
            ['name' => 'Classic'], 
            ['name' => 'Bronze'],
            ['name' => 'Silver'],
            ['name' => 'Gold'],
            ['name' => 'Platinum'],
            ['name' => 'Diamond']
        ]);
    }
}
