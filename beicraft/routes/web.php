<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
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

# User Group
Route::prefix('users')->group(function(){
    # User View
    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    # Add User
    Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');
    # Store User
    Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
    # Edit
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
    # Update
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
    # Delete
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');

});

# User Profile Group
Route::prefix('profiles')->group(function(){
    # profile View
    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    # Edit
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    # Update
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    # Password
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    # Update
    Route::post('/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');

});
