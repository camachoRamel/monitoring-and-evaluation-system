<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InternHandler;
use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function createUser(Request $request)
    {
        $studentCoord = null;
        switch($request->role)
        {
            case 3:
                $validation = $request->validate([
                    'stud_first_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                    'stud_middle_name' => 'nullable|regex:/^[a-zA-Z\s]+$/',
                    'stud_last_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                    'role' => 'required',
                    'stud_username' => 'required|alpha:ascii|unique:users,username',
                    'stud_password' => 'required|min:8',
                    'course' => 'required'
                ]);

                $user = [
                    'first_name' => $validation['stud_first_name'],
                    'middle_name' => $validation['stud_middle_name'],
                    'last_name' => $validation['stud_last_name'],
                    'role' => $validation['role'],
                    'username' => $validation['stud_username'],
                    'password' => $validation['stud_password'],
                    'course' => $validation['course']
                ];

                $studentCoord = $request;

                break;

            case 2:
                $validation = $request->validate([
                    'coord_first_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                    'coord_middle_name' => 'nullable|regex:/^[a-zA-Z\s]+$/',
                    'coord_last_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                    'role' => 'required',
                    'coord_username' => 'required|alpha:ascii|unique:users,username',
                    'coord_password' => 'required|min:8'
                ]);

                $user = [
                    'first_name' => $validation['coord_first_name'],
                    'middle_name' => $validation['coord_middle_name'],
                    'last_name' => $validation['coord_last_name'],
                    'role' => $validation['role'],
                    'username' => $validation['coord_username'],
                    'password' => $validation['coord_password'],
                ];

                break;

            case 1:
                $validation = $request->validate([
                    'hte_first_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                    'role' => 'required',
                    'hte_username' => 'required|alpha:ascii|unique:users,username',
                    'hte_password' => 'required|min:8'
                ]);

                $user = [
                    'first_name' => $validation['hte_first_name'],
                    'role' => $validation['role'],
                    'username' => $validation['hte_username'],
                    'password' => $validation['hte_password'],
                ];

                break;

        }

        $userID = User::create($user)->id;

        if($studentCoord != null)
        {
            InternHandler::create([
                'user_id' => $userID,
                'coord_id' => Auth::user()->id
            ]);
        }

        // return redirect()->route('admin.index', Auth::id())->with('success', 'Account successfully created.');
        return redirect()->back()->with('success', 'Account successfully created.');
    }

    public function viewStudents(string $type, int $course)
    {
        if($type == "application")
        {
            $students = UserController::getHandledStudents($course, 0);
        }else
        {
            $students = UserController::getHandledStudents($course);
        }
        // checks whether students contains data, if not give a message for error handling
        if($students->isEmpty())
        {
            $rawStudents = [
                [
                    'message' => 'No Student Data Available for this Program/Course',
                    'course' => $course
                ]
            ];
            $students = collect($rawStudents)->map(function ($student) {
                return (object) $student; // Convert each item to an object
            })->toArray();
        }
        return view('pages.admin.redirection.view-program-specific-student-' . $type, compact('students'));
    }

    public function viewStudent(string $type, int $id)
    {
        $stud = UserController::getUser($id);

        // GETS EVALUATION OF STUDENT FROM HTE. THIS QUERY RELIES FACT THAT A STUDENT CAN ONLY HAVE ON HTE AND COORD
        // IT GETS THE STUDENT WHERE THE EVALUATOR IS NOT EQUAL TO THE ID OF THE CURRENT USER THUS GIVING IT EITHER A COORD IF USER IS HTE AND VICE VERSA
        $reports = DB::table('weekly_evaluations AS we')
        ->select('we.evaluation AS report', 'we.task_week')
        ->join('intern_handlers AS ih', 'ih.user_id', '=', 'we.user_id')
        ->whereNot('we.evaluator_id', $stud->hte_id)
        ->where('we.user_id', $id)
        ->get();

        if($reports->isEmpty()){
            $reports = 'No evaluation submitted yet';
        }

        return view('pages.admin.redirection.view-student-specific-' . $type, compact('stud', 'reports'));
    }

    public function viewHtes()
    {
        $htes = UserController::getAllUsers(1);
        return view('pages.admin.hte-info', compact('htes'));
    }

    public function viewCoordinators()
    {
        $coordinators = UserController::getAllUsers(2);
        return view('pages.admin.ojt-coordinator-info', compact('coordinators'));
    }

    public function viewWorker(string $type, int $id)
    {
        $temp = 0;
        switch ($type) {
            case 'hte':
                $temp = 3;
                break;

            case 'ojt-coordinator':
                $temp = 2;
                break;
        }

        $worker = DB::table('users')
        ->select('*')
        ->where('id', $id)
        ->first();

        $connections = DB::table('intern_handlers')
        ->select('u1.id AS stud_id', 'u1.course', DB::raw('CONCAT(u1.first_name, " ", COALESCE(u1.middle_name, ""), " ", u1.last_name) AS student_name, CONCAT(u2.first_name, " ", COALESCE(u2.middle_name, ""), " ", u2.last_name) AS coord, u3.first_name AS hte'))
        ->join('users AS u1', 'u1.id', '=', 'user_id')
        ->join('users AS u2', 'u2.id', '=', 'coord_id')
        ->leftJoin('users AS u3', 'u3.id', '=', 'hte_id')
        ->where('u' . $temp . "." . 'id', $id)
        ->get();

        return view('pages.admin.redirection.view-'. $type, compact('worker', 'connections'));
    }

    public static function calculateCompletionRate()
    {
        $totalIt = User::where('role', 3)->where('course', 1)->get()->count();
        $totalIs = User::where('role', 3)->where('course', 2)->get()->count();
        $totalComSci = User::where('role', 3)->where('course', 3)->get()->count();

        $finishedIt = DB::table('weekly_reports')
        ->select('user_id')
        ->join('users AS u', 'u.id', '=', 'user_id')
        ->where('course', 1)
        ->get()
        ->count();
        $finishedIs = DB::table('weekly_reports')
        ->select('user_id')
        ->join('users AS u', 'u.id', '=', 'user_id')
        ->where('course', 2)
        ->get()
        ->count();
        $finishedComSci = DB::table('weekly_reports')
        ->select('user_id')
        ->join('users AS u', 'u.id', '=', 'user_id')
        ->where('course', 3)
        ->get()
        ->count();

        $finishRates = [
            'it' => $totalIt != 0 ? $finishedIt / $totalIt : 0,
            'is' => $totalIs != 0 ? $finishedIs / $totalIs : 0,
            'comsci' => $totalComSci != 0 ? $finishedComSci / $totalComSci : 0
        ];

        return $finishRates;

    }

    public function getStudentAppliedHtes(int $id)
    {
        $student = UserController::getUser($id);
        $htes = DB::table('applications AS appli')
        ->select('appli.declined AS declined', DB::raw('CONCAT(u1.first_name, " ", COALESCE(u1.middle_name, ""), " ", u1.last_name) AS name'))
        ->join('users AS u1', 'u1.id', '=', 'appli.hte_id')
        ->where('stud_id', $id)
        ->get();

        if($htes->isEmpty())
        {
            $rawHtes = [
                [
                    'message' => 'Student has not been applied yet',
                ]
            ];
            $htes = collect($rawHtes)->map(function ($hte) {
                return (object) $hte; // Convert each item to an object
            })->toArray();
        }

        return view('pages.admin.redirection.view-student-specific-student-applications', compact('student', 'htes'));
    }

    public function viewHtesForStudent(int $id)
    {
        $student = UserController::getUser($id);
        $htes = UserController::getAllUsers(1);

        return view('pages.admin.redirection.create-student-specific-student-application', compact('student', 'htes'));
    }

    public function applyStudent(Request $request)
    {
        $validated = $request->validate([
            'stud_id' => 'required',
            'hte_id' => 'required'
        ]);

        Application::updateOrCreate($validated);

        // FIX VALIDATED IN RETURN IF RUNS ERROR
        return redirect()->route('admin.view.intern-application', $validated['stud_id'])->with('success', 'Student Applied');
    }
}
