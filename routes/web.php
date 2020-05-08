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
//get Route
Route::get('/', function () {
    return view('welcome');
});

Route::get('/empRegister','Controller\Employee@index');
Route::get('/allowRegister','Controller\allowance@index');
Route::get('/salary','Controller\salary@index');
Route::get('/allocateAllowance','Controller\allocateAllowance@index');
Route::get('/salaryPayment','Controller\salaryPayment@index');
Route::get('/reportView','Controller\report@index');

//post Route
Route::post('empcreate','Controller\Employee@create');
Route::post('salcreate','Controller\salaryPayment@create');
Route::post('allowcreate','Controller\allowance@create');
Route::post('allowalo','Controller\allocateAllowance@create');
Route::post('salaryReg','Controller\salary@create');
Route::post('report','Controller\report@create');
