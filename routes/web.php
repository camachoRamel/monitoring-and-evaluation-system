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


//ADMIN ROUTES
Route::middleware('is.admin')->group(function()
{
    Route::get('/admin{id}', [UserController::class, 'index'])->name('admin.index');

    Route::get('/admin{id}/view-students', [AdminController::class, 'viewStudents'])->name('admin.view.stud');

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
