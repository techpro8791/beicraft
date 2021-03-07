<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
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
# Email Verification Route
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

# Welcome Page Route
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

/*------------------------------ Admin Controller Routes ----------------------------------------*/
# Logout
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

# User Management
Route::prefix('users')->group(function(){
    # User View
    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    # Add User
    Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');
    # Store User
    Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
});
