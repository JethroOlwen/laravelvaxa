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



Auth::routes(['verify' => true]);

Route::post('/profileupdate', 'ProfileController@profileUpdate')->name('profileUpdate');
Route::get('/profilepicture', 'ProfileController@showProfilePicture')->name('profilePicture');
Route::post('/profilepicture', 'ProfileController@changeProfilePicture')->name('profilePicture');
Route::get('/profile', 'ProfileController@profile')->name('profile');
Route::post('/changeuserpassword', 'ProfileController@changePassword')->name('changeuserpassword');
Route::get('/changeuserpassword', 'ProfileController@changeuserpassword')->name('changeuserpassword');
Route::get('/home', 'HomeController@index')->name('home');
