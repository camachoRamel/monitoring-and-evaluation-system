<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CoordinatorController extends Controller
{
    public function viewStudents(string $type, int $course)
    {
        $students = UserController::getHandledStudents($course);

        return view('pages.ojt_coordinator.redirection.view-program-specific-student-' . $type, compact('students'));
    }

    public function viewStudent(string $type, int $id)
    {
        $stud = UserController::getHandledStudent($id);


        // GETS EVALUATION OF STUDENT FROM HTE. THIS QUERY RELIES FACT THAT A STUDENT CAN ONLY HAVE ON HTE AND COORD
        // IT GETS THE STUDENT WHERE THE EVALUATOR IS NOT EQUAL TO THE ID OF THE CURRENT USER THUS GIVING IT EITHER A COORD IF USER IS HTE AND VICE VERSA
        $reports = DB::table('weekly_evaluations AS we')
        ->select('we.evaluation AS report', 'we.task_week')
        ->join('intern_handlers AS ih', 'ih.user_id', '=', 'we.user_id')
        ->whereNot('we.evaluator_id', Auth::id())
        ->where('we.user_id', $id)
        ->get();

        return view('pages.ojt_coordinator.redirection.view-student-specific-' . $type, compact('stud', 'reports'));
    }
}
