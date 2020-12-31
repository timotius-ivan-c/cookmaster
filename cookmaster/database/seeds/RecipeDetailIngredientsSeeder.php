<?php

use Illuminate\Database\Seeder;

class RecipeDetailIngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipe_detail_ingredients')->insert([
            ['recipe_id' => '1', 'name' => 'Eggs', 'notes' => '3 large'],
            ['recipe_id' => '1', 'name' => 'neutral oil', 'notes' => '4 tbsp'],
            ['recipe_id' => '1', 'name' => 'carrots', 'notes' => '1 cup chopped'],
            ['recipe_id' => '1', 'name' => 'peas', 'notes' => '1 cup frozen'],
            ['recipe_id' => '1', 'name' => 'scallions', 'notes' => '1/2 cup sliced'],
            ['recipe_id' => '1', 'name' => 'soy sauce', 'notes' => '4 tbsp low-sodium'],
            ['recipe_id' => '1', 'name' => 'rice', 'notes' => '4 cups cooked leftover'],
            ['recipe_id' => '1', 'name' => 'shrimp', 'notes' => '1 cup cooked baby'],
            ['recipe_id' => '1', 'name' => 'salt', 'notes' => '-'],
            ['recipe_id' => '2', 'name' => 'chicken', 'notes' => '1.5 lbs bone-in skin-on chicken thighs'],
            ['recipe_id' => '2', 'name' => 'salt', 'notes' => '-'],
            ['recipe_id' => '2', 'name' => 'black pepper', 'notes' => 'freshly ground'],
            ['recipe_id' => '2', 'name' => 'sriracha', 'notes' => '1 tbsp'],
            ['recipe_id' => '2', 'name' => 'honey', 'notes' => '2 tbsp'],
            ['recipe_id' => '2', 'name' => 'lime', 'notes' => 'zest of 1 lime'],
            ['recipe_id' => '2', 'name' => 'lime', 'notes' => 'juice of 1 lime'],
            ['recipe_id' => '3', 'name' => 'tofu', 'notes' => '7 ounces silken'],
            ['recipe_id' => '3', 'name' => 'avocado', 'notes' => '1 ripe'],
            ['recipe_id' => '3', 'name' => 'garlic', 'notes' => '2 cloves'],
            ['recipe_id' => '3', 'name' => 'ginger', 'notes' => '1 teaspoon'],
            ['recipe_id' => '3', 'name' => 'soy sauce', 'notes' => '2 tablespoons'],
            ['recipe_id' => '3', 'name' => 'oil', 'notes' => '1 teaspoon'],
            ['recipe_id' => '3', 'name' => 'sugar', 'notes' => '1/2 teaspoon'],
            ['recipe_id' => '3', 'name' => 'black vinegar', 'notes' => '1/2 teaspoon'],
            ['recipe_id' => '3', 'name' => 'white pepper', 'notes' => '1/4 teaspoon'],
            ['recipe_id' => '3', 'name' => 'water', 'notes' => '2 teaspoons'],
            ['recipe_id' => '3', 'name' => 'salt', 'notes' => '-'],
            ['recipe_id' => '3', 'name' => 'scallion', 'notes' => '1'],
            ['recipe_id' => '4', 'name' => 'salt', 'notes' => '-'],
            ['recipe_id' => '4', 'name' => 'olive oil', 'notes' => '2 tablespoons'],
            ['recipe_id' => '4', 'name' => 'bacon', 'notes' => '8 oz. '],
            ['recipe_id' => '4', 'name' => 'onion', 'notes' => '1 medium'],
            ['recipe_id' => '4', 'name' => 'spaghetti', 'notes' => '1 pound dried'],
            ['recipe_id' => '4', 'name' => 'eggs', 'notes' => '4 large'],
            ['recipe_id' => '4', 'name' => 'half and half', 'notes' => '1/3 cup'],
            ['recipe_id' => '4', 'name' => 'parmesan cheese', 'notes' => '2/3 cup'],
            ['recipe_id' => '4', 'name' => 'black pepper', 'notes' => 'freshly cracked'],
            ['recipe_id' => '4', 'name' => 'nutmeg', 'notes' => '1/8 teaspoon'],
            ['recipe_id' => '5', 'name' => 'noodles', 'notes' => '200 g fresh white (wheat) '],
            ['recipe_id' => '5', 'name' => 'garlic', 'notes' => '2 cloves'],
            ['recipe_id' => '5', 'name' => 'ginger', 'notes' => '1 1/2 teaspoons'],
            ['recipe_id' => '5', 'name' => 'peanut butter', 'notes' => '1/3 cup'],
            ['recipe_id' => '5', 'name' => 'water', 'notes' => '2-3 tablespoons hot'],
            ['recipe_id' => '5', 'name' => 'Thai black soy sauce', 'notes' => '1 tablespoon'],
            ['recipe_id' => '5', 'name' => 'light soy sauce', 'notes' => '2 teaspoons'],
            ['recipe_id' => '5', 'name' => 'fish sauce', 'notes' => '2 teaspoons'],
            ['recipe_id' => '5', 'name' => 'sesame oil', 'notes' => '1/2 teaspoon'],
            ['recipe_id' => '5', 'name' => 'lime juice',  'notes' => '1 tablespoon'],
            ['recipe_id' => '5', 'name' => 'chili oils', 'notes' => '2 teaspoons'],





        ]);
    }
}
