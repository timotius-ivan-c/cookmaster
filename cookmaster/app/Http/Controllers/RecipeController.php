<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\RecipeCategory;
use App\RecipeDetailIngredient;
use App\RecipeDetailStep;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function view_recipe_category($category)
    {
        $recipes = Recipe::with(['recipeCategory' => function ($query) use ($category) {
            $query->where('name', $category);
        }])->with('RecipeDetailIngredient')->with('RecipeDetailStep')->with('user')->get();
        return view('view_filtered_recipes', ['recipes' => $recipes, 'filter' => 'category', 'query' => $category]);
    }

    public function search_by_ingredient($ingredient)
    {
        $ingredients = RecipeDetailIngredient::where('name', 'like', "%$ingredient%")->first();
        $recipes = Recipe::where('id', $ingredients->recipe_id)->get();
        return view('view_filtered_recipes', ['recipes' => $recipes, 'filter' => 'ingredient', 'query' => $ingredient]);
    }

    public function search_by_name($name)
    {
        $recipes = Recipe::where('name', 'like', "%$name%")->get();
        return view('home', ['recipes' => $recipes]);
    }

    public function view_best_recipes()
    {
        $member = Role::where('name', "member")->first();

        if (Auth()->user()->role_id == $member->id) {
            $best_recipes = Recipe::orderBy('average_rating', 'desc')->get();
            $hot_recipes = Recipe::orderBy('review_count', 'desc')->get();
            return view('best_recipes', ['hot_recipes' => $hot_recipes, 'best_recipes' => $best_recipes]);
        } else {
            $recipes = Recipe::where('author_id', Auth()->user()->id);
            return view('best_recipes', ['recipes' => $recipes]);
        }
    }

    public function display_new_recipe_page()
    {
        return view('add_recipe');
    }

    public function new_recipe(Request $request)
    {
        $image_path = $request->file('image')->store('images', 'public');

        Recipe::create([
            'author_id' => Auth()->user()->id,
            'name' => $request->name,
            'image' => $image_path,
            'review_count' => '0',
            'average_rating' => '0',
            'publish_date' => date("Y/m/d/H/i/s"),
            'recipe_type' => $request->type,
            'recipe_category_id' => $request->category,
        ]);

        $recipe = Recipe::last();

        RecipeDetailStep::create([
            'recipe_id' => $recipe->id,
            'text' => $request->text,
            'image' => $image_path,
        ]);

        RecipeDetailIngredient::create([
            'recipe_id' => $recipe,
            'name' => $request->ingredient_name,
            'amount' => $request->amount,
            'notes' => $request->notes,
        ]);

        return redirect()->back();
    }

    public function view_recipe(Recipe $recipe)
    {
        if ($recipe->recipe_type == 1) {
            return view('view_recipe')->with('recipe', $recipe);
        } else {
            return redirect()->back();
        }
    }
}
