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
    Route::post('/games/save', 'Dashboard\GameController@save');
    Route::get('/channels', 'Dashboard\ChannelController@index');
    Route::get('/channels/new', 'Dashboard\ChannelController@create');
    Route::get('/teams', 'Dashboard\TeamController@index');
    Route::get('/teams/new', 'Dashboard\TeamController@create');
    Route::get('/teams/edit/{id}', 'Dashboard\TeamController@edit');
    Route::get('/locations/edit/{id}', 'Dashboard\LocationController@edit');
    Route::get('/competitions/edit/{id}', 'Dashboard\CompetitionController@edit');
    Route::get('/locations', 'Dashboard\LocationController@index');
    Route::get('/locations/new', 'Dashboard\LocationController@create');
    Route::get('/competitions', 'Dashboard\CompetitionController@index');
    Route::get('/competitions/new', 'Dashboard\CompetitionController@create');
    Route::get('/messages', 'Dashboard\MessageController@index');
    Route::post('/team-create', 'Dashboard\TeamController@store')->name('team-create');
    Route::post('/team-update/{id}', 'Dashboard\TeamController@update')->name('team-update');
    Route::post('/team-delete', 'Dashboard\TeamController@remove')->name('team-delete');
    Route::post('/location-create', 'Dashboard\LocationController@store')->name('location-create');
    Route::post('/location-update/{id}', 'Dashboard\LocationController@update')->name('location-update');
    Route::post('/location-delete', 'Dashboard\LocationController@remove')->name('location-delete');
    Route::post('/competition-create', 'Dashboard\CompetitionController@store')->name('competition-create');
    Route::post('/competition-update/{id}', 'Dashboard\CompetitionController@update')->name('competition-update');
    Route::post('/competition-delete', 'Dashboard\CompetitionController@remove')->name('competition-delete');
});

Route::get('/', 'Front\HomeController@index');
Route::get('/privacy-policy', 'Front\HomeController@privacy');
Route::get('/contact', 'Front\ContactController@index');
Route::get('/games', 'Front\GameController@index');
Route::get('/channels', 'Front\ChannelController@index');

//Test Puroposes
Route::get('/channel', 'Front\ChannelController@channel')->middleware('auth');;

Route::get('logout', 'Auth\LoginController@logout');