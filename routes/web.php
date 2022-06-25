<?php

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


Auth::routes(['verify' => true]);


// Auth::routes();







Route::resource('merchants', 'merchantsController');


Route::resource('products', 'productController');


Route::resource('productTranslations', 'product_translationController');


Route::resource('shoppingCarts', 'shopping_cartController');


Route::resource('customers', 'customersController');
