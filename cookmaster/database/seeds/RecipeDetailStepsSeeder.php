<?php

use Illuminate\Database\Seeder;

class RecipeDetailStepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipe_detail_steps')->insert([
            ['step_no' => '1', 'recipe_id' => '1', 'text' => 'Whisk the eggs in a bowl with a tablespoon of water and a pinch of salt (or 1 tsp of soy sauce), until blended. Heat one tablespoon of oil in a large nonstick skillet set over medium heat, and add the beaten eggs. Let the eggs cook for a couple minutes, not moving the egg around the pan, but just letting it sit until it sets into an Omelette. Remove the egg to a cutting board, and chop into big pieces.', 'image' => 'Fried_Rice_1.jpg'],
            ['step_no' => '2', 'recipe_id' => '1', 'text' => 'Add two tablespoons of oil to the same skillet, set over medium high heat, and add the carrots, peas, and scallions. Add 1 tbsp of soy sauce, and cook for about 5 minutes, until the carrots soften slightly.', 'image' => 'Fried_Rice_2.jpg'],
            ['step_no' => '3', 'recipe_id' => '1', 'text' => 'Add the leftover rice, and toss around for 1 minute, trying to break up any clumps of rice. Add 2 tbsp of soy sauce and the remaining tablespoon of oil, frying and tossing the rice for 3-4 minutes.', 'image' => 'Fried_Rice_3.jpg'],
            ['step_no' => '4', 'recipe_id' => '1', 'text' => 'Add the shrimp, egg, and remaining tablespoon of soy sauce, and toss for 2 more minutes, until the rice looks evenly brown.', 'image' => 'Fried_Rice_4.jpg'],
            ['step_no' => '1', 'recipe_id' => '2', 'text' => 'Sprinkle the chicken all over with salt and pepper. Place them in a nonstick pan skin side down over medium to medium high heat, and cook for 15 minutes. The idea here it to render the fat a little bit and crisp up the skin to a golden brown color. You don’t want the heat to be so high that the chicken skin burns, so keep an eye on it.', 'image' => 'Honey_Lime_Chicken_Thighs_1.jpg '],
            ['step_no' => '2', 'recipe_id' => '2', 'text' => 'In the meantime, whisk together the sriracha, honey, lime zest, and lime juice. Set aside.', 'image' => 'Honey_Lime_Chicken_Thighs_2.jpg '],
            ['step_no' => '3', 'recipe_id' => '2', 'text' => 'Once the chicken skin is golden brown, flip the chicken over and cook for another 10 minutes, until the chicken is almost cooked through (170 degrees F).', 'image' => 'Honey_Lime_Chicken_Thighs_3.jpg '],
            ['step_no' => '4', 'recipe_id' => '2', 'text' => 'Pour the honey mixture into the pan and cook for another few minutes, basting the chicken until the liquid thickens into a glaze, until the chicken reaches 180 degrees F.', 'image' => 'Honey_Lime_Chicken_Thighs_4.jpg '],
            ['step_no' => '1', 'recipe_id' => '3', 'text' => 'Start by thinly slicing your silken tofu into small squares. Also cut your avocado in half. Thinly slice it crosswise so you get pieces similarly sized to the tofu slices. Arrange alternating slices of silken tofu and avocado on a serving platter.', 'image' => 'Tofu_Avocado_1.jpg'],
            ['step_no' => '2', 'recipe_id' => '3', 'text' => 'In a small bowl, combine the minced garlic and ginger, soy sauce, sesame oil, sugar, vinegar, white pepper, water, and salt to taste. Mix well to combine, and drizzle over the tofu and avocado.', 'image' => 'Tofu_Avocado_2.jpg'],
            ['step_no' => '3', 'recipe_id' => '3', 'text' => 'Garnish with chopped scallions and serve.', 'image' => 'Tofu_Avocado_3.jpg'],
            ['step_no' => '1', 'recipe_id' => '4', 'text' => 'Bring a large pot of salted water to a boil for the spaghetti. Heat 2 tablespoons olive oil in a large skillet over medium heat. Add the bacon/pancetta and onion and cook until the onion is caramelized and the bacon is crisp. By now, your water should be boiling. Add the spaghetti. Make sure to cook until al dente––dont overcook the pasta!', 'image' => 'spaghetti_carbonara_1.jpg'],
            ['step_no' => '2', 'recipe_id' => '4', 'text' => 'Meanwhile, in a large serving bowl, whisk together the eggs, half and half, and cheese. Scrape in the bacon and onion, along with the cooking fat. If its really hot, allow the bacon to cool off for 1-2 minutes in the pan before adding it to the bowl.', 'image' => 'spaghetti_carbonara_2.jpg'],
            ['step_no' => '3', 'recipe_id' => '4', 'text' => 'Before draining the pasta, scoop out about 1/3 cup of the cooking water and slowly whisk it into the bowl with the bacon and eggs. Drain the spaghetti and add to the bowl. Toss quickly and place a plate on top of the serving bowl to cover completely. Let sit for 5 minutes. Remove the plate and toss with black pepper and nutmeg (if using).', 'image' => 'spaghetti_carbonara_3.jpg'],
            ['step_no' => '1', 'recipe_id' => '5', 'text' => ' Bring a pot of water to a boil for the noodles. Meanwhile, prepare the garlic and ginger, and add to a serving bowl along with the peanut butter and hot water.', 'image' => 'peanut-sauce-noodles_1.jpg'],
            ['step_no' => '2', 'recipe_id' => '5', 'text' => 'Stir to combine, letting the hot water loosen the peanut butter. Then stir in the sweet/dark soy sauce, light soy sauce, fish sauce, and sesame oil, along with the lime juice and chili oil if using.', 'image' => 'peanut-sauce-noodles_2.jpg'],
            ['step_no' => '3', 'recipe_id' => '5', 'text' => 'By now, your water should be boiling. Cook your noodles according to package instructions. Drain and toss in your sauce. Serve.', 'image' => 'peanut-sauce-noodles_3.jpg'],

        ]);
    }
}
