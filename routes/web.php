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

Route::get('/', 'App\Http\Controllers\IndexController@index');

Route::get('/login', 'App\Http\Controllers\LoginController@index');
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');
Route::get('/app', 'App\Http\Controllers\AppController@index');
Route::get('/channel', 'App\Http\Controllers\ChannelController@index');
Route::get('/push', 'App\Http\Controllers\PushController@index');
Route::get('/user', 'App\Http\Controllers\UserController@index');
Route::get('/statistics', 'App\Http\Controllers\StatisticsController@index');

Route::get('/download', 'App\Http\Controllers\DownloadController@index');