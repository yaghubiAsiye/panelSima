<?php

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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Index
Route::get('/','DashboardController@index')->middleware('auth');

// Dashboards
Route::get('/dashboard','DashboardController@index')->middleware('auth');



// Users
Route::get('users','UserController@index')->middleware('auth');
Route::get('users/deleteUser/{id}','UserController@destroy')->middleware('auth');
Route::post('users/editUser/','UserController@update')->middleware('auth');
Route::post('users/addUser/','UserController@create')->middleware('auth');

// Profile
Route::get('profile','UserController@profileIndex')->middleware('auth');
Route::post('profile/updateInformation','UserController@updateInformation')->middleware('auth');
Route::post('profile/updatePassword','UserController@updatePassword')->middleware('auth');
Route::post('profile/updateAvatar','UserController@updateAvatar')->middleware('auth');


// TodoList
Route::post('/Tdl/updateFromDoer','TdlController@updateFromDoer')->middleware('auth');
Route::post('/Tdl/addTdl','TdlController@store')->middleware('auth');
Route::get('/Tdl/delete/{id}','TdlController@destroy')->middleware('auth');


// TimeSheet
Route::get('/timesheet','TimeSheetController@index')->middleware('auth');
Route::post('/timesheet/add','TimeSheetController@store')->middleware('auth');
Route::get('/timesheet/delete/{id}','TimeSheetController@destroy')->middleware('auth');
