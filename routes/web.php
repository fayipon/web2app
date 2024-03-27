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
Route::get('/logout', 'App\Http\Controllers\LoginController@logout');
Route::post('/login-post', 'App\Http\Controllers\LoginController@post');


Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

Route::get('/app', 'App\Http\Controllers\AppController@index');
Route::get('/app-create', 'App\Http\Controllers\AppController@create');
Route::get('/app-edit', 'App\Http\Controllers\AppController@edit');
Route::post('/app-edit-post', 'App\Http\Controllers\AppController@edit_post');
Route::post('/app-post', 'App\Http\Controllers\AppController@insert');
Route::get('/app-delist', 'App\Http\Controllers\AppController@delist');
Route::get('/app-delete', 'App\Http\Controllers\AppController@delete');

Route::get('/channel', 'App\Http\Controllers\ChannelController@index');
Route::get('/channel-create-page', 'App\Http\Controllers\ChannelController@create_page');
Route::post('/channel-create', 'App\Http\Controllers\ChannelController@create');
Route::get('/channel-edit-page', 'App\Http\Controllers\ChannelController@edit_page');
Route::post('/channel-edit', 'App\Http\Controllers\ChannelController@edit');
Route::get('/channel-delist', 'App\Http\Controllers\ChannelController@delist');

Route::get('/pv', 'App\Http\Controllers\PvController@index');
Route::post('/api-pv', 'App\Http\Controllers\PvController@api');

Route::get('/push', 'App\Http\Controllers\PushController@index');

Route::get('/download', 'App\Http\Controllers\DownloadController@index');
Route::get('/manifest', 'App\Http\Controllers\ManifestController@index');
Route::get('/myapp/{id}', 'App\Http\Controllers\MyAppController@index');


Route::get('/user', 'App\Http\Controllers\UserController@index');
Route::get('/report', 'App\Http\Controllers\ReportController@index');


// WebPush

Route::get('/webpush', 'App\Http\Controllers\IndexController@webpush');
Route::get('/subscribe', 'App\Http\Controllers\SubscriptionController@subscribe');



// PG 测试用

Route::get('/web-api/auth/session/v2/verifySession', 'App\Http\Controllers\GamePGController@verifySession');
Route::post('/web-api/auth/session/v2/verifySession', 'App\Http\Controllers\GamePGController@verifySession');

Route::get('/game-api/gem-saviour-conquest/v2/GameInfo/Get', 'App\Http\Controllers\GamePGController@getGameInfo');
Route::post('/game-api/gem-saviour-conquest/v2/GameInfo/Get', 'App\Http\Controllers\GamePGController@getGameInfo');

Route::get('/web-api/game-proxy/v2/GameName/Get', 'App\Http\Controllers\GamePGController@getGameName');
Route::post('/web-api/game-proxy/v2/GameName/Get', 'App\Http\Controllers\GamePGController@getGameName');

// gem-saviour-conquest spin event
Route::get('/game-api/gem-saviour-conquest/v2/Spin', 'App\Http\Controllers\GamePGController@getSpinInfo');
Route::post('/game-api/gem-saviour-conquest/v2/Spin', 'App\Http\Controllers\GamePGController@getSpinInfo');


Route::get('/web-api/game-proxy/v2/Resources/GetByResourcesTypeIds', 'App\Http\Controllers\GamePGController@getResurceInfo');
Route::post('/web-api/game-proxy/v2/Resources/GetByResourcesTypeIds', 'App\Http\Controllers\GamePGController@getResurceInfo');


Route::get('/web-api/game-proxy/v2/BetHistory/Get', 'App\Http\Controllers\GamePGController@getBetHistory');
Route::post('/web-api/game-proxy/v2/BetHistory/Get', 'App\Http\Controllers\GamePGController@getBetHistory');



