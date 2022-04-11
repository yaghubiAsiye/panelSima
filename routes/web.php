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
Route::get('/Tdl/show/{id}','TdlController@show')->middleware('auth');


// TimeSheet
Route::get('/timesheet','TimeSheetController@index')->middleware('auth');
Route::post('/timesheet/add','TimeSheetController@store')->middleware('auth');
Route::get('/timesheet/delete/{id}','TimeSheetController@destroy')->middleware('auth');
Route::get('/timesheet/show/{id}','TimeSheetController@show')->middleware('auth');


// Projects
Route::get('/projects','ProjectController@index')->middleware('auth');

//Avl
Route::get('avl','AvlController@index')->middleware('auth');
Route::post('avl','AvlController@store')->middleware('auth');
Route::get('avl/delete/{id}','AvlController@destroy')->middleware('auth');
Route::get('avl/edit/{id}','AvlController@edit')->middleware('auth');
Route::post('avl/update/{id}','AvlController@update')->middleware('auth');
Route::get('avl/show/{id}','AvlController@show')->middleware('auth');



//ContractsKarfarmayan
Route::get('contracts','ContractController@index')->middleware('auth');
Route::post('contracts','ContractController@store')->middleware('auth');
Route::get('contracts/delete/{id}','ContractController@destroy')->middleware('auth');
Route::get('contracts/edit/{id}','ContractController@edit')->middleware('auth');
Route::post('contracts/update/{id}','ContractController@update')->middleware('auth');
Route::get('contracts/show/{id}','ContractController@show')->middleware('auth');


//ContractsSellers
Route::get('SellersContracts','SellerContractController@index')->middleware('auth');
Route::post('SellersContracts','SellerContractController@store')->middleware('auth');
Route::get('SellerContract/delete/{id}','SellerContractController@destroy')->middleware('auth');
Route::get('SellerContract/edit/{id}','SellerContractController@edit')->middleware('auth');
Route::post('SellerContract/update/{id}','SellerContractController@update')->middleware('auth');
Route::get('SellerContract/show/{id}','SellerContractController@show')->middleware('auth');


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


//Dokumentation
Route::get('Dokumentation','DokumentationController@index')->middleware('auth');
Route::post('Dokumentation','DokumentationController@store')->middleware('auth');
Route::get('Dokumentation/delete/{id}','DokumentationController@destroy')->middleware('auth');
Route::get('Dokumentation/edit/{id}','DokumentationController@edit')->middleware('auth');
Route::post('Dokumentation/update/{id}','DokumentationController@update')->middleware('auth');



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
Route::get('tenders/show/{id}','TenderController@show')->middleware('auth');


//phone book
Route::get('phoneBooks','PhoneBookController@index')->middleware('auth');
Route::post('phoneBooks','PhoneBookController@store')->middleware('auth');
Route::get('phoneBook/delete/{id}','PhoneBookController@destroy')->middleware('auth');
Route::post('phoneBook/update/{id}','PhoneBookController@update')->middleware('auth');

//archives
Route::get('archives/{type}','ArchiveController@index')->middleware('auth');
Route::post('archives','ArchiveController@store')->middleware('auth');
Route::delete('archive/delete/{id}','ArchiveController@destroy')->middleware('auth')->name('archive.delete');
Route::post('archive/update/{id}','ArchiveController@update')->middleware('auth');

//regulartions
Route::get('regulations','RegulationController@index')->middleware('auth');
Route::post('regulations','RegulationController@store')->middleware('auth');
Route::get('regulation/delete/{id}','RegulationController@destroy')->middleware('auth');
Route::post('regulation/update/{id}','RegulationController@update')->middleware('auth');


//Instructions
Route::get('instructions','InstructionController@index')->middleware('auth');
Route::post('instructions','InstructionController@store')->middleware('auth');
Route::get('instruction/delete/{id}','InstructionController@destroy')->middleware('auth');
Route::post('instruction/update/{id}','InstructionController@update')->middleware('auth');


//invoices
Route::get('invoices','InvoiceController@index')->middleware('auth');
Route::post('invoices','InvoiceController@store')->middleware('auth');
Route::get('invoice/create','InvoiceController@create')->middleware('auth');
Route::get('invoice/delete/{id}','InvoiceController@destroy')->middleware('auth');
Route::post('invoice/update/{id}','InvoiceController@update')->middleware('auth');

