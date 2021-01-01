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
            ['author_id' => 5, 'name' => 'Classic Fried Rice', 'image' => 'Fried_Rice.jpg', 'review_count' => 15, 'average_rating' => 5, 'publish_date' => Carbon::create(2020, 8, 16,  9, 01, 01, 'Asia/Jakarta'), 'recipe_type' => 1, 'recipe_category_id' => 1],
            ['author_id' => 5, 'name' => ' Honey Lime Chicken Thighs', 'image' => ' Honey_Lime_Chicken_Thighs.jpg', 'review_count' => 28, 'average_rating' => 4, 'publish_date' => Carbon::create(2019, 9, 15,  9, 03, 30, 'Asia/Jakarta'), 'recipe_type' => 1, 'recipe_category_id' => 2],
            ['author_id' => 5, 'name' => 'Tofu Avocado Salad', 'image' => 'Tofu_Avocado.jpg', 'review_count' => 23, 'average_rating' => 3, 'publish_date' => Carbon::create(2020, 8, 17,  23, 45, 01, 'Asia/Jakarta'), 'recipe_type' => 2, 'recipe_category_id' => 3],
            ['author_id' => 5, 'name' => 'Spaghetti Carbonara', 'image' => 'spaghetti_carbonara.jpg', 'review_count' => 67, 'average_rating' => 4, 'publish_date' => Carbon::create(2020, 9, 24,  14, 15, 15, 'Asia/Jakarta'), 'recipe_type' => 1, 'recipe_category_id' => 3],
            ['author_id' => 5, 'name' => 'Peanut Noodles', 'image' => 'peanut-sauce-noodles.jpg', 'review_count' => 49, 'average_rating' => 4, 'publish_date' => Carbon::create(2020, 9, 14,  9, 30, 01, 'Asia/Jakarta'), 'recipe_type' => 2, 'recipe_category_id' => 1],
            ['author_id' => 10, 'name' => 'Har Gow', 'image' => 'Har_Gow.jpg', 'review_count' => 31, 'average_rating' => 4.89, 'publish_date' => Carbon::create(2020, 9, 29,  12, 31, 11, 'Asia/Jakarta'), 'recipe_type' => 2, 'recipe_category_id' => 1],
            ['author_id' => 10, 'name' => 'Chinese Deviled Eggs', 'image' => 'Deviled_Eggs.jpg', 'review_count' => 31, 'average_rating' => 4.83, 'publish_date' => Carbon::create(2019, 7, 17,  8, 11, 21, 'Asia/Jakarta'), 'recipe_type' => 1, 'recipe_category_id' => 1],
            ['author_id' => 10, 'name' => 'Peanut Butter Cookies', 'image' => 'PB_Cookies.jpg', 'review_count' => 165, 'average_rating' => 4.85, 'publish_date' => Carbon::create(2020, 12, 30,  18, 27, 03, 'Asia/Jakarta'), 'recipe_type' => 1, 'recipe_category_id' => 3],
            ['author_id' => 10, 'name' => 'Parmesan Crusted Chicken', 'image' => 'Parmesan_Chicken.jpg', 'review_count' => 18, 'average_rating' => 5.00, 'publish_date' => Carbon::create(2020, 10, 16,  8, 11, 12, 'Asia/Jakarta'), 'recipe_type' => 1, 'recipe_category_id' => 3],
            ['author_id' => 10, 'name' => 'Oreo Truffles', 'image' => 'Oreo_Truffles.jpg', 'review_count' => 15, 'average_rating' => 4.88, 'publish_date' => Carbon::create(2019, 8, 15,  19, 32, 11, 'Asia/Jakarta'), 'recipe_type' => 1, 'recipe_category_id' => 3],
            ['author_id' => 14, 'name' => 'Red Braised Pork Belly', 'image' => 'Braised_Pork_Belly.jpg', 'review_count' => 10, 'average_rating' => 4.90, 'publish_date' => Carbon::create(2018, 1, 1,  23, 30, 03, 'Asia/Jakarta'), 'recipe_type' => 1, 'recipe_category_id' => 2],
            ['author_id' => 14, 'name' => '', 'image' => '', 'review_count' => 15, 'average_rating' => 4.88, 'publish_date' => Carbon::create(2019, 8, 15,  19, 32, 11, 'Asia/Jakarta'), 'recipe_type' => 1, 'recipe_category_id' => 2],
            ['author_id' => 15, 'name' => '', 'image' => '', 'review_count' => 15, 'average_rating' => 4.88, 'publish_date' => Carbon::create(2019, 8, 15,  19, 32, 11, 'Asia/Jakarta'), 'recipe_type' => 1, 'recipe_category_id' => 2],
            ['author_id' => 15, 'name' => '', 'image' => '', 'review_count' => 15, 'average_rating' => 4.88, 'publish_date' => Carbon::create(2019, 8, 15,  19, 32, 11, 'Asia/Jakarta'), 'recipe_type' => 1, 'recipe_category_id' => 2],
            ['author_id' => 15, 'name' => '', 'image' => '', 'review_count' => 15, 'average_rating' => 4.88, 'publish_date' => Carbon::create(2019, 8, 15,  19, 32, 11, 'Asia/Jakarta'), 'recipe_type' => 1, 'recipe_category_id' => 2],
        ]);
    }
}
