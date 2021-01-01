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
            ['recipe_id' => '1', 'name' => 'eggs', 'amount' => '3', 'notes' => 'choose large ones'],
            ['recipe_id' => '1', 'name' => 'neutral oil', 'amount' => '4 tbsp', 'notes' => ''],
            ['recipe_id' => '1', 'name' => 'carrots', 'amount' => '1 cup', 'notes' => 'chopped'],
            ['recipe_id' => '1', 'name' => 'peas', 'amount' => '1 cup', 'notes' => 'frozen'],
            ['recipe_id' => '1', 'name' => 'scallions', 'amount' => '1/2 cup', 'notes' => 'sliced'],
            ['recipe_id' => '1', 'name' => 'soy sauce', 'amount' => '4 tbsp', 'notes' => 'low-sodium'],
            ['recipe_id' => '1', 'name' => 'rice', 'amount' => '4 cups', 'notes' => 'leftover, cooked'],
            ['recipe_id' => '1', 'name' => 'baby shrimp', 'amount' => '1 cup', 'notes' => 'cooked'],
            ['recipe_id' => '1', 'name' => 'salt', 'amount' => '', 'notes' => ''],

            ['recipe_id' => '2', 'name' => 'chicken thighs', 'amount' => '1.5 lbs', 'notes' => 'bone-in, skin-on'],
            ['recipe_id' => '2', 'name' => 'salt', 'amount' => 'as needed', 'notes' => ''],
            ['recipe_id' => '2', 'name' => 'black pepper', 'amount' => '', 'notes' => 'freshly ground'],
            ['recipe_id' => '2', 'name' => 'sriracha', 'amount' => '1 tbsp', 'notes' => ''],
            ['recipe_id' => '2', 'name' => 'honey', 'amount' => '2 tbsp', 'notes' => ''],
            ['recipe_id' => '2', 'name' => 'lime', 'amount' => '1', 'notes' => 'separate zest and juice'],

            ['recipe_id' => '3', 'name' => 'tofu', 'amount' => '7 ounces', 'notes' => 'silken'],
            ['recipe_id' => '3', 'name' => 'avocado', 'amount' => '1', 'notes' => 'ripe'],
            ['recipe_id' => '3', 'name' => 'garlic', 'amount' => '2 cloves', 'notes' => ''],
            ['recipe_id' => '3', 'name' => 'ginger', 'amount' => '1 tsp', 'notes' => ''],
            ['recipe_id' => '3', 'name' => 'soy sauce', 'amount' => '2 tbsp', 'notes' => ''],
            ['recipe_id' => '3', 'name' => 'oil', 'amount' => '1 tsp', 'notes' => ''],
            ['recipe_id' => '3', 'name' => 'sugar', 'amount' => '1/2 tsp', 'notes' => ''],
            ['recipe_id' => '3', 'name' => 'black vinegar', 'amount' => '1/2 tsp', 'notes' => ''],
            ['recipe_id' => '3', 'name' => 'white pepper', 'amount' => '1/4 tsp', 'notes' => ''],
            ['recipe_id' => '3', 'name' => 'water', 'amount' => '2 tsp', 'notes' => ''],
            ['recipe_id' => '3', 'name' => 'salt', 'amount' => '', 'notes' => ''],
            ['recipe_id' => '3', 'name' => 'scallion', 'amount' => '1', 'notes' => ''],

            ['recipe_id' => '4', 'name' => 'salt', 'amount' => '', 'notes' => ''],
            ['recipe_id' => '4', 'name' => 'olive oil', 'amount' => '2 tbsp', 'notes' => ''],
            ['recipe_id' => '4', 'name' => 'bacon', 'amount' => '8 oz', 'notes' => ''],
            ['recipe_id' => '4', 'name' => 'onion', 'amount' => '1', 'notes' => 'medium-size'],
            ['recipe_id' => '4', 'name' => 'spaghetti', 'amount' => '1 pound', 'notes' => 'dried'],
            ['recipe_id' => '4', 'name' => 'eggs', 'amount' => '4', 'notes' => 'choose large ones'],
            ['recipe_id' => '4', 'name' => 'half-and-half', 'amount' => '1/3 cup', 'notes' => ''],
            ['recipe_id' => '4', 'name' => 'parmesan cheese', 'amount' => '2/3 cup', 'notes' => ''],
            ['recipe_id' => '4', 'name' => 'black pepper', 'amount' => '', 'notes' => 'freshly cracked'],
            ['recipe_id' => '4', 'name' => 'nutmeg', 'amount' => '1/8 tsp', 'notes' => ''],

            ['recipe_id' => '5', 'name' => 'white wheat noodles', 'amount' => '200 gr', 'notes' => ''],
            ['recipe_id' => '5', 'name' => 'garlic', 'amount' => '2 cloves', 'notes' => ''],
            ['recipe_id' => '5', 'name' => 'ginger', 'amount' => '1 1/2 tsp', 'notes' => ''],
            ['recipe_id' => '5', 'name' => 'peanut butter', 'amount' => '1/3 cup', 'notes' => ''],
            ['recipe_id' => '5', 'name' => 'water', 'amount' => '2-3 tbsp', 'notes' => 'hot'],
            ['recipe_id' => '5', 'name' => 'Thai black soy sauce', 'amount' => '1 tbsp', 'notes' => ''],
            ['recipe_id' => '5', 'name' => 'light soy sauce', 'amount' => '2 tsp', 'notes' => ''],
            ['recipe_id' => '5', 'name' => 'fish sauce', 'amount' => '2 tsp', 'notes' => ''],
            ['recipe_id' => '5', 'name' => 'sesame oil', 'amount' => '1/2 tsp', 'notes' => ''],
            ['recipe_id' => '5', 'name' => 'lime juice', 'amount' => '1 tbsp', 'notes' => ''],
            ['recipe_id' => '5', 'name' => 'chili oils', 'amount' => '2 tsp', 'notes' => ''],

            ['recipe_id' => '6', 'name' => 'raw shrimp', 'amount' => '1/2 pound', 'notes' => 'peeled, de-veined and patted dry'],
            ['recipe_id' => '6', 'name' => 'oyster sauce', 'amount' => '1 tsp', 'notes' => ''],
            ['recipe_id' => '6', 'name' => 'vegetable oil', 'amount' => '1 tbsp', 'notes' => ''],
            ['recipe_id' => '6', 'name' => 'white pepper', 'amount' => '1/4 tsp', 'notes' => ''],
            ['recipe_id' => '6', 'name' => 'sesame oil', 'amount' => '1 tsp', 'notes' => ''],
            ['recipe_id' => '6', 'name' => 'salt', 'amount' => '1/4 tsp', 'notes' => ''],
            ['recipe_id' => '6', 'name' => 'sugar', 'amount' => '1 tsp', 'notes' => ''],
            ['recipe_id' => '6', 'name' => 'ginger', 'amount' => '1/2 tsp', 'notes' => 'minced'],
            ['recipe_id' => '6', 'name' => 'bamboo shoots', 'amount' => '1/4 cup', 'notes' => 'finely chopped'],
            ['recipe_id' => '6', 'name' => 'wheat starch', 'amount' => '1 cup', 'notes' => ''],
            ['recipe_id' => '6', 'name' => 'cornstarch (or tapioca starch)', 'amount' => '1/2 cup', 'notes' => ''],
            ['recipe_id' => '6', 'name' => 'boiling water', 'amount' => '1 1/4 cups', 'notes' => ''],
            ['recipe_id' => '6', 'name' => 'lard (or oil)', 'amount' => '3 tsp', 'notes' => ''],

            ['recipe_id' => '7', 'name' => 'eggs', 'amount' => '6', 'notes' => 'extra large'],
            ['recipe_id' => '7', 'name' => 'mayonnaise', 'amount' => '5 tbsp', 'notes' => ''],
            ['recipe_id' => '7', 'name' => 'wasabi or Chinese hot mustard', 'amount' => '1 heaping tsp', 'notes' => ''],
            ['recipe_id' => '7', 'name' => 'rice vinegar', 'amount' => '1/4 tsp', 'notes' => ''],
            ['recipe_id' => '7', 'name' => 'Chinese pickled mustard greens', 'amount' => '', 'notes' => 'as needed, diced'],
            ['recipe_id' => '7', 'name' => 'zha cai', 'amount' => '2 tbsp', 'notes' => 'optional'],
            ['recipe_id' => '7', 'name' => 'green onion', 'amount' => '1', 'notes' => ''],
            ['recipe_id' => '7', 'name' => 'Chinese chili flakes', 'amount' => '', 'notes' => 'as needed'],

            ['recipe_id' => '8', 'name' => 'all purpose flour', 'amount' => '1.5 cups', 'notes' => ''],
            ['recipe_id' => '8', 'name' => 'baking soda', 'amount' => '1 tsp', 'notes' => ''],
            ['recipe_id' => '8', 'name' => 'baking powder', 'amount' => '1/2 tsp', 'notes' => ''],
            ['recipe_id' => '8', 'name' => 'salt', 'amount' => '3/4 tsp', 'notes' => ''],
            ['recipe_id' => '8', 'name' => 'unsalted butter', 'amount' => '1/2 cup', 'notes' => ''],
            ['recipe_id' => '8', 'name' => 'granulated sugar', 'amount' => '1/2 cup', 'notes' => ''],
            ['recipe_id' => '8', 'name' => 'brown sugar', 'amount' => '1/2 cup', 'notes' => 'firmly packed'],
            ['recipe_id' => '8', 'name' => 'egg', 'amount' => '1', 'notes' => 'large'],
            ['recipe_id' => '8', 'name' => 'vanilla extract', 'amount' => '1 tsp', 'notes' => ''],
            ['recipe_id' => '8', 'name' => 'creamy peanut butter', 'amount' => '1 cup', 'notes' => ''],

            ['recipe_id' => '9', 'name' => 'chicken cutlets', 'amount' => '1.25 lbs', 'notes' => ''],
            ['recipe_id' => '9', 'name' => 'salt', 'amount' => '', 'notes' => 'as needed'],
            ['recipe_id' => '9', 'name' => 'pepper', 'amount' => '', 'notes' => 'as needed'],
            ['recipe_id' => '9', 'name' => 'fresh rosemary', 'amount' => '1 spring', 'notes' => ''],
            ['recipe_id' => '9', 'name' => 'parmesan cheese', 'amount' => '1 cup', 'notes' => 'grated or zested'],
            ['recipe_id' => '9', 'name' => 'eggs', 'amount' => '2', 'notes' => ''],
            ['recipe_id' => '9', 'name' => 'panko bread crumbs', 'amount' => '1 cup', 'notes' => ''],
            ['recipe_id' => '9', 'name' => 'olive oil', 'amount' => '1/4 cup', 'notes' => ''],

            ['recipe_id' => '10', 'name' => 'oreo cookies', 'amount' => '25', 'notes' => ''],
            ['recipe_id' => '10', 'name' => 'cream cheese', 'amount' => '4 oz', 'notes' => ''],
            ['recipe_id' => '10', 'name' => 'white chocolate', 'amount' => '1/2 cup', 'notes' => 'chopped'],
            ['recipe_id' => '10', 'name' => 'dark chocolate', 'amount' => '1/2 cup', 'notes' => 'chopped'],
            ['recipe_id' => '10', 'name' => 'assorted sprinkles', 'amount' => '', 'notes' => 'as needed'],

            ['recipe_id' => '11', 'name' => 'pork belly', 'amount' => '2 pounds', 'notes' => 'cut into 3/4-inch pieces'],
            ['recipe_id' => '11', 'name' => 'ginger', 'amount' => '6 slices', 'notes' => 'divided'],
            ['recipe_id' => '11', 'name' => 'oil', 'amount' => '2 tbsp', 'notes' => ''],
            ['recipe_id' => '11', 'name' => 'sugar', 'amount' => '3 tbsp', 'notes' => ''],
            ['recipe_id' => '11', 'name' => 'scallion', 'amount' => '3 springs', 'notes' => 'diced, white and green parts separated'],
            ['recipe_id' => '11', 'name' => 'Shaoxing wine', 'amount' => '1/2 cup', 'notes' => ''],
            ['recipe_id' => '11', 'name' => 'light soy sauce', 'amount' => '3 tbsp', 'notes' => ''],
            ['recipe_id' => '11', 'name' => 'dark soy sauce', 'amount' => '1 1/2 tbsp', 'notes' => ''],
            ['recipe_id' => '11', 'name' => 'cinnamon stick', 'amount' => '1', 'notes' => ''],
            ['recipe_id' => '11', 'name' => 'star anise', 'amount' => '2', 'notes' => ''],
            ['recipe_id' => '11', 'name' => 'bay leaves', 'amount' => '4', 'notes' => ''],
            ['recipe_id' => '11', 'name' => 'dried chili peppers', 'amount' => '1-2', 'notes' => 'optional'],
            ['recipe_id' => '11', 'name' => 'water', 'amount' => '4 cups', 'notes' => ''],
        ]);
    }
}
