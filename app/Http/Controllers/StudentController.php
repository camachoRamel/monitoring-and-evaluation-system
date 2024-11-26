<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Requirement;
use App\Models\WeeklyEvaluation;
use App\Models\WeeklyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function getWeeklyTasks($week)
    {
        $tasks = UserController::getDailyTasks(Auth::id(), $week);
        // dd($tasks);
        return view('pages.student.weekly-tasks', compact('tasks'));
    }

    public function viewHtes()
    {
        $htes = UserController::getAllUsers(1);

        return view('pages.student.internship-requirements', compact('htes'));

    }

    public function viewEvaluation()
    {
        $evaluation = DB::table('weekly_evaluations AS we')
        ->select('we.evaluation')
        ->join('users AS u1', 'u1.id', '=', 'evaluator_id')
        ->where('user_id', Auth::id())
        ->get();

        $evaluator = DB::table('intern_handlers AS ih')
        ->select('u1.first_name AS hte')
        ->join('users AS u1', 'u1.id', '=', 'hte_id')
        ->where('user_id', Auth::id())
        ->get();

        // dd($evaluation);
        return view('pages.student.evaluation-page', compact('evaluation', 'evaluator'));
    }



    public function uploadReport(Request $request, int $week)
    {
        $validation = $request->validate([
            'files' => 'required'
        ]);

        $file = $request->file('files');
        $fileName = 'report' . $week . "-" . Auth::user()->last_name . '.' . $file->getCLientOriginalExtension();
        $filePath = $file->storeAs('reports', $fileName);

        WeeklyReport::updateOrCreate(
        ['user_id' => Auth::id(), 'task_week' => $week],
        ['report' => $fileName]
        );

        return redirect()->route('stud.index', Auth::id())->with('success', 'Report uploaded successfully.');

    }

    public function uploadResume(Request $request, int $id)
    {

        $validation = $request->validate([
            'resume' => 'required'
        ]);

        $file = $request->file('resume');
        $fileName = 'resume' . Auth::user()->last_name . "-" . Auth::id() . '.' . $file->getCLientOriginalExtension();
        $filePath = $file->storeAs('resumes', $fileName);

        $requirements = [
            'user_id' => Auth::id(),
            'hte_id' => $id,
            'requirement' => $fileName,
        ];

        Requirement::create($requirements);

        return redirect()->route('stud.index', Auth::id())->with('success', 'Resume sent successfully.');
    }
}
