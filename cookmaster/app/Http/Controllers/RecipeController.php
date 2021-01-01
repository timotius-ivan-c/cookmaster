<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\RecipeCategory;
use App\RecipeDetailIngredient;
use App\RecipeDetailStep;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function view_recipe_category(RecipeCategory $category)
    {
        $recipes = Recipe::where('recipe_category_id', $category->id)->get();
        return view('View', ['recipes' => $recipes]);
    }

    public function search_by_ingredient(RecipeDetailIngredient $ingredient)
    {
        $recipes = Recipe::where('id', $ingredient->recipe_id)->get();
        return view('View', ['recipes' => $recipes]);
    }

    public function search_by_name(Request $request)
    {
        $name = $request->name;
        $recipes = Recipe::where('name', 'like', "%$name%")->get();
        return view('View', ['recipes' => $recipes]);
    }

    public function view_best_recipes()
    {
        // belum selesai
        return view('View', ['recipes' => $recipes]);
    }

    public function new_recipe()
    {
        return view('View');
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
        return view('View');
    }
}
