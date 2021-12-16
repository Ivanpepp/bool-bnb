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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();


Route::get('/', 'Guest\HomeController@welcome')->name('welcome');
Route::get('/guest', 'Guest\HomeController@index')->name('guest.home');
Route::get('/guest/{id}', 'Guest\HomeController@show')->name('guest.show');
Route::get('/guest/{id}/contatti', 'Guest\HomeController@getContactForm')->name('guest.contact');
Route::post('/guest/contatti', 'Guest\HomeController@contactFormHandler')->name('guest.sender');
Route::get('/thanks', 'Guest\HomeController@contactFormEnder')->name('guest.thanks');


Route::get("/chart", "Host\ApartmentController@chart")->name("host.chart");


Route::middleware('auth')
->namespace('Host')
->prefix('host')
->name('host.')
->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('apartments', 'ApartmentController');
    Route::resource('users', 'UserController');
    Route::resource('mail', 'MessageController');
});


Route::get("{any?}", function(){
    return view('welcome');
})->where('any', '.*');
