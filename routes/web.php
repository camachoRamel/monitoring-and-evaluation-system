<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginLogoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
    return view('login');
});

//LOGIN AND LOGOUT ROUTES
Route::post('/login', [LoginLogoutController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginLogoutController::class, 'logout'])->name('logout');


// //ADMIN ROUTES
// Route::middleware('is.admin')->group(function()
// {
//     Route::get('/admin{id}', [UserController::class, 'index'])->name('admin.index');

//     Route::get('/admin{id}/view-students', [AdminController::class, 'viewStudents'])->name('admin.view.stud');

// });


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

Route::get('/', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('pages.admin.index');
})->name('admin.dashboard');

Route::get('/admin/student-list', function () {
    return view('pages.admin.student-list');
})->name('admin.student-list');

Route::get('/admin/student-weekly-report', function () {
    return view('pages.admin.student-weekly-report');
})->name('admin.student-weekly-report');

Route::get('/admin/ojt-coordinator-list', function () {
    return view('pages.admin.ojt-coordinator-info');
})->name('admin.ojt-coordinator-info');

Route::get('/admin/hte-info', function () {
    return view('pages.admin.hte-info');
})->name('admin.hte-info');

Route::get('/admin/create-account', function () {
    return view('pages.admin.redirection.create-account');
})->name('admin.create-account');

Route::get('/admin/view-program-student-list', function () {
    return view('pages.admin.redirection.view-program-specific-student-list');
})->name('admin.view-program-student-specific-list');

Route::get('/admin/view-program-student-report', function () {
    return view('pages.admin.redirection.view-program-specific-student-report');
})->name('admin.view-program-student-specific-report');
