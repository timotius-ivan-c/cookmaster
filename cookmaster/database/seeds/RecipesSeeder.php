<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            ['author_id' => 10, 'name' => 'Har Gow', 'image' => 'Har_Gow.jpg', 'review_count' => 31, 'average_rating' => 4.89, 'publish_date' => Carbon::create(2020, 9, 29,  12, 31, 11, 'Asia/Jakarta'), 'recipe_type' => 2, 'recipe_category_id' => 1],
            ['author_id' => 10, 'name' => 'Chinese Deviled Eggs', 'image' => 'Deviled_Eggs.jpg', 'review_count' => 31, 'average_rating' => 4.83, 'publish_date' => Carbon::create(2019, 7, 17,  8, 11, 21, 'Asia/Jakarta'), 'recipe_type' => 1, 'recipe_category_id' => 1],
            ['author_id' => 10, 'name' => 'Peanut Butter Cookies', 'image' => 'PB_Cookies.jpg', 'review_count' => 165, 'average_rating' => 4.85, 'publish_date' => Carbon::create(2020, 12, 30,  18, 27, 03, 'Asia/Jakarta'), 'recipe_type' => 1, 'recipe_category_id' => 3],
            ['author_id' => 10, 'name' => 'Parmesan Crusted Chicken', 'image' => 'Parmesan_Chicken.jpg', 'review_count' => 18, 'average_rating' => 5.00, 'publish_date' => Carbon::create(2020, 10, 16,  8, 11, 12, 'Asia/Jakarta'), 'recipe_type' => 1, 'recipe_category_id' => 3],
            ['author_id' => 10, 'name' => 'Oreo Truffles', 'image' => 'Oreo_Truffles.jpg', 'review_count' => 15, 'average_rating' => 4.88, 'publish_date' => Carbon::create(2019, 8, 15,  19, 32, 11, 'Asia/Jakarta'), 'recipe_type' => 1, 'recipe_category_id' => 3],
        ]);
    }
}
