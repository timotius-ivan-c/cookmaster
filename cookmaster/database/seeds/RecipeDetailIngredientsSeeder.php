<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

            ['recipe_id' => '6', 'name' => 'raw shrimp', 'notes' => '1/2 pound (peeled, de-veined and patted dry)'],
            ['recipe_id' => '6', 'name' => 'oyster sauce', 'notes' => '1 teaspoon'],
            ['recipe_id' => '6', 'name' => 'vegetable oil', 'notes' => '1 tablespoon'],
            ['recipe_id' => '6', 'name' => 'white pepper', 'notes' => '1/4 teaspoon'],
            ['recipe_id' => '6', 'name' => 'sesame oil', 'notes' => '1 teaspoon'],
            ['recipe_id' => '6', 'name' => 'salt', 'notes' => '1/4 teaspoon'],
            ['recipe_id' => '6', 'name' => 'sugar', 'notes' => '1 teaspoon'],
            ['recipe_id' => '6', 'name' => 'ginger', 'notes' => '1/2 teaspoon, minced'],
            ['recipe_id' => '6', 'name' => 'bamboo shoots', 'notes' => '1/4 cup, finely chopped'],
            ['recipe_id' => '6', 'name' => 'wheat starch', 'notes' => '1 cup'],
            ['recipe_id' => '6', 'name' => 'cornstarch (or tapioca starch)', 'notes' => '1/2 cup'],
            ['recipe_id' => '6', 'name' => 'boiling water', 'notes' => '1 1/4 cups'],
            ['recipe_id' => '6', 'name' => 'lard (or oil)', 'notes' => '3 teaspoons'],

            ['recipe_id' => '7', 'name' => 'eggs', 'notes' => '6 extra large '],
            ['recipe_id' => '7', 'name' => 'mayonnaise', 'notes' => '5 tablespoons'],
            ['recipe_id' => '7', 'name' => 'wasabi or Chinese hot mustard', 'notes' => '1 heaping teaspoon'],
            ['recipe_id' => '7', 'name' => 'rice vinegar', 'notes' => '1/4 teaspoon'],
            ['recipe_id' => '7', 'name' => 'Chinese pickled mustard greens', 'notes' => 'as needed, diced'],
            ['recipe_id' => '7', 'name' => 'zha cai (optional)', 'notes' => '2 tablespoons'], 
            ['recipe_id' => '7', 'name' => 'green onion', 'notes' => '1'],
            ['recipe_id' => '7', 'name' => 'Chinese chili flakes', 'notes' => 'as needed'],

            ['recipe_id' => '8', 'name' => 'all purpose flour', 'notes' => '1.5 cups'],
            ['recipe_id' => '8', 'name' => 'baking soda', 'notes' => '1 tsp'],
            ['recipe_id' => '8', 'name' => 'baking powder', 'notes' => '1/2 tsp'],
            ['recipe_id' => '8', 'name' => 'salt', 'notes' => '3/4 tsp'],
            ['recipe_id' => '8', 'name' => 'unsalted butter', 'notes' => '1/2 cup'],
            ['recipe_id' => '8', 'name' => 'granulated sugar', 'notes' => '1/2 cup'],
            ['recipe_id' => '8', 'name' => 'brown sugar', 'notes' => '1/2 cup firmly packed'],
            ['recipe_id' => '8', 'name' => 'egg', 'notes' => '1 large'],
            ['recipe_id' => '8', 'name' => 'vanilla extract', 'notes' => '1 tsp'],
            ['recipe_id' => '8', 'name' => 'creamy peanut butter', 'notes' => '1 cup'],

            ['recipe_id' => '9', 'name' => 'chicken cutlets', 'notes' => '1.25 lbs'],
            ['recipe_id' => '9', 'name' => 'salt and pepper', 'notes' => 'as needed'],
            ['recipe_id' => '9', 'name' => 'fresh rosemary', 'notes' => '1 spring'],
            ['recipe_id' => '9', 'name' => 'parmesan cheese', 'notes' => '1 cup grated or zested'],
            ['recipe_id' => '9', 'name' => 'eggs', 'notes' => '2'],
            ['recipe_id' => '9', 'name' => 'panko bread crumbs', 'notes' => '1 cup'],
            ['recipe_id' => '9', 'name' => 'olive oil', 'notes' => '1/4 cup'],

            ['recipe_id' => '10', 'name' => 'oreo cookies', 'notes' => '25'],
            ['recipe_id' => '10', 'name' => 'cream cheese', 'notes' => '4 oz'],
            ['recipe_id' => '10', 'name' => 'white chocolate', 'notes' => '1/2 cup chopped'],
            ['recipe_id' => '10', 'name' => 'dark chocolate', 'notes' => '1/2 cup chopped '],
            ['recipe_id' => '10', 'name' => 'assorted sprinkles', 'notes' => 'as needed'],            
        ]);
    }
}
