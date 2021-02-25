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
Route::group(['prefix'=>'page'],function(){
    Route::get('/aboutus','PageController@aboutus')->name('about'); // Route to About us
    Route::get('/webdesign','PageController@webdesign')->name('services-webdesign'); // Route to Web Design

});
// Route::get('/','PageController@index'); 
Route::get('/','QuoteController@index'); 
Route::get('/quotes/show','QuoteController@show')->name('quotes.show');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
