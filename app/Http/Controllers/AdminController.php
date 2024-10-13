<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InternHandler;
use App\Models\User;
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
                    'stud_middle_name' => 'sometimes|regex:/^[a-zA-Z\s]+$/',
                    'stud_last_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                    'role' => 'required',
                    'stud_username' => 'required|alpha:ascii',
                    'stud_password' => 'required|min:8',
                    'course' => 'required',
                    'coord_id' => 'required'
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

                $studentCoord = $request->validate([
                    'coord_id' => 'required'
                ]);

                break;

            case 2:
                $validation = $request->validate([
                    'coord_first_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                    'coord_middle_name' => 'sometimes|regex:/^[a-zA-Z\s]+$/',
                    'coord_last_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                    'role' => 'required',
                    'coord_username' => 'required|alpha:ascii',
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
                    'hte_username' => 'required|alpha:ascii',
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
                'coord_id' => $studentCoord['coord_id']
            ]);
        }

        // return redirect()->route('admin.index', Auth::id())->with('success', 'Account successfully created.');
        return redirect()->back()->with('success', 'Account successfully created.');
    }

    public function viewStudents(string $type, int $course)
    {
        $students = UserController::getApprovedStudents($course);

        return view('pages.admin.redirection.view-program-specific-student-' . $type, compact('students'));
    }

    public function viewStudent(string $type, int $id)
    {
        $stud = UserController::getApprovedStudent($id);
        $reports = FileController::getStudentReports($id);
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
}
