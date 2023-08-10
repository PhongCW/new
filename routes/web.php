<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post("/login", "App\Http\Controllers\UserController@login");

Route::get("/ShowStaffListScreen", "App\Http\Controllers\UserController@ShowStaffListScreen");

Route::post("/DeleteStaff", "App\Http\Controllers\UserController@DeleteStaff");

Route::post("/StaffCreate", "App\Http\Controllers\UserController@StaffCreate");

Route::post("/Staff_Detail_Edit", "\App\Http\Controllers\UserController@Staff_Detail_Edit");


