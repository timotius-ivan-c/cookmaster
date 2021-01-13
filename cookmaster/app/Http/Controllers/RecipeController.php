<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\RecipeCategory;
use App\RecipeDetailIngredient;
use App\RecipeDetailStep;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    public function view_recipe_category($category)
    {
        $member = Auth::user();
        $subscribed_recipes = [];

        if ($member) {
            $subscribed_chefs = DB::table('users')->select('id')
                ->whereRaw("id in (SELECT chef_id FROM subscriptions WHERE member_id=" . $member->id . " AND end > '" . Carbon::now() . "')")->get();

            $subscribed_recipes = Recipe::where('recipe_type', '=', 2)
                ->where(['recipe_category_id' => function ($query) use ($category) {
                    $query->select('id')->from('recipe_categories')->where('name', $category)->get();
                }])
                ->whereIn('author_id', $subscribed_chefs->pluck('id'))
                ->with('RecipeDetailIngredient')->with('RecipeDetailStep')->with('user')->get();
        }

        $recipes = Recipe::where(['recipe_category_id' => function ($query) use ($category) {
            $query->select('id')->from('recipe_categories')->where('name', $category)->get();
        }])->where('recipe_type', '=', '1')->with('RecipeDetailIngredient')->with('RecipeDetailStep')->with('user')->get();

        return view('view_filtered_recipes', ['recipes_paid' => $subscribed_recipes, 'recipes' => $recipes, 'filter' => 'category', 'query' => $category]);
    }

    public function search_by_ingredient($ingredient)
    {
        $member = Auth::user();
        $subscribed_recipes = [];

        $ingredients = RecipeDetailIngredient::where('name', 'like', "%$ingredient%")->with('Recipe')->get();

        if ($member) {
            $subscribed_chefs = DB::table('users')->select('id')
                ->whereRaw("id in (SELECT chef_id FROM subscriptions WHERE member_id=" . $member->id . " AND end > '" . Carbon::now() . "')")->get();

            $subscribed_recipes = Recipe::where('recipe_type', '=', 2)
                ->whereIn('id', function ($query) use ($ingredient) {
                    $query->select('recipe_id')->from('recipe_detail_ingredients')->where('name', 'like', "%$ingredient%")->get()->pluck('recipe_id');
                })
                ->whereIn('author_id', $subscribed_chefs->pluck('id'))
                ->with('RecipeDetailIngredient')->with('RecipeDetailStep')->with('user')->get();
        }


        $recipes = Recipe::where('recipe_type', 1)->whereIn('id', $ingredients->pluck('recipe_id'))->get();
        return view('view_filtered_recipes', ['recipes_paid' => $subscribed_recipes, 'recipes' => $recipes, 'filter' => 'ingredient', 'query' => $ingredient]);
    }

    public function search_by_name($name)
    {
        $member = Auth::user();
        $subscribed_recipes = [];

        if ($member) {
            $subscribed_chefs = DB::table('users')->select('id')
                ->whereRaw("id in (SELECT chef_id FROM subscriptions WHERE member_id=" . $member->id . " AND end > '" . Carbon::now() . "')")->get();

            $subscribed_recipes = Recipe::where('recipe_type', '=', 2)
                ->where('name', 'like', "%$name%")
                ->whereIn('author_id', $subscribed_chefs->pluck('id'))
                ->with('RecipeDetailIngredient')->with('RecipeDetailStep')->with('user')->get();
        }

        $recipes = Recipe::where('recipe_type', 1)->where('name', 'like', "%$name%")->get();
        return view('view_filtered_recipes', ['recipes_paid' => $subscribed_recipes, 'recipes' => $recipes, 'filter' => 'name', 'query' => $name]);
    }

    public function view_best_recipes()
    {
        $member = Role::where('name', "member")->first();
        $user_role = Auth()->user()->role_id;
        $best_recipes = [];
        $hot_recipes = [];
        $recipes = [];

        if ($user_role == $member->id) {
            $best_recipes = Recipe::orderBy('average_rating', 'desc')->get();
            $hot_recipes = Recipe::orderBy('review_count', 'desc')->get();
        } else {
            $role = DB::table('users')->where('role_id', '=', $user_role)->get();
            $recipes = Recipe::whereIn('author_id', $role->pluck('id'))->get();
        }
        return view('view_best_recipes', ['recipes' => $recipes, 'hot_recipes' => $hot_recipes, 'best_recipes' => $best_recipes]);
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
        $member = Auth::user();
        $subscribed_chefs = [];

        // Untuk cek apakah user merupakan pembuat resep
        $author = 0;
        if ($member->id == $recipe->author_id) {
            $author = 1;
        }


        if ($recipe->recipe_type == 1) {
            return view('view_recipe')->with('recipe', $recipe)->with('author', $author);
        } else {
            // Mengecek apakah user subscribe chef nya
            $subscribed_chefs = DB::table('subscriptions')->select('chef_id')
                ->whereRaw("chef_id in (SELECT chef_id FROM subscriptions WHERE member_id=" . $member->id . " AND end > '" . Carbon::now() . " AND chef_id=" . $recipe->author_id . "')")->first();
            if ($subscribed_chefs != null) {
                return view('view_recipe')->with('recipe', $recipe)->with('author', $author);
            }
            return redirect()->back();
        }
    }
}
