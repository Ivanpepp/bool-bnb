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


Route::get('/guest/{id}', 'Guest\HomeController@show')->name('guest.show');

Route::middleware('auth')
->namespace('Host')
->prefix('host')
->name('host.')
->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('apartments', 'ApartmentController');
    Route::resource('users', 'UserController');
});


Route::get("{any?}", function(){
    return view('guest.home');
})->where('any', '.*');
