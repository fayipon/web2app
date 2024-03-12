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

Route::get('/redis/ant_redis', 'App\Http\Controllers\RedisAntController@ant_redis');
Route::get('/redis/clean', 'App\Http\Controllers\RedisAntController@clean');

// 從LsportEvents 中回補
Route::get('/redis/lsport_queue', 'App\Http\Controllers\RedisAntController@lsport_queue');

// Result Script
Route::post('/result/result', 'App\Http\Controllers\ResultController@result');
Route::post('/result/order', 'App\Http\Controllers\ResultController@order');

// 模擬封包機制
Route::get('/lsport/prematch', 'App\Http\Controllers\RedisAntController@lsport_prematch_test');
Route::get('/lsport/inplay', 'App\Http\Controllers\RedisAntController@lsport_inplay_test');
Route::get('/lsport/delay_order', 'App\Http\Controllers\RedisAntController@delay_order');
Route::get('/lsport/risk', 'App\Http\Controllers\RedisAntController@risk');

Route::get('/lsport/f', 'App\Http\Controllers\RedisAntController@foolball_tw');

// Lsport Snapshot API
Route::get('/lsport_snapshot/getSport', 'App\Http\Controllers\LsportSnapshotController@getSport');
Route::get('/lsport_snapshot/getLeague', 'App\Http\Controllers\LsportSnapshotController@getLeague');
Route::get('/lsport_snapshot/GetPrematch', 'App\Http\Controllers\LsportSnapshotController@GetPrematch');
Route::get('/lsport_snapshot/GetInplay', 'App\Http\Controllers\LsportSnapshotController@GetInplay');
Route::get('/lsport_snapshot/GetSubscribedMetaData', 'App\Http\Controllers\LsportSnapshotController@GetSubscribedMetaData');

Route::get('/lsport_snapshot/updateByLogs', 'App\Http\Controllers\LsportSnapshotController@updateByLogs');
Route::post('/lsport_snapshot/updateByLogs', 'App\Http\Controllers\LsportSnapshotController@updateByLogs');

// Lsport Fixture , Redis腳本
Route::post('/lsport_fixture/FoolballTW', 'App\Http\Controllers\LsportFixtureController@MatchListFoolballTW');
Route::post('/lsport_fixture/FoolballEN', 'App\Http\Controllers\LsportFixtureController@MatchListFoolballEN');
Route::post('/lsport_fixture/FoolballCN', 'App\Http\Controllers\LsportFixtureController@MatchListFoolballCN');

Route::post('/lsport_fixture/BaseballTW', 'App\Http\Controllers\LsportFixtureController@MatchListBaseballTW');
Route::post('/lsport_fixture/BaseballEN', 'App\Http\Controllers\LsportFixtureController@MatchListBaseballEN');
Route::post('/lsport_fixture/BaseballCN', 'App\Http\Controllers\LsportFixtureController@MatchListBaseballCN');

Route::post('/lsport_fixture/BasketballTW', 'App\Http\Controllers\LsportFixtureController@MatchListBasketballTW');
Route::post('/lsport_fixture/BasketballEN', 'App\Http\Controllers\LsportFixtureController@MatchListBasketballEN');
Route::post('/lsport_fixture/BasketballCN', 'App\Http\Controllers\LsportFixtureController@MatchListBasketballCN');

Route::post('/lsport_fixture/IcehockeyTW', 'App\Http\Controllers\LsportFixtureController@MatchListIcehockeyTW');
Route::post('/lsport_fixture/IcehockeyEN', 'App\Http\Controllers\LsportFixtureController@MatchListIcehockeyEN');
Route::post('/lsport_fixture/IcehockeyCN', 'App\Http\Controllers\LsportFixtureController@MatchListIcehockeyCN');

Route::post('/lsport_fixture/AmericanFootballTW', 'App\Http\Controllers\LsportFixtureController@MatchListAmericanFootballTW');
Route::post('/lsport_fixture/AmericanFootballEN', 'App\Http\Controllers\LsportFixtureController@MatchListAmericanFootballEN');
Route::post('/lsport_fixture/AmericanFootballCN', 'App\Http\Controllers\LsportFixtureController@MatchListAmericanFootballCN');

