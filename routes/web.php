<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\File;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginLogoutController;
use App\Http\Controllers\HostingTrainingEstablishmentController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function ()
{
    return view('login');
});

//LOGIN AND LOGOUT ROUTES
Route::post('/login', [LoginLogoutController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginLogoutController::class, 'logout'])->name('logout');

// Route::get('/edit-profile-page', function()
// {
//     return view('pages.profile');

// })->name('profile.edit-page');

Route::get('/edit-profile-page', [UserController::class, 'getProfile'])->name('profile.edit-page');

Route::post('/edit-profile', [UserController::class, 'updateUserProfile'])->name('profile.edit');


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

    //DYNAMIC STUDENT VIEWS FOR ADMIN
    Route::get('/admin/{type}-students-{course}', [AdminController::class, 'viewStudents'])->name('admin.view-students');

    Route::get('/admin/{type}-student-{id}', [AdminController::class, 'viewStudent'])->name('admin.view-student');


    Route::get('/admin/ojt-coordinator-list', [AdminController::class, 'viewCoordinators'])->name('admin.ojt-coordinator-info');

    Route::get('/admin/hte-info', [AdminController::class, 'viewHtes'])->name('admin.hte-info');

    //DYNAMIC ROUTE FOR VIEWING SPECIFIC COORD AND HTE
    Route::get('/admin/worker/{type}/{id}', [AdminController::class, 'viewWorker'])->name('admin.specific-worker');

    //CREATE ACCOUNT ROUTES
    Route::get('/admin/create-account-page', function ()
    {
        $coords = UserController::getAllUsers(2);
        return view('pages.admin.redirection.create-account', compact('coords'));
    })->name('admin.create-account-page');

    Route::post('/admin/create-account', [AdminController::class, 'createUser'])->name('admin.create-account');

    //ROUTE TO VIEW RECORDS
    Route::get('/admin/view-log', [RecordController::class, 'viewRecords'])->name('admin.view-records');

    //ROUTE TO DELETE ACCOUNT
    Route::post('/admin/delete/{id}/{role}', [UserController::class, 'deleteAccount'])->name('admin.delete');


    //ROUTE FOR DOWNLOADING STUDENT REPORT
    Route::get('/admin/download/{path}/{fileName}', [FileController::class, 'fileDownload'])->name('admin.download-file');

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

    //APPROVE STUDENTS PAGE ROUTE
    Route::get('/hte/students-to-approve', [HostingTrainingEstablishmentController::class, 'getStudentsToApprove'])->name('hte.students-to-approve');

    Route::post('/hte/students-to-approve/action{id}', [HostingTrainingEstablishmentController::class, 'approve'])->name('hte.approve-action');

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


    //DYNAMIC STUDENT VIEWS FOR HTE
    Route::get('/hte/{type}-students-{course}', [HostingTrainingEstablishmentController::class, 'viewStudents'])->name('hte.view-students');

    Route::get('/hte/{type}-student-{id}', [HostingTrainingEstablishmentController::class, 'viewStudent'])->name('hte.view-student');

    //ROUTE FOR DOWNLOADING STUDENT REPORT
    Route::get('/hte/download/{path}/{fileName}', [FileController::class, 'fileDownload'])->name('hte.download-file');

    Route::post('/hte/upload-evaluation/{id}', [FileController::class, 'uploadEvaluation'])->name('hte.upload-evaluation');

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

    //ROUTE FOR DOWNLOADING STUDENT REPORT
    Route::get('/ojt-coordinator/download/{path}/{fileName}', [FileController::class, 'fileDownload'])->name('coord.download-file');

    Route::post('/coord/upload-evaluation/{id}', [FileController::class, 'uploadEvaluation'])->name('coord.upload-evaluation');


});


//STUDENT ROUTES
Route::middleware('is.student')->group(function()
{
    Route::get('/student{id}', [UserController::class, 'index'])->name('stud.index');

    // ROUTE FOR STUDENT APPLICATION
    Route::get('/student/intern-requirements', [StudentController::class, 'viewHtes'])->name('stud.intern-requirement-page');

    Route::get('/student/evaluation-page', [StudentController::class, 'viewEvaluation'])->name('stud.evaluation-page');

    Route::get('/student/upload-resume-to{id}', function(int $id)
    {
        $hte = DB::table('users')
        ->select('*')
        ->where('id', $id)
        ->first();

        return view('pages.student.conditional-pages.submit-requirements', compact('hte'));
    })->name('stud.resume-upload-page');

    Route::post('/student/resume-upload{id}', [StudentController::class, 'uploadResume'])->name('stud.resume-upload');

    Route::get('/student/weekly-tasks{week}', [StudentController::class, 'getWeeklyTasks'])->name('stud.weekly-tasks-page');

    Route::get('/student/weekly-submissions', function()
    {
        $tasks = UserController::getWeeklyTasks(Auth::id());
        return view('pages.student.weekly-submission', compact('tasks'));

    })->name('stud.weekly-submission-page');

    Route::post('/student/submitting-week{week}', [StudentController::class, 'uploadReport'])->name('stud.weekly-submission');

    //ROUTE FOR DOWNLOADING UPLOADED TASK
    Route::get('/student/download/{path}/{fileName}', [FileController::class, 'fileDownload'])->name('stud.download-file');

    Route::get('/student/weekly-report/{id}/{week}', [FileController::class, 'getStudentWeeklyReport'])->name('stud.weekly-report');

    // ROUTE FOR DELETING WEEKLY REPORT
    Route::post('/student/delete/{id}', [FileController::class, 'deleteWeeklyReport'])->name('stud.delete-weekly-report');

});
