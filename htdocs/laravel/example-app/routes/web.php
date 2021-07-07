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

//Route::get('/pizzas/hello', function () {
//  return view('hello');
//});

// pizza routes
Route::post('/pizzas/hello', 'PizzaController@save')->name('pizzas.save');
Route::get('/pizzas/hello', 'PizzaController@hello')->name('pizzas.hello');
Route::get('/pizzas/create1', 'PizzaController@create1')->name('pizzas.create1');
Route::get('/hello', 'PizzaController@index1')->name('hello.index1');
Route::get('/hello/{id}', 'PizzaController@show1')->name('hello.show1');
Route::delete('/hello/{id}', 'PizzaController@destroy1')->name('hello.destroy1');

Route::get('/pizzas', 'PizzaController@index')->name('pizzas.index')->middleware('auth');
Route::get('/pizzas/create', 'PizzaController@create')->name('pizzas.create');
Route::post('/pizzas', 'PizzaController@store')->name('pizzas.store');
Route::get('/pizzas/{id}', 'PizzaController@show')->name('pizzas.show')->middleware('auth');
Route::delete('/pizzas/{id}', 'pizzaController@destroy')->name('pizzas.destroy')->middleware('auth');


Auth::routes(
 // ['register' => false,]
);

Route::get('/home', 'HomeController@index')->name('home');

