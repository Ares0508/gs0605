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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth:eigyo'], function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home-tablet', [App\Http\Controllers\HomeController::class, 'indexTablet'])->name('home-tablet');

//認証後で
Route::get('/home', 'App\Http\Controllers\HomeController@index');
Route::get('/home-tablet', 'App\Http\Controllers\HomeController@indexTablet');


/* 受付管理 */
Route::get('appointment/create2/{user}/{appt}', 'App\Http\Controllers\AppointmentController@create2');
Route::get('appointment/confirm', 'App\Http\Controllers\AppointmentController@confirm');
Route::get('appointment/done', 'App\Http\Controllers\AppointmentController@done');
Route::get('appointment/search', 'App\Http\Controllers\AppointmentController@search');
Route::resource('appointment', 'App\Http\Controllers\AppointmentController');
Route::get('ajax/appt', 'App\Http\Controllers\AppointmentController@getData'); //BootstrapTable

/*顧客検索 */


/* 結果管理 */
Route::get('result/waiting', 'App\Http\Controllers\ResultController@indexNull');
Route::get('ajax/result/waiting', 'App\Http\Controllers\ResultController@getNull'); //BootstrapTable
Route::get('result', 'App\Http\Controllers\ResultController@index');
Route::get('ajax/result', 'App\Http\Controllers\ResultController@getData'); //BootstrapTable

/* 結果報告 */
Route::get('result/create', 'App\Http\Controllers\ResultController@create');
Route::get('result/create2', 'App\Http\Controllers\ResultController@create2');
Route::get('result/signature', 'App\Http\Controllers\ResultController@signature');

/* 計算用 */
Route::post('calculate', 'App\Http\Controllers\CalculateController@calculate');

/* 業務日報 */
Route::get('report', 'App\Http\Controllers\ReportController@index');

/* 目標設定 */
Route::resource('goal', 'App\Http\Controllers\GoalController');

/* Fullcalendar */
Route::get('/setEvents', 'App\Http\Controllers\CalendarController@setEvents');
Route::post('/ajax/addEvent', 'App\Http\Controllers\CalendarController@addEvent');
Route::post('/ajax/editEventDate', 'App\Http\Controllers\CalendarController@editEventDate');
Route::post('/setResources', 'App\Http\Controllers\CalendarController@setResources');

/* スタッフ管理 */
Route::resource('emp', 'App\Http\Controllers\EmployeeController');
Route::get('ajax/emp', 'App\Http\Controllers\EmployeeController@getData'); //BootstrapTable

/* 権限管理 */
Route::resource('role', 'App\Http\Controllers\RoleController');

/* シフト管理 */
Route::resource('shift', 'App\Http\Controllers\ShiftController');

/* 顧客管理 */
Route::resource('customer', 'App\Http\Controllers\CustomerController');
Route::get('ajax/customer', 'App\Http\Controllers\CustomerController@getData'); //BootstrapTable

/* ポスティング */
Route::resource('posting', 'App\Http\Controllers\PostingController');
Route::get('ajax/posting', 'App\Http\Controllers\PostingController@getData');

/* ポスティング業者 */
Route::resource('posting-vender', 'App\Http\Controllers\PostingVenderController');
Route::get('ajax/posting-vender', 'App\Http\Controllers\PostingVenderController@getData'); //BootstrapTable

//所要時間計算Ajaxフォーム
Route::match(['get','post'], 'distance/{mode?}/{target?}/{table?}/{id?}', 'App\Http\Controllers\Ajax\DistanceController@index');
