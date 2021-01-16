<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['step_no' => '1', 'recipe_id' => '1', 'text' => 'Whisk the eggs in a bowl with a tablespoon of water and a pinch of salt (or 1 tsp of soy sauce), until blended. Heat one tablespoon of oil in a large nonstick skillet set over medium heat, and add the beaten eggs. Let the eggs cook for a couple minutes, not moving the egg around the pan, but just letting it sit until it sets into an Omelette. Remove the egg to a cutting board, and chop into big pieces.', 'image' => 'images/steps/Fried_Rice_1.jpg'],
            ['step_no' => '2', 'recipe_id' => '1', 'text' => 'Add two tablespoons of oil to the same skillet, set over medium high heat, and add the carrots, peas, and scallions. Add 1 tbsp of soy sauce, and cook for about 5 minutes, until the carrots soften slightly.', 'image' => 'images/steps/Fried_Rice_2.jpg'],
            ['step_no' => '3', 'recipe_id' => '1', 'text' => 'Add the leftover rice, and toss around for 1 minute, trying to break up any clumps of rice. Add 2 tbsp of soy sauce and the remaining tablespoon of oil, frying and tossing the rice for 3-4 minutes.', 'image' => 'images/steps/Fried_Rice_3.jpg'],
            ['step_no' => '4', 'recipe_id' => '1', 'text' => 'Add the shrimp, egg, and remaining tablespoon of soy sauce, and toss for 2 more minutes, until the rice looks evenly brown.', 'image' => 'images/steps/Fried_Rice_4.jpg'],

            ['step_no' => '1', 'recipe_id' => '2', 'text' => 'Sprinkle the chicken all over with salt and pepper. Place them in a nonstick pan skin side down over medium to medium high heat, and cook for 15 minutes. The idea here it to render the fat a little bit and crisp up the skin to a golden brown color. You don’t want the heat to be so high that the chicken skin burns, so keep an eye on it.', 'image' => 'images/steps/Honey_Lime_Chicken_Thighs_1.jpg '],
            ['step_no' => '2', 'recipe_id' => '2', 'text' => 'In the meantime, whisk together the sriracha, honey, lime zest, and lime juice. Set aside.', 'image' => 'images/steps/Honey_Lime_Chicken_Thighs_2.jpg '],
            ['step_no' => '3', 'recipe_id' => '2', 'text' => 'Once the chicken skin is golden brown, flip the chicken over and cook for another 10 minutes, until the chicken is almost cooked through (170 degrees F).', 'image' => 'images/steps/Honey_Lime_Chicken_Thighs_3.jpg '],
            ['step_no' => '4', 'recipe_id' => '2', 'text' => 'Pour the honey mixture into the pan and cook for another few minutes, basting the chicken until the liquid thickens into a glaze, until the chicken reaches 180 degrees F.', 'image' => 'images/steps/Honey_Lime_Chicken_Thighs_4.jpg '],

            ['step_no' => '1', 'recipe_id' => '3', 'text' => 'Start by thinly slicing your silken tofu into small squares. Also cut your avocado in half. Thinly slice it crosswise so you get pieces similarly sized to the tofu slices. Arrange alternating slices of silken tofu and avocado on a serving platter.', 'image' => 'images/steps/Tofu_Avocado_1.jpg'],
            ['step_no' => '2', 'recipe_id' => '3', 'text' => 'In a small bowl, combine the minced garlic and ginger, soy sauce, sesame oil, sugar, vinegar, white pepper, water, and salt to taste. Mix well to combine, and drizzle over the tofu and avocado.', 'image' => 'images/steps/Tofu_Avocado_2.jpg'],
            ['step_no' => '3', 'recipe_id' => '3', 'text' => 'Garnish with chopped scallions and serve.', 'image' => 'images/steps/Tofu_Avocado_3.jpg'],

            ['step_no' => '1', 'recipe_id' => '4', 'text' => 'Bring a large pot of salted water to a boil for the spaghetti. Heat 2 tablespoons olive oil in a large skillet over medium heat. Add the bacon/pancetta and onion and cook until the onion is caramelized and the bacon is crisp. By now, your water should be boiling. Add the spaghetti. Make sure to cook until al dente––dont overcook the pasta!', 'image' => 'images/steps/spaghetti_carbonara_1.jpg'],
            ['step_no' => '2', 'recipe_id' => '4', 'text' => 'Meanwhile, in a large serving bowl, whisk together the eggs, half and half, and cheese. Scrape in the bacon and onion, along with the cooking fat. If its really hot, allow the bacon to cool off for 1-2 minutes in the pan before adding it to the bowl.', 'image' => 'images/steps/spaghetti_carbonara_2.jpg'],
            ['step_no' => '3', 'recipe_id' => '4', 'text' => 'Before draining the pasta, scoop out about 1/3 cup of the cooking water and slowly whisk it into the bowl with the bacon and eggs. Drain the spaghetti and add to the bowl. Toss quickly and place a plate on top of the serving bowl to cover completely. Let sit for 5 minutes. Remove the plate and toss with black pepper and nutmeg (if using).', 'image' => 'images/steps/spaghetti_carbonara_3.jpg'],

            ['step_no' => '1', 'recipe_id' => '5', 'text' => ' Bring a pot of water to a boil for the noodles. Meanwhile, prepare the garlic and ginger, and add to a serving bowl along with the peanut butter and hot water.', 'image' => 'images/steps/peanut-sauce-noodles_1.jpg'],
            ['step_no' => '2', 'recipe_id' => '5', 'text' => 'Stir to combine, letting the hot water loosen the peanut butter. Then stir in the sweet/dark soy sauce, light soy sauce, fish sauce, and sesame oil, along with the lime juice and chili oil if using.', 'image' => 'images/steps/peanut-sauce-noodles_2.jpg'],
            ['step_no' => '3', 'recipe_id' => '5', 'text' => 'By now, your water should be boiling. Cook your noodles according to package instructions. Drain and toss in your sauce. Serve.', 'image' => 'images/steps/peanut-sauce-noodles_3.jpg'],

            ['step_no' => 1, 'recipe_id' => 6, 'text' => 'Mix everything (except the bamboo) together; whip in one direction for a few minutes until the mixture starts to look sticky. Now add the chopped bamboo shoots, and mix everything together. Cover and refrigerate while preparing the dough.', 'image' => 'images/steps/Har_Gow_1.jpg'],
            ['step_no' => 2, 'recipe_id' => 6, 'text' => 'Mix the wheat starch and cornstarch in a mixing bowl. Slowly add in the boiling water, while stirring rapidly. Now add in the lard (or oil) and continue to stir.', 'image' => 'images/steps/Har_Gow_2.jpg'],
            ['step_no' => 3, 'recipe_id' => 6, 'text' => 'Knead the dough for a couple of minutes, until it turns into a smooth dough ball. Roll the dough into a long cylinder, and divide it into 18 equal pieces. Cover the dough pieces with a damp paper towel.', 'image' => 'images/steps/Har_Gow_3.jpg'],
            ['step_no' => 4, 'recipe_id' => 6, 'text' => 'Turn on the stove to pre-boil the water in the steamer. Take one piece of dough and roll it into a 3” diameter circle. Add a spoonful of filling and fold the dumpling. Continue assembling until all the dumplings are made.', 'image' => 'images/steps/Har_Gow_4.jpg'],
            ['step_no' => 5, 'recipe_id' => 6, 'text' => 'Once the water in the steamer is boiled, steam the shrimp dumplings for 6 minutes using high heat and serve hot. Make sure that they each have an inch and a half to expand during the cooking process.', 'image' => 'images/steps/Har_Gow_5.jpg'],

            ['step_no' => 1, 'recipe_id' => 7, 'text' => 'To boil the eggs, fill a pot with enough water to cover the eggs. Bring the water to a boil, then slowly lower the eggs using a ladle. Boil for 12 minutes, stirring the water in a circular motion with a spoon for the first minute (to keep the egg yolk in the center). Once the eggs are done, run them under cold tap water to stop cooking.', 'image' => 'images/steps/Deviled_Eggs_1.jpg'],
            ['step_no' => 2, 'recipe_id' => 7, 'text' => 'Prepare the filling which consists of pickled mustard greens.', 'image' => 'images/steps/Deviled_Eggs_2.jpg'],
            ['step_no' => 3, 'recipe_id' => 7, 'text' => 'Once the eggs are cooled, peel them and slice them in half lengthwise.', 'image' => 'images/steps/Deviled_Eggs_3.jpg'],
            ['step_no' => 4, 'recipe_id' => 7, 'text' => 'Gently pop out the cooked yolks into a big bowl using a small spoon. Mash them with the backside of a spoon. Make sure to mash them as finely as you can, so the finished filling will be smooth.', 'image' => 'images/steps/Deviled_Eggs_4.jpg'],
            ['step_no' => 5, 'recipe_id' => 7, 'text' => 'Add the mayonnaise, wasabi or mustard, and rice vinegar to the bowl. Mix with a spatula (or an immersion blender) just until it forms a smooth paste. You can adjust the taste by adding more mayo, wasabi, or vinegar. You can also add zha cai pickles', 'image' => 'images/steps/Deviled_Eggs_5.jpg'],
            ['step_no' => 6, 'recipe_id' => 7, 'text' => 'Transfer the yolk mixture to a piping bag with a large star tip, or a small ziplock bag with a corner cut off. Pipe the yolks into the halved egg white cups.', 'image' => 'images/steps/Deviled_Eggs_6.jpg'],
            ['step_no' => 7, 'recipe_id' => 7, 'text' => 'Garnish the eggs with chili flakes (or hot sauce) and green onions. Serve.', 'image' => 'images/steps/Deviled_Eggs_7.jpg'],

            ['step_no' => 1, 'recipe_id' => 8, 'text' => 'Preheat the oven to 350F.', 'image' => 'images/steps/PB_Cookies_1.jpg'],
            ['step_no' => 2, 'recipe_id' => 8, 'text' => 'In a medium bowl, whisk to combine the flour, baking soda, baking powder, and salt. ', 'image' => 'images/steps/PB_Cookies_2.jpg'],
            ['step_no' => 3, 'recipe_id' => 8, 'text' => 'In another medium bowl, use a hand mixer to cream together the butter, sugar, and brown sugar, for about 60 seconds, until fluffy and light.', 'image' => 'images/steps/PB_Cookies_3.jpg'],
            ['step_no' => 4, 'recipe_id' => 8, 'text' => 'Mix in the egg and vanilla extract for about 30 seconds, until combined.', 'image' => 'images/steps/PB_Cookies_4.jpg'],
            ['step_no' => 5, 'recipe_id' => 8, 'text' => 'Mix in the peanut butter for an additional 30 seconds, until combined.', 'image' => 'images/steps/PB_Cookies_5.jpg'],
            ['step_no' => 6, 'recipe_id' => 8, 'text' => 'Add the dry ingredients to the wet, then mix just until the flour is incorporated. Take care not to overmix.', 'image' => 'images/steps/PB_Cookies_6.jpg'],
            ['step_no' => 7, 'recipe_id' => 8, 'text' => 'Using a medium cookie scoop, portion out scoops of dough directly onto a baking sheet. You should get about 24 scoops of dough total (split them between two baking sheets).', 'image' => 'images/steps/PB_Cookies_7.jpg'],
            ['step_no' => 8, 'recipe_id' => 8, 'text' => 'Bake for 13-14 minutes, until the edges are golden, but the middle is still soft.', 'image' => 'images/steps/PB_Cookies_8.jpg'],
            ['step_no' => 9, 'recipe_id' => 8, 'text' => 'Let them cool for a couple minutes before eating. They are especially fantastic enjoyed warm out of the oven. Enjoy!', 'image' => 'images/steps/PB_Cookies_9.jpg'],

            ['step_no' => 1, 'recipe_id' => 9, 'text' => 'Zest the cheese', 'image' => 'images/steps/Parmesan_Chicken_1.jpg'],
            ['step_no' => 2, 'recipe_id' => 9, 'text' => 'Strip the leaves from the fresh rosemary sprig and mince them finely with a knife. Add the minced rosemary to the egg bowl, then whisk the eggs and rosemary together until combined.', 'image' => 'images/steps/Parmesan_Chicken_2.jpg'],
            ['step_no' => 3, 'recipe_id' => 9, 'text' => 'Lay the chicken breasts out on a cutting board and season them generously on both sides with salt and pepper. Then dip the seasoned chicken cutlet into the zested parmesan.', 'image' => 'images/steps/Parmesan_Chicken_3.jpg'],
            ['step_no' => 4, 'recipe_id' => 9, 'text' => 'Dip the seasoned chicken cutlet into the rosemary egg wash', 'image' => 'images/steps/Parmesan_Chicken_4.jpg'],
            ['step_no' => 5, 'recipe_id' => 9, 'text' => 'Dip the seasoned chicken cutlet into the Panko bread crumbs.', 'image' => 'images/steps/Parmesan_Chicken_5.jpg'],
            ['step_no' => 6, 'recipe_id' => 9, 'text' => 'Once the chicken cutlets are breaded, fry them in olive oil in a single layer, for about 4-5 minutes each side.', 'image' => 'images/steps/Parmesan_Chicken_6.jpg'],
            ['step_no' => 7, 'recipe_id' => 9, 'text' => 'Once they are crispy and golden, zest a little more parmesan on top, and serve!', 'image' => 'images/steps/Parmesan_Chicken_7.jpg'],

            ['step_no' => 1, 'recipe_id' => 10, 'text' => 'Throw about 25 oreo cookies into a food processor, and chop them well.', 'image' => 'images/steps/Oreo_Truffles_1.png'],
            ['step_no' => 2, 'recipe_id' => 10, 'text' => 'Add a half block of softened cream cheese and process until a big clump forms in the side of the food processor. This means that the mixture is properly mixed and will hold together well.', 'image' => 'images/steps/Oreo_Truffles_2.png'],
            ['step_no' => 3, 'recipe_id' => 10, 'text' => 'Use a medium cookie scoop to portion out scoops of the oreo mixture.', 'image' => 'images/steps/Oreo_Truffles_3.png'],
            ['step_no' => 4, 'recipe_id' => 10, 'text' => 'Roll each scoop in between the palms of your hands to shape each one into a ball. Place them on a parchment paper lined sheet tray, then refrigerate the truffles for 15 minutes. This helps them firm up a little bit before dipping.', 'image' => 'images/steps/Oreo_Truffles_4.png'],
            ['step_no' => 5, 'recipe_id' => 10, 'text' => 'Melt some chocolate and dip the truffles. You can also add sprinkles and other topping after dipping.', 'image' => 'images/steps/Oreo_Truffles_5.png'],
            ['step_no' => 6, 'recipe_id' => 10, 'text' => 'Let the chocolate harden before enjoying, either at room temperature or by putting the truffles in the fridge for a quick method.', 'image' => 'images/steps/Oreo_Truffles_6.png'],

            ['step_no' => 1, 'recipe_id' => 11, 'text' => 'Blanch the pork belly with 3 slices of ginger. Bring to boil, simmer for 1 minute.', 'image' => 'images/steps/Braised_Pork_Belly_1.jpg'],
            ['step_no' => 2, 'recipe_id' => 11, 'text' => 'Add oil and rock sugar. Melt the sugar, add the pork belly with 3 slices of ginger, and white part of scallion. Turn up heat to medium. Stir and coat the pork belly with melted sugar.', 'image' => 'images/steps/Braised_Pork_Belly_2.jpg'],
            ['step_no' => 3, 'recipe_id' => 11, 'text' => 'Add Shaoxing wine, light soy sauce, dark soy sauce, cinnamon, star anise, bay leaves, dried chilli peppers, and water. Stir until everything is submerged. Bring to simmer over medium-low heat for 1 hour. Check periodically to make sure sauce doesn\'t dry up.', 'image' => 'images/steps/Braised_Pork_Belly_3.jpg'],
            ['step_no' => 4, 'recipe_id' => 11, 'text' => 'Once the pork is to your liking in terms of tenderness, turn up the heat to cook off any excess sauce, stirring constantly. The sauce will reduce to a glistening coating on the pork belly. Last, add in the remaining sugar and the green parts of the scallions. Stir quickly and serve.', 'image' => 'images/steps/Braised_Pork_Belly_4.jpg'],

            ['step_no' => 1, 'recipe_id' => 12, 'text' => 'Cut the chicken into bite sized pieces, about an inch big. Whisk to combine the cornstarch, soy sauce, and rice cooking wine, and add the chicken. Toss to coat, then let this sit while you make the rest of the recipe.', 'image' => 'images/steps/Kung_Pao_1.jpg'],
            ['step_no' => 2, 'recipe_id' => 12, 'text' => 'For the sauce, whisk together the black vinegar, rice cooking wine, sugar, sesame oil, water, and cornstarch. Set aside.', 'image' => 'images/steps/Kung_Pao_2.jpg'],
            ['step_no' => 3, 'recipe_id' => 12, 'text' => 'Heat a wok or high sided skillet over medium high heat, then add one tablespoon of grapeseed oil. Add half the marinated chicken, and let sit for 1 minute, without stirring, so the chicken can brown. Then stir the chicken and continue cooking for 2 minutes until the chicken is mostly cooked. Remove the chicken from the pan and repeat with the other half of chicken.', 'image' => 'images/steps/Kung_Pao_3.jpg'],
            ['step_no' => 4, 'recipe_id' => 12, 'text' => 'After removing all the chicken, there should still be some residual oil left in the pan. If not, add another tablespoon. Add the garlic, ginger, scallions, and chiles, and stir for 30-60 seconds, until fragrant. Add the bell pepper and celery, and cook for about a minute, until slightly softened. Then add the mostly cooked chicken, the peanuts, and the sauce to the pan. Cook for 2-3 minutes, stirring the whole time, until the sauce thickens and the chicken is completely cooked through. Serve hot with rice, if desired.', 'image' => 'images/steps/Kung_Pao_4.jpg'],

            ['step_no' => 1, 'recipe_id' => 13, 'text' => 'In a small bowl, toss to combine the beef, soy sauce, and rice cooking wine. Let sit while you prepare the rest of the recipe.', 'image' => 'images/steps/Beef_and_Brocoli_1.jpg'],
            ['step_no' => 2, 'recipe_id' => 13, 'text' => 'For the sauce, whisk together all ingredients.', 'image' => 'images/steps/Beef_and_Brocoli_2.jpg'],
            ['step_no' => 3, 'recipe_id' => 13, 'text' => 'For the stir fry, heat one tablespoon of oil in a wok or high sided skillet over high heat, and add half of the marinated beef. Let sit for 1 minute without stirring, so the beef can brown, then stir for 1-2 minutes, until the beef is mostly cooked through.', 'image' => 'images/steps/Beef_and_Brocoli_3.jpg'],
            ['step_no' => 4, 'recipe_id' => 13, 'text' => 'Add the remaining tablespoon of oil to the pan and add the scallions. Stir around for 30 seconds, then add the blanched broccoli, the mostly cooked beef, and all of the sauce.Cook for 1-2 minutes until the beef is fully cooked and the sauce has thickened. Take care not to overcook the beef.', 'image' => 'images/steps/Beef_and_Brocoli_4.jpg'],

            ['step_no' => 1, 'recipe_id' => 14, 'text' => 'In a large bowl, whisk to combine the soy sauce, lime juice, green curry paste, garlic, fish sauce, cumin, coriander, and honey.', 'image' => 'images/steps/Chicken_Satay_1.jpg'],
            ['step_no' => 2, 'recipe_id' => 14, 'text' => 'Add the chicken to the marinade, toss to coat, then let it sit in the fridge for 2-4 hours, and up to overnight.', 'image' => 'images/steps/Chicken_Satay_2.jpg'],
            ['step_no' => 3, 'recipe_id' => 14, 'text' => 'Preheat a grill** to medium high heat, and take the chicken out of the marinade (don’t discard the marinade). Grill the chicken for about 3-4 minutes on each side, until cooked through.', 'image' => 'images/steps/Chicken_Satay_3.jpg'],
            ['step_no' => 4, 'recipe_id' => 14, 'text' => 'Boil for a minute or two to ensure that the bacteria is killed, then add the peanut butter and coconut milk. Bring to a simmer and cook for 3 minutes.', 'image' => 'images/steps/Chicken_Satay_4.jpg'],
            ['step_no' => 5, 'recipe_id' => 14, 'text' => 'Remove from the heat, and whisk in the lime juice and honey. Taste it and adjust the seasoning with salt and pepper if necessary (and you can also add soy sauce). Serve the chicken satay and peanut sauce together.', 'image' => 'images/steps/Chicken_Satay_5.jpg'],

            ['step_no' => 1, 'recipe_id' => 15, 'text' => 'To prepare the duck remove any innards and pat the bird dry. Mix the salt and the five spice powder together and generously season the duck’s cavity and exterior.', 'image' => 'images/steps/Glazed_Roast_Duck_1.jpg'],
            ['step_no' => 2, 'recipe_id' => 15, 'text' => 'Combine the garlic, ginger, and orange zest. Rub the inside of the duck with the garlic mixture. Stuff the cavity with the orange slices, then truss the bird by tying the legs together with kitchen twine.', 'image' => 'images/steps/Glazed_Roast_Duck_2.jpg'],
            ['step_no' => 3, 'recipe_id' => 15, 'text' => 'Roast the duck for 1 hour and 15 minutes. Meanwhile make the glaze, by whisking all four glaze ingredients until combined.', 'image' => 'images/steps/Glazed_Roast_Duck_3.jpg'],
            ['step_no' => 4, 'recipe_id' => 15, 'text' => 'After the duck has cooked for 1 hour and 15 minutes, cook for an additional 35 minutes, glazing three more times throughout that time period, until the duck reaches 165 degrees on an instant read thermometer, measured at the thickest part of the leg. The duck is ready to eat, enjoy!', 'image' => 'images/steps/Glazed_Roast_Duck_4.jpg'],
        ]);
    }
}
