<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;

use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Student\StudentRegController;
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
    # store fee amount
    Route::post('student/amount/store', [FeeAmountController::class, 'FeeAmountStore'])->name('fee.amount.store');
    # edit fee amount
    Route::get('student/amount/edit/{fee_category_id}', [FeeAmountController::class, 'FeeAmountEdit'])->name('fee.amount.edit');
    # update fee amount
    Route::post('student/amount/update/{fee_category_id}', [FeeAmountController::class, 'FeeAmountUpdate'])->name('fee.amount.update');
    # details fee amount
    Route::get('student/amount/details/{fee_category_id}', [FeeAmountController::class, 'FeeAmountDetails'])->name('fee.amount.details');

    /* ----------------------------------------------- Exam Type ---------------------------------------------- */
    # View exam type
    Route::get('exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');
    # add exam type
    Route::get('exam/type/add', [ExamTypeController::class, 'ExamTypeAdd'])->name('exam.type.add');
    # store exam type
    Route::post('exam/type/store', [ExamTypeController::class, 'ExamTypeStore'])->name('exam.type.store');
    # edit exam type
    Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])->name('exam.type.edit');
    # update exam type
    Route::post('exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])->name('exam.type.update');
    # delete exam type
    Route::get('exam/type/details/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');

    /* ----------------------------------------------- School Subject ---------------------------------------------- */
    # View school subject
    Route::get('school/subject/view', [SchoolSubjectController::class, 'ViewSchoolSubject'])->name('school.subject.view');
    # add school subject
    Route::get('school/subject/add', [SchoolSubjectController::class, 'SchoolSubjectAdd'])->name('school.subject.add');
    # store school subject
    Route::post('school/subject/store', [SchoolSubjectController::class, 'SchoolSubjectStore'])->name('school.subject.store');
    # edit school subject
    Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'SchoolSubjectEdit'])->name('school.subject.edit');
    # update school subject
    Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'SchoolSubjectUpdate'])->name('school.subject.update');
    # delete school subject
    Route::get('school/subject/details/{id}', [SchoolSubjectController::class, 'SchoolSubjectDelete'])->name('school.subject.delete');

    /* ----------------------------------------------- Assign Subject ---------------------------------------------- */
    # View assign subject
    Route::get('assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');
    # add assign subject
    Route::get('assign/subject/add', [AssignSubjectController::class, 'AssignSubjectAdd'])->name('assign.subject.add');
    # store assign subject
    Route::post('assign/subject/store', [AssignSubjectController::class, 'AssignSubjectStore'])->name('assign.subject.store');
    # edit assign subject
    Route::get('assign/subject/edit/{class_id}', [AssignSubjectController::class, 'AssignSubjectEdit'])->name('assign.subject.edit');
    # update assign subject
    Route::post('assign/subject/update/{class_id}', [AssignSubjectController::class, 'AssignSubjectUpdate'])->name('assign.subject.update');
    # delete assign subject
    Route::get('assign/subject/details/{class_id}', [AssignSubjectController::class, 'AssignSubjectDetails'])->name('assign.subject.details');

     /* ----------------------------------------------- Designation -------------------------------------------- */
    # designation View
    Route::get('designation/view', [DesignationController::class, 'ViewDesignation'])->name('designation.view');
    # add designation
    Route::get('designation/add', [DesignationController::class, 'DesignationAdd'])->name('designation.add');
    # store designation
    Route::post('designation/store', [DesignationController::class, 'DesignationStore'])->name('designation.store');
    # edit designation
    Route::get('designations/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('designation.edit');
    # update designation
    Route::post('designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])->name('designation.update');
    # delete designation
    Route::get('designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');
});

# Student Group
Route::prefix('students')->group(function(){
    /* ----------------------------------------------- Registration -------------------------------------------- */
    # student registration View
    Route::get('registration/view', [StudentRegController::class, 'StudentRegView'])->name('student.registration.view');
    # student registration add
    Route::get('registration/add', [StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');
    # student registration store
    Route::post('registration/store', [StudentRegController::class, 'StudentRegStore'])->name('student.registration.store');
    # student registration search
    Route::get('year/class/search', [StudentRegController::class, 'StudentSearch'])->name('student.year.class.search');
    # registration student edit
    Route::get('registration/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');
    # registration student promotion
    Route::get('registration/promotion/{student_id}', [StudentRegController::class, 'StudentRegPromotion'])->name('student.registration.promotion');
    # student registration update
    Route::post('registration/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('student.registration.update');
    # student promotion update
    Route::post('registration/promotion/update/{student_id}', [StudentRegController::class, 'StudentPromotionUpdate'])->name('student.registration.promotion.update');
    # student Registration Details
    Route::get('/registration/details/{student_id}', [StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');
});
