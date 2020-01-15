<?php
# @Date:   2019-10-29T14:03:53+00:00
# @Last modified time: 2020-01-06T18:04:58+00:00




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

Route::get('/manualcalorieadd', 'ManualcalorieController@index')->name('manualcalorieadd.index');
Route::get('/apiview', 'ApiController@index')->name('apiview.index');
Route::post('/apiview/search/', 'ApiController@search')->name('apiview.search');
// Route::get('/apiview/search/{TPNB}', 'ApiController@show')->name('apisearch.show');
Route::get('/apiview/product/create/{TPNB}', 'ApiController@create')->name('calories.create');
Route::post('/apiview/store', 'ApiController@store')->name('apisearch.store');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/profile', 'User\HomeController@index')->name('user.home');

Route::get('/weights', 'WeightController@index')->name('weights.index');
Route::get('/weights/create', 'WeightController@create')->name('weights.create');
Route::get('/weights/{id}', 'WeightController@show')->name('weights.show');
Route::post('/weights/store', 'WeightController@store')->name('weights.store');
Route::get('/weights/{id}/edit', 'WeightController@edit')->name('weights.edit');
Route::put('/weights/{id}', 'WeightController@update')->name('weights.update');
Route::delete('/weights/{id}', 'WeightController@destroy')->name('weights.destroy');

Route::get('/meals', 'MealController@index')->name('meals.index');
Route::get('/meals/create', 'MealController@create')->name('meals.create');
Route::get('/meals/{id}', 'MealController@show')->name('meals.show');
Route::post('/meals/store', 'MealController@store')->name('meals.store');
Route::get('/meals/{id}/edit', 'MealController@edit')->name('meals.edit');
Route::put('/meals/{id}', 'MealController@update')->name('meals.update');
Route::delete('/meals/{id}', 'MealController@destroy')->name('meals.destroy');

Route::get('/ingredients', 'IngredientController@index')->name('ingredients.index');
Route::get('/ingredients/create', 'IngredientController@create')->name('ingredients.create');
Route::get('/ingredients/{id}', 'IngredientController@show')->name('ingredients.show');
Route::post('/ingredients/store', 'IngredientController@store')->name('ingredients.store');
Route::get('/ingredients/{id}/edit', 'IngredientController@edit')->name('ingredients.edit');
Route::put('/ingredients/{id}', 'IngredientController@update')->name('ingredients.update');
Route::delete('/ingredients/{id}', 'IngredientController@destroy')->name('ingredients.destroy');

Route::get('/recipes', 'RecipeController@index')->name('recipes.index');
Route::get('/recipes/create', 'RecipeController@create')->name('recipes.create');
Route::get('/recipes/{id}', 'RecipeController@show')->name('recipes.show');
Route::post('/recipes/store', 'RecipeController@store')->name('recipes.store');
Route::get('/recipes/{id}/edit', 'RecipeController@edit')->name('recipes.edit');
Route::put('/recipes/{id}', 'RecipeController@update')->name('recipes.update');
Route::delete('/recipes/{id}', 'RecipeController@destroy')->name('recipes.destroy');
