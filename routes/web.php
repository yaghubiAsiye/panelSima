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
Route::post('/Tdl/updateDoer','TdlController@updateDoer')->middleware('auth');
Route::post('/Tdl/updateAssignedToOther','TdlController@updateAssignedToOther')->middleware('auth');
Route::post('/Tdl/addTdl','TdlController@store')->middleware('auth');
Route::get('/Tdl/delete/{id}','TdlController@destroy')->middleware('auth');


// TimeSheet
Route::get('/timesheet','TimeSheetController@index')->middleware('auth');
Route::post('/timesheet/add','TimeSheetController@store')->middleware('auth');
Route::get('/timesheet/delete/{id}','TimeSheetController@destroy')->middleware('auth');


// Projects
Route::get('/projects','ProjectController@index')->middleware('auth');

//Avl
Route::get('avl','AvlController@index')->middleware('auth');
Route::post('avl','AvlController@store')->middleware('auth');
Route::get('avl/delete/{id}','AvlController@destroy')->middleware('auth');
Route::get('avl/edit/{id}','AvlController@edit')->middleware('auth');
Route::post('avl/update/{id}','AvlController@update')->middleware('auth');



//ContractsKarfarmayan
Route::get('contracts','ContractController@index')->middleware('auth');
Route::post('contracts','ContractController@store')->middleware('auth');
Route::get('contracts/delete/{id}','ContractController@destroy')->middleware('auth');
Route::get('contracts/edit/{id}','ContractController@edit')->middleware('auth');
Route::post('contracts/update/{id}','ContractController@update')->middleware('auth');


//ContractsSellers
Route::get('SellersContracts','SellerContractController@index')->middleware('auth');
Route::post('SellersContracts','SellerContractController@store')->middleware('auth');
Route::get('SellerContract/delete/{id}','SellerContractController@destroy')->middleware('auth');
Route::get('SellerContract/edit/{id}','SellerContractController@edit')->middleware('auth');
Route::post('SellerContract/update/{id}','SellerContractController@update')->middleware('auth');


//Proceeding
Route::get('ProceedingsApi','ProceedingController@indexApi');
Route::get('Proceedings','ProceedingController@index')->middleware('auth');
Route::post('Proceedings','ProceedingController@store')->middleware('auth');
Route::post('Proceedings/update','ProceedingController@update')->middleware('auth');
Route::get('Proceedings/delete/{id}','ProceedingController@destroy')->middleware('auth');


//Certificates
Route::get('Certificates','CertificatesController@index')->middleware('auth');
Route::post('Certificates','CertificatesController@store')->middleware('auth');
Route::get('Certificates/delete/{id}','CertificatesController@destroy')->middleware('auth');
Route::get('Certificates/edit/{id}','CertificatesController@edit')->middleware('auth');
Route::post('Certificates/update/{id}','CertificatesController@update')->middleware('auth');




//Suggestions
Route::get('Suggestions','SuggestionController@index')->middleware('auth');
Route::post('Suggestions','SuggestionController@store')->middleware('auth');
Route::get('Suggestions/delete/{id}','SuggestionController@destroy')->middleware('auth');



//Income Contracts
Route::get('IncomeContracts','IncomeContractController@index')->middleware('auth');
Route::post('IncomeContracts','IncomeContractController@store')->middleware('auth');
Route::get('IncomeContracts/delete/{id}','IncomeContractController@destroy')->middleware('auth');


//Tenders
Route::get('tenders','TenderController@index')->middleware('auth');
Route::post('tenders','TenderController@store')->middleware('auth');
Route::get('tenders/edit/{id}','TenderController@edit')->middleware('auth')->name('tenders.edit');
Route::post('tenders/update/{id}','TenderController@update')->middleware('auth')->name('tenders.update');
Route::get('tenders/delete/{id}','TenderController@destroy')->middleware('auth');
