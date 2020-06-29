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

Route::group(['prefix' => 'manage', 'middleware' => 'admin'], function () {
    Route::pattern('id', '[0-9]+');
    Route::get('/', 'Dashboard\DashboardController@index');
    Route::get('/games', 'Dashboard\GameController@index');
    Route::get('/games/new', 'Dashboard\GameController@create');
    Route::get('/channels', 'Dashboard\ChannelController@index');
    Route::get('/channels/new', 'Dashboard\ChannelController@create');
    Route::get('/teams', 'Dashboard\TeamController@index');
    Route::get('/teams/new', 'Dashboard\TeamController@create');
    Route::get('/locations', 'Dashboard\LocationController@index');
    Route::get('/locations/new', 'Dashboard\LocationController@create');
    Route::get('/competitions', 'Dashboard\CompetitionController@index');
    Route::get('/competitions/new', 'Dashboard\CompetitionController@create');
    Route::get('/messages', 'Dashboard\MessageController@index');

});

Route::get('/', function () {
    return view('front.home');
});

Route::get('logout', 'Auth\LoginController@logout');