// Lsport Fixture , Redis腳本 RISK 版
Route::post('/lsport_fixture/RiskFoolballTW', 'App\Http\Controllers\LsportFixtureController@RiskMatchListFoolballTW');
Route::post('/lsport_fixture/RiskFoolballEN', 'App\Http\Controllers\LsportFixtureController@RiskMatchListFoolballEN');
Route::post('/lsport_fixture/RiskFoolballCN', 'App\Http\Controllers\LsportFixtureController@RiskMatchListFoolballCN');

Route::post('/lsport_fixture/RiskBaseballTW', 'App\Http\Controllers\LsportFixtureController@RiskMatchListBaseballTW');
Route::post('/lsport_fixture/RiskBaseballEN', 'App\Http\Controllers\LsportFixtureController@RiskMatchListBaseballEN');
Route::post('/lsport_fixture/RiskBaseballCN', 'App\Http\Controllers\LsportFixtureController@RiskMatchListBaseballCN');

Route::post('/lsport_fixture/RiskBasketballTW', 'App\Http\Controllers\LsportFixtureController@RiskMatchListBasketballTW');
Route::post('/lsport_fixture/RiskBasketballEN', 'App\Http\Controllers\LsportFixtureController@RiskMatchListBasketballEN');
Route::post('/lsport_fixture/RiskBasketballCN', 'App\Http\Controllers\LsportFixtureController@RiskMatchListBasketballCN');

Route::post('/lsport_fixture/RiskIcehockeyTW', 'App\Http\Controllers\LsportFixtureController@RiskMatchListIcehockeyTW');
Route::post('/lsport_fixture/RiskIcehockeyEN', 'App\Http\Controllers\LsportFixtureController@RiskMatchListIcehockeyEN');
Route::post('/lsport_fixture/RiskIcehockeyCN', 'App\Http\Controllers\LsportFixtureController@RiskMatchListIcehockeyCN');

Route::post('/lsport_fixture/RiskAmericanFootballTW', 'App\Http\Controllers\LsportFixtureController@RiskMatchListAmericanFootballTW');
Route::post('/lsport_fixture/RiskAmericanFootballEN', 'App\Http\Controllers\LsportFixtureController@RiskMatchListAmericanFootballEN');
Route::post('/lsport_fixture/RiskAmericanFootballCN', 'App\Http\Controllers\LsportFixtureController@RiskMatchListAmericanFootballCN');

/////////////////////////////////////////

Route::get('/lsport_fixture/test', 'App\Http\Controllers\LsportFixtureController@test');

Route::get('/lsport_notice', 'App\Http\Controllers\LsportNoticeController@index');
Route::post('/lsport_notice', 'App\Http\Controllers\LsportNoticeController@index');


Route::get('/lsport_risk', 'App\Http\Controllers\LsportRiskController@index');

// 需權限頁
Route::get('/admin', 'App\Http\Controllers\AdminUserController@index');
Route::get('/admin/user', 'App\Http\Controllers\AdminUserController@index');
Route::get('/admin/permission', 'App\Http\Controllers\AdminPermissionController@index');
Route::get('/admin/operation', 'App\Http\Controllers\AdminOperationController@index');
Route::get('/admin/config', 'App\Http\Controllers\AdminConfigController@index');

Route::get('/agent', 'App\Http\Controllers\AgentUserController@index');
Route::get('/agent/user', 'App\Http\Controllers\AgentUserController@index');
Route::get('/agent/report', 'App\Http\Controllers\AgentReportController@index');
Route::get('/agent/bill', 'App\Http\Controllers\AgentBillController@index');
Route::get('/agent/player', 'App\Http\Controllers\AgentPlayerController@index');
Route::get('/agent/limit', 'App\Http\Controllers\AgentLimitController@index');

Route::get('/sport/order', 'App\Http\Controllers\SportOrderController@index');
Route::get('/sport/review', 'App\Http\Controllers\SportReviewController@index');
Route::get('/sport/series', 'App\Http\Controllers\SportSeriesController@index');
Route::get('/sport/notice', 'App\Http\Controllers\SportNoticeController@index');
Route::get('/sport/setting', 'App\Http\Controllers\SportSettingController@index');
Route::get('/sport/test', 'App\Http\Controllers\SportSeriesController@test');

Route::get('/sport/risk', 'App\Http\Controllers\SportRiskController@index');
Route::post('/sport/setRisk', 'App\Http\Controllers\SportRiskController@setRisk');

