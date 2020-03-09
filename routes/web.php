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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','FrontendController@main')->name('main');
Route::group([

'middleware' => 'auth',
'prefix' => 'backend',


],function(){


Route::resource('crusts','CrustController');
Route::resource('toppings','ToppingController');

Route::resource('sizes','SizeController');
Route::resource('orderdetails','OrderdetailController');

// Route::resource('tastes','TasteController');
// Route::resource('sizes','SizeController');
// Route::resource('recipes','RecipeController');


});
Route::resource('orders','OrderController');
Route::post('order_store','OrderController@order_store')->name('order_store');

Route::get('dashboard', 'BackendController@dashboard');


// Route::resource('orders','OrderController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/recipes','RecipeController@store');
