<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\File;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginLogoutController;
use App\Http\Controllers\HostingTrainingEstablishmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

    //VIEW STUDENT ROUTE FOR HTE
    Route::get('/hte/students-list', function()
    {
        return view('pages.hte.student-list');
    })->name('hte.student-list');

    Route::get('/hte/{type}-students-{course}', [HostingTrainingEstablishmentController::class, 'viewStudents'])->name('hte.view-students');

    Route::get('/hte/{type}-student-{id}', [HostingTrainingEstablishmentController::class, 'viewStudent'])->name('hte.view-student');

    //APPROVE STUDENTS PAGE ROUTE
    Route::get('/hte/students-to-approve', [HostingTrainingEstablishmentController::class, 'getStudentsToApprove'])->name('hte.students-to-approve');

    Route::get('/hte/weekly-tasks', [HostingTrainingEstablishmentController::class, 'viewAllStudents'])->name('hte.weekly-tasks');

    Route::get('/hte/upload-student-tasks{id}', function(int $id)
    {
        $student = UserController::getUser($id);
        return view('pages.hte.redirection.upload-student-task', compact('student'));

    })->name('hte.upload-student-task-page');

    Route::post('hte/uploading-task{id}', [HostingTrainingEstablishmentController::class, 'uploadWeeklyTask'])->name('hte.upload-student-task');


    //HTE SUBMISSION VIEW STUDENT ROUTES
    Route::get('/hte/submission-students', function()
    {
        return view('pages.hte.student-weekly-submission');
    })->name('hte.weekly-submission');

    Route::get('/hte/{type}-students-{course}', [HostingTrainingEstablishmentController::class, 'viewStudents'])->name('hte.view-students');

    Route::get('/hte/{type}-student-{id}', [HostingTrainingEstablishmentController::class, 'viewStudent'])->name('hte.view-student');


});


//OJT COORDINATOR ROUTES
Route::middleware('is.coord')->group(function()
{
    Route::get('/ojt-coordinator{id}', [UserController::class, 'index'])->name('coord.index');

    //VIEW STUDENTS ROUTE FOR COORD
    Route::get('/ojt-coordinator/students-list', function(){

        return view('pages.ojt_coordinator.student-list');
    })->name('coord.students-list-page');

    Route::get('/ojt-coordinator/{type}-students-{course}', [CoordinatorController::class, 'viewStudents'])->name('coord.view-students');

    Route::get('/ojt-coordinator/{type}-student-{id}', [CoordinatorController::class, 'viewStudent'])->name('coord.view-student');

    Route::get('/ojt-coordinator/students-report', function()
    {
        return view('pages.ojt_coordinator.student-weekly-report');
    })->name('coord.students-reports-page');


});


//STUDENT ROUTES
Route::middleware('is.student')->group(function()
{
    Route::get('/student{id}', [UserController::class, 'index'])->name('stud.index');

    Route::get('/student/intern-requirements', [StudentController::class, 'viewHtes'])->name('stud.intern-requirement-page');

    Route::get('/student/weekly-tasks', function()
    {
        return view('pages.student.weekly-tasks');

    })->name('stud.weekly-tasks-page');

    Route::get('/student/weekly-submissions', function()
    {
        return view('pages.student.weekly-submission');

    })->name('stud.weekly-submission-page');

});
