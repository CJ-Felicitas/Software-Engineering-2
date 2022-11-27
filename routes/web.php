<?php

use App\Http\Controllers\crud;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutcontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
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
    return view('index');
});

Route::get('/staffdashboard', function () { 
    return view('staff/dashboard');
})->middleware('checkUser');

Route::get('/staffmanagement', function () {
    return view('admin/staffmanagement');
})->middleware('checkUser2');

Route::post('/login', [loginController::class, 'login']);

Route::get('/productmanagement', function () {
    return view('admin/product');
})->middleware('checkUser2');

Route::get('/salesmanagement', function () {
    return view('admin/sales');
})->middleware('checkUser2');

Route::post('/addtocart', [dashboardcontroller::class, 'addtocart']);

Route::post('/checkout', [dashboardcontroller::class, 'checkout']);

Route::get('/customermanagement', function () {
    return view('staff/customer');
})->middleware('checkUser');

Route::post('/crud', [crud::class, 'edit']);

Route::get('/profile', function () {
    return view('staff/profile');
})->middleware('checkUser');

Route::get('/logout', function () {
    Session::forget('staff');
    Session::forget('admin');
    Session::forget('staff_id');
    Session::forget('branch_id');
    
    return redirect('/');
});

Route::get('/newemp', function () {
    return view('register');
});


Route::post('/receipt', [dashboardcontroller::class, 'receipt']);

Route::post('/changePW', [loginController::class, 'changePW']);