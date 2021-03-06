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

Route::get('/', 'WebController@index');

Route::get('/checkout', 'WebController@checkout')->middleware('auth')->name('checkout');

Route::get('/payment', 'WebController@payment')->middleware('auth')->name('payment');

Route::post('/set_token', 'WebController@set_token')->middleware('auth');

Route::post('/pay', 'WebController@pay')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');