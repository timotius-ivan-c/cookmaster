<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipe_categories')->insert([
            ['name' => 'Asian'],
            ['name' => 'Chinese'],
            ['name' => 'Western'],
            ['name' => 'Indian'],
            ['name' => 'Arabic'],
        ]);
    }
}
