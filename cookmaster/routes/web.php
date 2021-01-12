<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id}', ['uses' => 'UserController@view_profile', 'as' => 'profile.view'])->name('view_profile');
Route::get('/recipe/{recipe}', 'RecipeController@view_recipe');

// Recipe Controller
Route::get('/recipe/category/{category}', 'RecipeController@view_recipe_category');
Route::get('/recipe/ingredient/{ingredient}', 'RecipeController@search_by_ingredient');
Route::get('/recipe/name/{name}', 'RecipeController@search_by_name');
Route::get('/recipe/best-recipe', 'RecipeController@view_best_recipes');
Route::get('/recipe/view-recipe/{master_recipes:id}', 'RecipeController@view_recipe');
Route::get('/new-recipe', 'RecipeController@new_recipe');

// Transaction Controller
Route::get('/transaction-history', 'TransactionController@view_transaction_history');
Route::get('/top-up', 'TransactionController@view_topup_page');
Route::post('/top-up', 'TransactionController@topup');
Route::get('/subscribe/{user:id}', 'TransactionController@view_subscribe_page');
Route::post('/subscribe', 'TransactionController@pay_subscription');
