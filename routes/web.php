<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
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

Auth::routes();

Route::group(['middleware' => 'auth:eigyo'], function () {
    return view('welcome');
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//認証後で
Route::get('/home', 'App\Http\Controllers\HomeController@index');
Route::get('/home-tablet', 'App\Http\Controllers\HomeController@indexTablet');

Route::middleware(['role'])->group(function () {



    /* 受付管理 */
    Route::get('appointment/create2/{id}', 'App\Http\Controllers\AppointmentController@create2');
    Route::get('appointment/confirm/{id}', 'App\Http\Controllers\AppointmentController@confirm');
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
    Route::get('result/create/select', 'App\Http\Controllers\ResultController@select');
    Route::get('result/create', 'App\Http\Controllers\ResultController@create');
    Route::get('result/create2', 'App\Http\Controllers\ResultController@create2');
    Route::get('result/signature', 'App\Http\Controllers\ResultController@signature');
    Route::get('result/done', 'App\Http\Controllers\ResultController@done');
    Route::resource('result', 'App\Http\Controllers\ResultController');

    /* 計算用 */
    Route::post('calculate', 'App\Http\Controllers\CalculateController@calculate');

    /* 業務日報 */
    Route::get('report', 'App\Http\Controllers\ReportController@index');
    Route::get('report/ajax/show', 'App\Http\Controllers\ReportController@getData');

    /* 目標設定 */
    Route::get('goal/ajax/show', 'App\Http\Controllers\GoalController@getData');
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
    Route::get('shift/ajax/show', 'App\Http\Controllers\ShiftController@getData');
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
});

