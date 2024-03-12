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

// 頁面
Route::get('/', 'App\Http\Controllers\IndexController@index');
Route::get('/index', 'App\Http\Controllers\IndexController@index');
Route::get('/login', 'App\Http\Controllers\LoginController@index');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout');

// form 動作
Route::post('/login', 'App\Http\Controllers\LoginController@post');

// 需權限頁
Route::get('/agent', 'App\Http\Controllers\IndexController@index');
Route::get('/agent/user', 'App\Http\Controllers\AgentUserController@index');
Route::get('/agent/player', 'App\Http\Controllers\AgentPlayerController@index');
Route::get('/agent/report', 'App\Http\Controllers\AgentReportController@index');
Route::get('/agent/bill', 'App\Http\Controllers\AgentBillController@index');
Route::get('/agent/limit', 'App\Http\Controllers\AgentLimitController@index');
Route::get('/agent/sportorder', 'App\Http\Controllers\AgentSportOrderController@index');

//agent
Route::post('/api/edit_agent', 'App\Http\Controllers\AgentUserController@edit_agent');
Route::post('/api/get_player', 'App\Http\Controllers\AgentPlayerController@get_player');
Route::post('/api/edit_player', 'App\Http\Controllers\AgentPlayerController@edit_player');

// API 對接用

Route::post('/agentapi/v1/login', 'App\Http\Controllers\AgentApiController@login');
Route::post('/agentapi/v1/balance', 'App\Http\Controllers\AgentApiController@balance');
Route::post('/agentapi/v1/recharge', 'App\Http\Controllers\AgentApiController@recharge');
Route::post('/agentapi/v1/withdraw', 'App\Http\Controllers\AgentApiController@withdraw');
Route::post('/agentapi/v1/record', 'App\Http\Controllers\AgentApiController@record');


// API 對接用, 免轉