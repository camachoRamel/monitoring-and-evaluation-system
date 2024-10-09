<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\File;
use App\Http\Controllers\LoginLogoutController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
    return view('login');
});

//LOGIN AND LOGOUT ROUTES
Route::post('/login', [LoginLogoutController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginLogoutController::class, 'logout'])->name('logout');


// //ADMIN ROUTES
Route::middleware('is.admin')->group(function()
{
    Route::get('/admin{id}', [UserController::class, 'index'])->name('admin.index');

    //VIEW STUDENT ROUTE FOR ADMIN
    Route::get('/admin/students-list', function()
    {
        return view('pages.admin.student-list');
    })->name('admin.student-list');

    //VIEW STUDENT REPORT ROUTE FOR ADMIN
    Route::get('/admin/students-report', function ()
    {
        return view('pages.admin.student-weekly-report');
    })->name('admin.student-weekly-report');


    Route::get('/admin/students-{type}/it-students', [AdminController::class, 'viewItStudents'])->name('admin.view-it-student');

    Route::get('/admin/students-{type}/comsci-students', [AdminController::class, 'viewComSciStudents']
    )->name('admin.view-comsci-student');

    Route::get('/admin/students-{type}/is-students', [AdminController::class, 'viewIsStudents']
    )->name('admin.view-is-student');

    Route::get('/admin/ojt-coordinator-list', [AdminController::class, 'viewCoordinators'])->name('admin.ojt-coordinator-info');

    Route::get('/admin/hte-info', [AdminController::class, 'viewHtes'])->name('admin.hte-info');

    Route::get('/admin/view-student-list{id}', [AdminController::class, 'viewUser'])->name('admin.view-student-specific-list');

    Route::get('/admin/view-student-report', function () {
        return view('pages.admin.redirection.view-student-specific-report');
    })->name('admin.view-student-specific-report');



    //CREATE ACCOUNT ROUTES
    Route::get('/admin/create-account-page', function ()
    {
        $coords = UserController::getAllUsers(2);
        return view('pages.admin.redirection.create-account', compact('coords'));
    })->name('admin.create-account-page');

    Route::post('/admin/create-account', [AdminController::class, 'createUser'])->name('admin.create-account');

});


//HTE ROUTES
Route::middleware('is.hte')->group(function()
{
    Route::get('/hte{id}', [UserController::class, 'index'])->name('hte.index');
});


//OJT COORDINATOR ROUTES
Route::middleware('is.coord')->group(function()
{
    Route::get('/ojt-coordinator{id}', [UserController::class, 'index'])->name('coord.index');
});


//STUDENT ROUTES
Route::middleware('is.student')->group(function()
{
    Route::get('/student{id}', [UserController::class, 'index'])->name('stud.index');
});


// TEST ROUTES

Route::post('/test_upaload{id}', [File::class, 'storePicture'])->name('test_upload');

Route::get('/test/download{id}', [File::class, 'download'])->name('test_download');
