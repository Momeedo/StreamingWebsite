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

// Route::group(['prefix' => 'dashboard', 'middleware' => 'auth::admin'], function () {
//     Route::pattern('id', '[0-9]+');
//     Route::get('/', 'Dashboard\DashboardController@index');
// });
Route::get('/', 'Dashboard\DashboardController@index');
Route::get('/manage', 'Dashboard\DashboardController@index');
Route::get('/manage/games', 'Dashboard\GameController@index');

