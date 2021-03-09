<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
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

# Setup Group
Route::prefix('setups')->group(function(){
    /* ----------------------------------------------- Student Class -------------------------------------------- */
    # class setup View
    Route::get('student/class/view', [StudentClassController::class, 'ViewClass'])->name('student.class.view');
    # add student class
    Route::get('student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');
    # store student class
    Route::post('student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('student.class.store');
    # edit student class
    Route::get('student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
    # update student class
    Route::post('student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('student.class.update');
    # delete student class
    Route::get('student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');

    /* ----------------------------------------------- Student Year ---------------------------------------------- */
    # year setup View
    Route::get('student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');
    # add student year
    Route::get('student/year/add', [StudentYearController::class, 'StudentYearAdd'])->name('student.year.add');
    # store student year
    Route::post('student/year/store', [StudentYearController::class, 'StudentYearStore'])->name('student.year.store');
    # edit student year
    Route::get('student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');
    # update student year
    Route::post('student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('student.year.update');
    # delete student year
    Route::get('student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');

    /* ----------------------------------------------- Student Group ---------------------------------------------- */
    # group setup View
    Route::get('student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');
    # add student group
    Route::get('student/group/add', [StudentGroupController::class, 'StudentGroupAdd'])->name('student.group.add');
    # store student group
    Route::post('student/group/store', [StudentGroupController::class, 'StudentGroupStore'])->name('student.group.store');
    # edit student group
    Route::get('student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');
    # update student group
    Route::post('student/group/update/{id}', [StudentGroupController::class, 'StudentGroupUpdate'])->name('student.group.update');
    # delete student group
    Route::get('student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');

    /* ----------------------------------------------- Student Shift ---------------------------------------------- */
    # shift setup View
    Route::get('student/shift/view', [StudentShiftController::class, 'ViewShift'])->name('student.shift.view');
    # add student shift
    Route::get('student/shift/add', [StudentShiftController::class, 'StudentShiftAdd'])->name('student.shift.add');
    # store student shift
    Route::post('student/shift/store', [StudentShiftController::class, 'StudentShiftStore'])->name('student.shift.store');
    # edit student shift
    Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');
    # update student shift
    Route::post('student/shift/update/{id}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('student.shift.update');
    # delete student shift
    Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');

    /* ----------------------------------------------- Fee Category ---------------------------------------------- */
    # fee category setup View
    Route::get('fee/category/view', [FeeCategoryController::class, 'ViewFeeCategory'])->name('fee.category.view');
    # add fee category
    Route::get('student/category/add', [FeeCategoryController::class, 'FeeCategoryAdd'])->name('fee.category.add');
    # store fee category
    Route::post('student/category/store', [FeeCategoryController::class, 'FeeCategoryStore'])->name('fee.category.store');
    # edit fee category
    Route::get('student/category/edit/{id}', [FeeCategoryController::class, 'FeeCategoryEdit'])->name('fee.category.edit');
    # update fee category
    Route::post('student/category/update/{id}', [FeeCategoryController::class, 'FeeCategoryUpdate'])->name('fee.category.update');
    # delete fee category
    Route::get('student/category/delete/{id}', [FeeCategoryController::class, 'FeeCategoryDelete'])->name('fee.category.delete');

    /* ----------------------------------------------- Fee Amount ---------------------------------------------- */
    # fee amount setup View
    Route::get('fee/amount/view', [FeeAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');
    # add fee amountv
    Route::get('student/amount/add', [FeeAmountController::class, 'FeeAmountAdd'])->name('fee.amount.add');
    // # store fee amount
    // Route::post('student/amount/store', [FeeAmountController::class, 'FeeAmountStore'])->name('fee.amount.store');
    // # edit fee amount
    // Route::get('student/amount/edit/{id}', [FeeAmountController::class, 'FeeAmountEdit'])->name('fee.amount.edit');
    // # update fee amount
    // Route::post('student/amount/update/{id}', [FeeAmountController::class, 'FeeAmountUpdate'])->name('fee.amount.update');
    // # delete fee amount
    // Route::get('student/amount/delete/{id}', [FeeAmountController::class, 'FeeAmountDelete'])->name('fee.amount.delete');

});
