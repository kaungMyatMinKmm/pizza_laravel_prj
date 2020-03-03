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

Route::get('dashboard', 'BackendController@dashboard');

Route::resource('categories','CategoryController');
Route::resource('products','ProductController');

Route::resource('tables','TableController');

Route::resource('tastes','TasteController');
Route::resource('sizes','SizeController');
Route::resource('recipes','RecipeController');

Route::resource('orders','OrderController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