//excel
Route::get('downloadExcel/{type}/{id}', 'ExcelController@downloadExcel');
Route::get('invoiceExcel/{id}', 'ExcelController@viewExcel');


// FinancialGuarantee
Route::get('financialGuarantes','FinancialGuaranteeController@index')->middleware('auth');
Route::post('financialGuarantee‍','FinancialGuaranteeController@store')->middleware('auth')->name('financialGuarantee.store');
Route::get('financialGuarantee/delete/{id}','FinancialGuaranteeController@destroy')->middleware('auth');
Route::post('financialGuarantee/update/{id}','FinancialGuaranteeController@update')->middleware('auth');
Route::post('financialGuarantee/updateEndDate/{id}','FinancialGuaranteeController@updateEndDate')->middleware('auth');


// DailyWork
Route::get('dailyWork','DailyWorkController@index')->middleware('auth');
Route::get('dailyWorkAllUser','DailyWorkController@dailyAlluser')->middleware('auth');

Route::post('dailyWork','DailyWorkController@store')->middleware('auth')->name('dailyWork.store');
// Route::get('financialGuarantee/delete/{id}','DailyWorkController@destroy')->middleware('auth');
// Route::post('financialGuarantee/update/{id}','DailyWorkController@update')->middleware('auth');



//PurchaseRequest
Route::get('PurchaseRequest','PurchaseRequestController@index')->middleware('auth');
Route::post('PurchaseRequest','PurchaseRequestController@store')->middleware('auth');
Route::get('PurchaseRequest/create','PurchaseRequestController@create')->middleware('auth');

Route::get('PurchaseRequest/delete/{id}','PurchaseRequestController@destroy')->middleware('auth');
Route::get('PurchaseRequest/edit/{id}','PurchaseRequestController@edit')->middleware('auth');
Route::post('PurchaseRequest/update/{id}','PurchaseRequestController@update')->middleware('auth');
Route::get('PurchaseRequest/show/{id}','PurchaseRequestController@show')->middleware('auth');



//CommissionMajor
Route::get('CommissionMajor','CommissionMajorController@index')->middleware('auth');
Route::post('CommissionMajor','CommissionMajorController@store')->middleware('auth');
// Route::get('CommissionMajor/delete/{id}','CommissionMajorController@destroy')->middleware('auth');
// Route::get('CommissionMajor/edit/{id}','CommissionMajorController@edit')->middleware('auth');
Route::post('CommissionMajor/update/{id}','CommissionMajorController@update')->middleware('auth');
// Route::get('CommissionMajor/show/{id}','CommissionMajorController@show')->middleware('auth');


//CommissionMedium
Route::get('CommissionMedium','CommissionMediumController@index')->middleware('auth');
Route::post('CommissionMedium','CommissionMediumController@store')->middleware('auth');
// Route::get('CommissionMedium/delete/{id}','CommissionMediumController@destroy')->middleware('auth');
// Route::get('CommissionMedium/edit/{id}','CommissionMediumController@edit')->middleware('auth');
Route::post('CommissionMedium/update/{id}','CommissionMediumController@update')->middleware('auth');
// Route::get('CommissionMedium/show/{id}','CommissionMediumController@show')->middleware('auth');


//CommissionPartial
Route::get('CommissionPartial','CommissionPartialController@index')->middleware('auth');
Route::post('CommissionPartial','CommissionPartialController@store')->middleware('auth');
// Route::get('CommissionPartial/delete/{id}','CommissionPartialController@destroy')->middleware('auth');
// Route::get('CommissionPartial/edit/{id}','CommissionPartialController@edit')->middleware('auth');
Route::post('CommissionPartial/update','CommissionPartialController@update')->middleware('auth');
// Route::get('CommissionPartial/show/{id}','CommissionPartialController@show')->middleware('auth');
Route::get('CommissionPartial/storeIdeaComisiun','CommissionPartialController@storeIdeaComisiun')->middleware('auth');

//confirm
Route::get('CommissionPartial/Confirm','ConfirmController@store')->middleware('auth');
// Route::get('CommissionPartial','ConfirmController@create')->middleware('auth');
