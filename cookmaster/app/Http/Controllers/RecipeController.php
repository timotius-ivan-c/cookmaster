<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\RecipeCategory;
use App\RecipeDetailIngredient;
use App\RecipeDetailStep;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function view_recipe_category($category)
    {
        $recipes = Recipe::where('recipe_category_id', $category->id)->get();
        return view('home', ['recipes' => $recipes]);
    }

    public function search_by_ingredient($ingredient)
    {
        $ingredients = RecipeDetailIngredient::where('name', 'like', "%$ingredient%")->first();
        $recipes = Recipe::where('id', $ingredients->recipe_id)->get();
        return view('home', ['recipes' => $recipes]);
    }

    public function search_by_name($name)
    {
        $recipes = Recipe::where('name', 'like', "%$name%")->get();
        return view('home', ['recipes' => $recipes]);
    }

    public function view_best_recipes()
    {
        // belum selesai
        return view('best_recipes', ['recipes' => $recipes]);
    }

    public function display_new_recipe_page()
    {
        return view('add_recipe');
    }

    public function new_recipe(Request $request)
    {
        $image_path = $request->file('image')->store('images', 'public');

        // Recipe::create([
        //     'author_id'=> ,
        //     'name' => $request->name,
        //     'image' => $image_path,
        //     'review_count' => '0',
        //     'average_rating' => '0',
        //     'publish_date' => ,
        //     'recipe_type' => ,
        //     'recipe_category_id' => ,
        // ]);

        $recipe = Recipe::last();

        // RecipeDetailStep::create([
        //     'recipe_id' => $recipe,
        //     'text' => ,
        //     'image' => ,
        // ]);

        // RecipeDetailIngredient::create([
        //     'recipe_id' => $recipe,
        //     'name' => ,
        //     'notes' => ,
        // ]);

        return redirect()->back();
    }

    public function view_recipe(Recipe $recipe)
    {
        return view('view_recipe')->with('recipe', $recipe);
    }
}
