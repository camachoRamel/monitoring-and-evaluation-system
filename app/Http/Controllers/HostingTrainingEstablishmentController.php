<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WeeklyTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HostingTrainingEstablishmentController extends Controller
{
    public function createWeeklyTasks(Request $request)
    {
        $validated = $request->validate([
           'file' => 'required'
        ]);

        $request->file('file')->storeAs($request->file('file')->getClientOriginalName());
        $path = Storage::path($request->file('file')->getClientOriginalName());

        return redirect()->route('hte.weekly.tasks');
    }

    public function getStudentsToApprove()
    {
        $students = DB::table('users')
        ->select('*')
        ->where('approved', 0)
        ->where('role', 3)
        ->get();

        // dd($students);

        return view('pages.hte.redirection.approve-students', compact('students'));
    }

    public function uploadWeeklyTask(Request $request, $id)
    {
        $validation = $request->validate([
            'week' => 'required',
            'deadlines' => 'required',
            'files' => 'required'
        ]);

        // 5 because there are 5 days with tasks|| i = day
        for($i = 1; $i <= 5; $i++)
        {
            $file = $validation['files'][$i];
            $fileName = 'task' . $i . $id . $validation['deadlines'][$i] . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('tasks', $fileName);

            $weekly_task = [
                'user_id' => $id,
                'hte_id' => Auth::id(),
                'week' => $validation['week'],
                'day' => $i,
                'tasks' => $fileName,
                'deadline' => $validation['deadlines'][$i]
            ];

            WeeklyTask::create($weekly_task);
        }

        return redirect()->route('hte.index', Auth::id());
    }

    public function viewAllStudents()
    {
        $students = UserController::getApprovedStudents();

        return view('pages.hte.student-weekly-task', compact('students'));
    }

    public function viewStudents(string $type, int $course)
    {
        $students = UserController::getApprovedStudents($course);

        return view('pages.hte.redirection.view-program-specific-student-' . $type, compact('students'));
    }

    public function viewStudent(string $type, int $id)
    {
        $student = UserController::getApprovedStudent($id);
        return view('pages.hte.redirection.view-student-specific-' . $type, compact('student'));
    }
}
