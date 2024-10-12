<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getWeeklyTasks(int $id)
    {
        $tasks = UserController::getWeeklyTasks($id);
        // dd($tasks);
        return view('pages.student.weekly-tasks', compact('tasks'));
    }

    public function createWeeklyReport(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required'
        ]);

        //return somewhere
    }

    public function viewHtes()
    {
        $htes = UserController::getAllUsers(1);

        return view('pages.student.internship-requirements', compact('htes'));

    }
}
