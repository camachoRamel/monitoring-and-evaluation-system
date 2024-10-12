<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WeeklyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function getWeeklyTasks()
    {
        $tasks = UserController::getWeeklyTasks(Auth::id());
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

    public function uploadReport(Request $request, int $week)
    {
        $validation = $request->validate([
            'files' => 'required'
        ]);

        $file = $request->file('files');
        $fileName = 'report' . $week . "-" . Auth::id() . '.' . $file->getCLientOriginalExtension();
        $filePath = $file->storeAs('reports', $fileName);

        $weekly_task = [
            'user_id' => Auth::id(),
            'task_week' => $week,
            'report' => $fileName,
        ];

        WeeklyReport::create($weekly_task);

        return redirect()->route('stud.index', Auth::id())->with('success', 'Report uploaded successfully.');

    }
}
