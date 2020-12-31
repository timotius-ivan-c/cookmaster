<?php

use Illuminate\Database\Seeder;

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
            ['name' => 'Western']
        ]);
    }
}
