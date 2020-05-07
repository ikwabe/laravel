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

Route::get('/empRegister','Controller\Employee@index');
Route::get('/allowRegister','Controller\allowance@index');
Route::get('/salary','Controller\salary@index');
Route::get('/allocateAllowance','Controller\allocateAllowance@index');
Route::get('/salaryPayment','Controller\salaryPayment@index');
