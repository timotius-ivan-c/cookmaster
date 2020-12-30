<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(TiersSeeder::class);
        $this->call(TransactionTypesSeeder::class);
        $this->call(RecipeCategoriesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(RecipesSeeder::class);
        $this->call(ReviewsSeeder::class);
        $this->call(FavoritedRecipesSeeder::class);
        $this->call(FollowingsSeeder::class);
        $this->call(RecipeDetailIngredientsSeeder::class);
        $this->call(RecipeDetailStepsSeeder::class);
        $this->call(TransactionsSeeder::class);
        $this->call(SubscriptionsSeeder::class);
    }
}
