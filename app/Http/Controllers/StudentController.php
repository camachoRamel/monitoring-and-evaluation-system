<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getWeeklyTask()
    {
        $tasks = UserController::getWeeklyTasks();

        return view('pages.hte.student-weekly-task', compact('tasks'));
    }

    public function createWeeklyReport(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required'
        ]);

        //return somewhere
    }
}
