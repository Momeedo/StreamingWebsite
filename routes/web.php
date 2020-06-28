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
Auth::routes();

Route::get('/', 'Dashboard\DashboardController@index');

Route::group(['prefix' => 'manage', 'middleware' => 'admin'], function () {
     Route::pattern('id', '[0-9]+');
     Route::get('/', 'Dashboard\DashboardController@index');
     Route::get('/games', 'Dashboard\GameController@index');
     Route::get('/games/new', 'Dashboard\GameController@new');

});

Route::get('/games/autocomplete', 'Dashboard\GameController@new')->name('game_autocomplete');
Route::get('/', function () {
    return view('front.home');
});

Route::get('logout', 'Auth\LoginController@logout');