Route::get('/sport/riskorder', 'App\Http\Controllers\RiskOrderController@index');
Route::get('/sport/riskorder/cancel', 'App\Http\Controllers\RiskOrderController@cancel');
Route::get('/sport/riskorder/approval', 'App\Http\Controllers\RiskOrderController@approval');

Route::post('/sport/syncRisk', 'App\Http\Controllers\SportRiskController@syncRisk'); // 腳本
Route::get('/sport/cleanRisk', 'App\Http\Controllers\SportRiskController@cleanRisk'); 
Route::get('/sport/getRisk', 'App\Http\Controllers\SportRiskController@getRisk'); 

// 測試用
Route::get('/test/recharge', 'App\Http\Controllers\SportTestController@recharge');
Route::get('/test/withdraw', 'App\Http\Controllers\SportTestController@withdraw');

// API
Route::post('/api/create_admin', 'App\Http\Controllers\AdminUserController@create_admin');
Route::get('/api/active_admin', 'App\Http\Controllers\AdminUserController@active_admin');  // 此處用get
Route::post('/api/get_admin', 'App\Http\Controllers\AdminUserController@get_admin');
Route::post('/api/edit_admin', 'App\Http\Controllers\AdminUserController@edit_admin');

Route::post('/api/create_permission', 'App\Http\Controllers\AdminPermissionController@create_permission');
Route::post('/api/get_permission', 'App\Http\Controllers\AdminPermissionController@get_permission');
Route::post('/api/edit_permission', 'App\Http\Controllers\AdminPermissionController@edit_permission');

Route::post('/api/create_agent', 'App\Http\Controllers\AgentUserController@create_agent');
Route::post('/api/get_agent', 'App\Http\Controllers\AgentUserController@get_agent');
Route::post('/api/edit_agent', 'App\Http\Controllers\AgentUserController@edit_agent');

Route::post('/api/get_notice', 'App\Http\Controllers\SportNoticeController@get_notice');
Route::post('/api/edit_notice', 'App\Http\Controllers\SportNoticeController@edit_notice');

Route::post('/api/get_agent_limit', 'App\Http\Controllers\AgentLimitController@get_agent_limit');
Route::post('/api/edit_agent_limit', 'App\Http\Controllers\AgentLimitController@edit_agent_limit');

Route::post('/api/get_player', 'App\Http\Controllers\AgentPlayerController@get_player');
Route::post('/api/edit_player', 'App\Http\Controllers\AgentPlayerController@edit_player');

Route::get('/api/active_series', 'App\Http\Controllers\SportSeriesController@active_series');  // 此處用get
Route::get('/api/increase_version', 'App\Http\Controllers\AdminConfigController@increase_version');  // 此處用get

Route::post('/api/fixture_enable', 'App\Http\Controllers\SportRiskController@setFixtureEnable');
Route::post('/api/match_index', 'App\Http\Controllers\SportRiskController@MatchIndex');
Route::post('/api/match_sport', 'App\Http\Controllers\SportRiskController@MatchSport');
Route::get('/api/match_index', 'App\Http\Controllers\SportRiskController@MatchIndex');

Route::post('/api/edit_sport_setting', 'App\Http\Controllers\SportSettingController@edit');


// Lsport Translation API , 暫停使用
Route::post('/translateLsport/sport', 'App\Http\Controllers\TranslateController@sport');
Route::post('/translateLsport/league', 'App\Http\Controllers\TranslateController@league');
Route::post('/translateLsport/team', 'App\Http\Controllers\TranslateController@team');

// Google Translation API
Route::post('/translate/sport', 'App\Http\Controllers\TranslateGoogleController@sport');
Route::post('/translate/league', 'App\Http\Controllers\TranslateGoogleController@league');
Route::post('/translate/team', 'App\Http\Controllers\TranslateGoogleController@team');

// 找出到期的延遲注單,抓出當前賠率,並更新注單狀態
Route::post('/delay_bet', 'App\Http\Controllers\DelayBetController@process');
Route::get('/delay_bet', 'App\Http\Controllers\DelayBetController@process');

// 維護腳本
Route::post('/maintain/lsport_events', 'App\Http\Controllers\MaintainController@LsportEvents');
Route::post('/maintain/game_order', 'App\Http\Controllers\MaintainController@GameOrder');
Route::post('/maintain/balance_logs', 'App\Http\Controllers\MaintainController@PlayerBalanceLogs');
Route::post('/maintain/lsport_fixture', 'App\Http\Controllers\MaintainController@LsportFixture');
