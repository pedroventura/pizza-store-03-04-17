<?php

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

// list all ingredients
Route::get('/ingredients', 'IngredientController@index');
// display create form
Route::get('/ingredients/create', 'IngredientController@create');
// show ingredient
Route::get('/ingredients/{id}', 'IngredientController@show');
// create ingredient
Route::post('/ingredients', 'IngredientController@store');
// edit form
Route::get('/ingredients/edit/{id}', 'IngredientController@edit');
// patch to ingredient
Route::patch('/ingredients/{id}', 'IngredientController@update');

// list all pizzas
Route::get('/pizzas', 'PizzaController@index');
// Display create form
Route::get('/pizzas/create', 'PizzaController@create');
// Display a pizza
Route::get('/pizzas/{id}', 'PizzaController@show');
// Create the pizza
Route::post('/pizzas', 'PizzaController@store');