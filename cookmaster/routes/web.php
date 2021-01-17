<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => 'registered_user'], function () {
    // Transaction Controller
    Route::get('/transaction-history', 'TransactionController@view_transaction_history');
    Route::get('/top-up', 'TransactionController@view_topup_page');
    Route::post('/top-up', 'TransactionController@topup');
    Route::get('/subscribe/{user:id}', 'TransactionController@view_subscribe_page')->name('subscribe');
    Route::post('/subscribe', 'TransactionController@pay_subscription');
    
    // User Controller
    Route::get('/test-follow/{id}', 'UserController@test_follow');
    Route::post('/follow', 'UserController@follow');
    Route::post('/follow', 'UserController@follow');
    Route::get('/edit-profile', 'UserController@edit_profile');
    Route::post('/edit-profile', 'UserController@edited_profile');
    Route::get('/subscriptions', 'UserController@view_subscriptions');

    // Recipe Controller
    Route::post('/add-review', 'RecipeController@add_review');
    Route::post('/delete-review', 'RecipeController@delete_review');
});

Route::group(['middleware' => 'contributor_and_chef'], function () {

    // Recipe Controller 
    Route::get('/new-recipe', 'RecipeController@display_new_recipe_page');
    Route::post('/new-recipe', 'RecipeController@new_recipe')->name('recipe.add');
    Route::get('/edit-recipe/{recipe_id}', 'RecipeController@edit_recipe');
    Route::post('/edit-recipe/{recipe_id}', 'RecipeController@commit_edit_recipe')->name('recipe.edit');
    
    // User Controller
    Route::get('/earning','UserController@earnings');
});

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id}', ['uses' => 'UserController@view_profile', 'as' => 'profile.view'])->name('view_profile');
Route::get('/guest-chef', 'UserController@view_guest_chef'); 
Route::get('/community', 'UserController@view_community');

// Recipe Controller
Route::get('/recipe/best-recipe', 'RecipeController@view_best_recipes');
Route::get('/recipe/{recipe}', 'RecipeController@view_recipe');
Route::get('/recipe/category/{category}', 'RecipeController@view_recipe_category');
Route::get('/recipe/ingredient/{ingredient}', 'RecipeController@search_by_ingredient');
Route::get('/recipe/name/{name}', 'RecipeController@search_by_name');
Route::get('/recipe/view-recipe/{recipe:id}', 'RecipeController@view_recipe');


// User Controller
Route::get('/top-chefs', 'UserController@view_top_chefs');
Route::get('/top-contributors', 'UserController@view_top_contributors');
Route::get('/home', 'UserController@home');
Route::get('/', 'UserController@home'); 
