<?php

use Illuminate\Http\Request;

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



Route::middleware('auth')->get('/', "MyController@showHome");
Route::middleware('auth')->get('send/', "MyController@demoSendEmail");
Route::middleware('auth')->get('create_excel/', "MyController@createExcel");
Route::middleware('auth:api')->get('/user', function(Request $request) {
    return $request->user();
});

Route::middleware('auth')->get('show-session/', 'MyController@showSession');
Route::middleware('auth')->post('create-session/', 'MyController@registerSession');
Route::middleware('auth')->get('destroy-session/', 'MyController@deleteSession');

Auth::routes();

Route::middleware('auth')->get('/home', 'HomeController@index')->name('home');
