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
use Illuminate\Support\Facades\Session;

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
        // step=0 -> the View will display form fields to input recipe Name and Image.
        $categories = RecipeCategory::all();
        return view('add_recipe')->with('step', 0)->with('categories', $categories);
    }

    public function new_recipe(Request $request)
    {
        // Step 0: input recipe name, image, type (1=free, 2=paid), and category_id
        //      Data inside $request: name, image, type, category
        //      Data returned to the View: Recipe $recipe (the Eloquent for the newly created recipe), $step=1
        // Step 1: input recipe_detail_ingredients
        //      Data inside $request: recipe_id, name, amount, notes
        //      Data returned to the View: recipe_id, $step
        // Step 2: input recipe_detail_steps
        //      Data inside $request: recipe_id, text, image
        //      Data returned to the View: recipe (with eloquent relation to recipe_detail_ingredients and recipe_detail_steps)
        // Kalo ada data $request->is_next, artinya mau lanjut ke step selanjutnya.
        $step = $request->step;
        
        $next = $request->is_next;
        if ($next != null) {
            if ($step == 2) {
                // User already finished adding Recipe info, Detail_ingredients, and Detail_stps
                return redirect("/recipe/view-recipe/$request->recipe_id");
            } elseif ($step == 1) {
                $recipe = Recipe::where('id', $request->recipe_id)->with('recipeDetailStep')->with('recipeDetailIngredient')->first();
                return view('add_recipe')->with('recipe', $recipe)->with('step', ($step + 1));
            }
        } else {
            if ($step == 0) {
                $image_path = $request->file('image')->store('recipes', 'public');
                $new_recipe = new Recipe();
                $new_recipe->author_id = Auth()->user()->id;
                $new_recipe->name = $request->name;
                $new_recipe->image = $image_path;                
                $new_recipe->review_count = 0;
                $new_recipe->average_rating = 0;
                $new_recipe->publish_date = Carbon::now();
                $new_recipe->recipe_type = $request->type;
                $new_recipe->recipe_category_id = $request->category;
                $new_recipe->save();
                // return view('add_recipe')->with('recipe', $new_recipe)->with('step', 1);
                return redirect()->intended("edit-recipe/$new_recipe->id");
            // } else {
            //     if ($step == 1) {
            //         $new_ingredient = new RecipeDetailIngredient();
            //         $new_ingredient->recipe_id = $request->recipe_id;
            //         $new_ingredient->name = $request->name;
            //         $new_ingredient->amount = $request->amount;
            //         $new_ingredient->notes = $request->notes;
            //         $new_ingredient->save();
            //         $recipe = Recipe::where('id', $request->recipe_id)->with('recipeDetailStep')->with('recipeDetailIngredient')->first();
            //         $recipe->refresh();
            //         return view('add_recipe')->with('recipe', $recipe)->with('step', 1);
            //     } elseif ($step == 2)  {
            //         $image_path = $request->file('image')->store('images', 'public');
            //         $new_step = new RecipeDetailStep();
            //         $existing_steps = RecipeDetailStep::where('recipe_id', $request->recipe_id)->get();
            //         $new_step->step_no = count($existing_steps) + 1;
            //         $new_step->recipe_id = $request->recipe_id;
            //         $new_step->text = $request->text;
            //         $new_step->image = $image_path;
            //         $new_step->save();
            //         $recipe = Recipe::where('id', $request->recipe_id)->with('recipeDetailStep')->with('recipeDetailIngredient')->first();
            //         $recipe->refresh();
            //         return view('add_recipe')->with('recipe', $recipe)->with('step', 2);
            //     }
            }
        }
        
        // Recipe::create([
        //     'author_id' => Auth()->user()->id,
        //     'name' => $request->name,
        //     'image' => $image_path,
        //     'review_count' => '0',
        //     'average_rating' => '0',
        //     'publish_date' => date("Y/m/d/H/i/s"),
        //     'recipe_type' => $request->type,
        //     'recipe_category_id' => $request->category,
        // ]);

        // $recipe = Recipe::last();

        // RecipeDetailStep::create([
        //     'recipe_id' => $recipe->id,
        //     'text' => $request->text,
        //     'image' => $image_path,
        // ]);

        // RecipeDetailIngredient::create([
        //     'recipe_id' => $recipe,
        //     'name' => $request->ingredient_name,
        //     'amount' => $request->amount,
        //     'notes' => $request->notes,
        // ]);

        // return redirect()->back();
    }

    public function view_recipe(Recipe $recipe)
    {
        $member = Auth::user();
        $subscribed_chefs = [];

        
        
        if ($member == null) {
            if ($recipe->recipe_type == 1) {
                return view('view_recipe')->with('recipe', $recipe)->with('is_author', false);
            }
        } else {
            // Untuk cek apakah user merupakan pembuat resep
            $is_author = false;
            if ($member->id == $recipe->author_id) {
                return view('view_recipe')->with('recipe', $recipe)->with('is_author', true);
            } else {
                // User bukan pembuat resep:
                // Cek apakah user subscribe ke chef nya
                $subscribed_chefs = DB::table('subscriptions')->select('chef_id')
                    ->whereRaw("chef_id in (SELECT chef_id FROM subscriptions WHERE member_id=" . $member->id . " AND end > '" . Carbon::now() . " AND chef_id=" . $recipe->author_id . "')")
                    ->first();
                if ($subscribed_chefs != null) {
                    return view('view_recipe')->with('recipe', $recipe)->with('is_author', false);
                }
            }
            
            // dd("yoo");
        }
        return redirect('/login')->with('error', "You are not subscribed to this chef! Please login and purchase subscription from the chef.");
    }

    public function edit_recipe($recipe_id) {
        $user = Auth::user();
        $recipe = Recipe::where('id', $recipe_id)->with('recipeDetailIngredient')->with('recipeDetailStep')->get();
        if ($recipe->first()->author_id == $user->id) {
            $recipe_categories = RecipeCategory::all();
            return view('edit_recipe')->with('recipe', $recipe->first())->with('categories', $recipe_categories);
        } else {
            return redirect('home')->with('error', 'You are not the author and can\'t edit this recipe!');
        }
    }

    public function commit_edit_recipe(Request $request) {
        $user = Auth::user();
        $recipe = Recipe::where('id', $request->recipe_id)->with('recipeDetailIngredient')->with('recipeDetailStep')->first();
        $recipe_categories = RecipeCategory::all();

        $field_to_edit = $request->edit;
        $field_to_delete = $request->delete;
        $field_to_add = $request->add;

        if ($field_to_edit != null) {
            if ($field_to_edit == 'recipe') {
                $recipe->name = $request->name;
                if ($request->file('image')) {
                    $image_path = $request->file('image')->store('images', 'public');
                    $recipe->image = $image_path;
                }
                $recipe->recipe_type = $request->recipe_type;
                $recipe->recipe_category_id = $request->category;
                $recipe->save();
                $recipe->refresh();
                Session::flash('success', 'Your edit has been saved!');
                return redirect()->intended("edit-recipe/$recipe->id")->with('recipe', $recipe)->with('categories', $recipe_categories)->with('success', 'Your edit has been saved!');
            } elseif ($field_to_edit == 'ingredient') {
                $ingredient = RecipeDetailIngredient::find($request->ingredient_id);
                $ingredient->name = $request->name;
                $ingredient->amount = $request->amount;
                $ingredient->notes = $request->notes;
                $ingredient->save();
                $recipe->refresh();
                Session::flash('success', 'Your edit has been saved!');
                return redirect()->intended("edit-recipe/$recipe->id")->with('recipe', $recipe)->with('categories', $recipe_categories)->with('success', 'Your edit has been saved!');
            } elseif ($field_to_edit == 'step') {
                $step = RecipeDetailStep::find($request->step_id);
                $step->text = $request->text;
                if ($request->file('image')) {
                    $image_path = $request->file('image')->store('images', 'public');
                    $step->image = $request->image;
                }
                $step->save();
                $recipe->refresh();
                Session::flash('success', 'Your edit has been saved!');
                return redirect()->intended("edit-recipe/$recipe->id")->with('recipe', $recipe)->with('categories', $recipe_categories)->with('success', 'Your edit has been saved!');
            }
        } elseif ($field_to_delete != null) {
            if ($field_to_delete == 'recipe') {
                $recipe->delete();
                Session::flash('success', 'Your recipe has been deleted!');
                return redirect()->intended('home')->with('success', 'Your recipe has been deleted!');
            } elseif ($field_to_delete == 'ingredient') {
                $ingredient = RecipeDetailIngredient::find($request->ingredient_id);
                $ingredient->delete();
                $recipe->refresh();
                Session::flash('success', 'Ingredient deleted!');
                return redirect()->intended("edit-recipe/$recipe->id")->with('recipe', $recipe)->with('categories', $recipe_categories)->with('success', 'Ingredient deleted!');
            } elseif ($field_to_delete == 'step') {
                $steps_to_edit = RecipeDetailStep::where('recipe_id', $request->recipe_id);
                $step_count = count($steps_to_edit->get());
                $steps_to_edit->where('id', $request->step_id)->delete();
                for ($i=$request->step_no; $i < $step_count; $i++) {
                    $steps_to_edit = RecipeDetailStep::where('recipe_id', $request->recipe_id)->where('step_no', $i + 1);
                    // $steps_to_edit->refresh();
                    $step = $steps_to_edit->first();
                    $step->step_no = $i;
                    $step->save();
                }
                $recipe->refresh();
                Session::flash('success', 'Step deleted!');
                return redirect()->intended("edit-recipe/$recipe->id")->with('recipe', $recipe)->with('categories', $recipe_categories)->with('success', 'Your edit has been saved!');
            }
        } elseif ($field_to_add != null) {
            if ($field_to_add == 'ingredient') {
                $new_ingredient = new RecipeDetailIngredient();
                $new_ingredient->recipe_id = $request->recipe_id;
                $new_ingredient->name = $request->name;
                $new_ingredient->amount = $request->amount;
                $new_ingredient->notes = $request->notes;
                $new_ingredient->save();
                $recipe->refresh();
                Session::flash('success', 'Ingredient added!');
                return redirect()->intended("edit-recipe/$recipe->id")->with('recipe', $recipe)->with('categories', $recipe_categories)->with('success', 'Ingredient saved!');
            } elseif ($field_to_add == 'step') {
                $new_step = new RecipeDetailStep();
                $existing_steps = RecipeDetailStep::where('recipe_id', $request->recipe_id)->get();
                $new_step->step_no = count($existing_steps) + 1;
                $new_step->recipe_id = $request->recipe_id;
                $new_step->text = $request->text;
                if ($request->file('image')) {
                    $image_path = $request->file('image')->store('images', 'public');
                    $new_step->image = $image_path;
                }
                $new_step->save();
                $recipe = Recipe::where('id', $request->recipe_id)->with('recipeDetailStep')->with('recipeDetailIngredient')->first();
                $recipe->refresh();
                Session::flash('success', 'New step added!');
                return redirect()->intended("edit-recipe/$recipe->id")->with('recipe', $recipe)->with('categories', $recipe_categories)->with('success', 'New step saved!');
            }
        }
    }
}
