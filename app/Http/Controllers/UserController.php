<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InternHandler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(int $id)
    {
        $user = DB::table('users')
        ->select('*')
        ->where('id', $id)
        ->first();

        $rates = AdminController::calculateCompletionRate();

        $iTCount = Auth::user()->role == 1 ? UserController::getApprovedStudents(1)->count() : UserController::getHandledStudents(1)->count();
        $iSCount = Auth::user()->role == 1 ? UserController::getApprovedStudents(2)->count() : UserController::getHandledStudents(1)->count();
        $comSciCount = Auth::user()->role == 1 ? UserController::getApprovedStudents(3)->count() : UserController::getHandledStudents(1)->count();

        $htes = UserController::getAllUsers(1);
        $hte = UserController::getUser(Auth::id());
        $tasks = UserController::getWeeklyTasks(Auth::id());

        switch ($user->role) {
            case 0:
                return view('pages.admin.index', compact('user', 'rates'));
                break;
            case 1:
                return view('pages.hte.index', compact('user', 'iTCount', 'iSCount', 'comSciCount'));
                break;
            case 2:
                return view('pages.ojt_coordinator.index', compact('user', 'iTCount', 'iSCount', 'comSciCount'));
                break;
            case 3:
                //checks student is approved by hte
                if(!UserController::isApproved($id))
                {
                    return view('pages.student.internship-requirements', compact('user', 'htes'));
                }
                return view('pages.student.index', compact('user', 'tasks', 'hte'));
                break;
        }




        // $relations = DB::table('intern_handlers')->select('*')->where('user_id', $id);

    }

    //FIRST ARGUMENT IS FOR ROLE SECOND IS FOR COURSE. SECOND ARGUMENT IS ONLY PRESENT WHEN ITS FOR STUDENT
    public static function __callStatic($name, $args)
    {
        //GETS ALL USERS DEPENDING ON ROLE AND/OR COURSE
        if($name == 'getAllUsers')
        {
            switch(count($args))
            {
                case 1:
                    $users = DB::table('users')
                    ->select('*')
                    ->where('role', $args[0])
                    ->get();
                break;

                case 2:
                    $users = DB::table('intern_handlers')
                    ->select('u1.id', 'u1.course', DB::raw('CONCAT(u1.first_name, " ", COALESCE(u1.middle_name, ""), " ", u1.last_name) AS name, CONCAT(u2.first_name, " ", COALESCE(u2.middle_name, ""), " ", u2.last_name) AS coord, u3.first_name AS hte'))
                    ->join('users AS u1', 'u1.id', '=', 'user_id')
                    ->join('users AS u2', 'u2.id', '=', 'coord_id')
                    ->leftJoin('users AS u3', 'u3.id', '=', 'hte_id')
                    ->where('u1.role', $args[0])
                    ->where('u1.course', $args[1])
                    ->get();
            }
            return $users;
        }


        // GET A USER
        if($name == 'getUser')
        {
            switch(count($args))
            {
                case 1:
                    $user = DB::table('intern_handlers')
                    ->select('u1.id', 'u1.course', 'u1.profile_picture AS stud_picture', 'u2.profile_picture AS coord_picture', 'u3.profile_picture AS hte_picture', DB::raw('CONCAT(u1.first_name, " ", COALESCE(u1.middle_name, ""), " ", u1.last_name) AS name, CONCAT(u2.first_name, " ", COALESCE(u2.middle_name, ""), " ", u2.last_name) AS coord, u3.first_name AS hte'))
                    ->join('users AS u1', 'u1.id', '=', 'user_id')
                    ->join('users AS u2', 'u2.id', '=', 'coord_id')
                    ->leftJoin('users AS u3', 'u3.id', '=', 'hte_id')
                    ->orWhere('u1.id', $args[0])
                    ->orWhere('u2.id', $args[0])
                    ->orWhere('u3.id', $args[0])
                    ->first();

                    break;
            }
            return $user;
        }

        // GET APPROVED STUDENTS
        if($name == 'getApprovedStudents')
        {
            switch (count($args)) {
                case 0:
                    $students = DB::table('intern_handlers')
                    ->select('u1.id', 'u1.profile_picture AS stud_picture',
                    'u1.course', DB::raw('CONCAT(u1.first_name, " ", COALESCE(u1.middle_name, ""), " ", u1.last_name) AS name, CONCAT(u2.first_name, " ", COALESCE(u2.middle_name, ""), " ", u2.last_name) AS coord, u3.first_name AS hte'))
                    ->join('users AS u1', 'u1.id', '=', 'user_id')
                    ->join('users AS u2', 'u2.id', '=', 'coord_id')
                    ->join('users AS u3', 'u3.id', '=', 'hte_id')
                    ->where('u1.approved', 1)
                    ->where('u1.role', 3)
                    ->where('u3.id', Auth::id())
                    ->get();

                    return $students;
                    break;

                case 1:
                    $students = DB::table('intern_handlers')
                    ->select('u1.id', 'u1.profile_picture AS stud_picture',
                    'u1.course', DB::raw('CONCAT(u1.first_name, " ", COALESCE(u1.middle_name, ""), " ", u1.last_name) AS name, CONCAT(u2.first_name, " ", COALESCE(u2.middle_name, ""), " ", u2.last_name) AS coord, u3.first_name AS hte'))
                    ->join('users AS u1', 'u1.id', '=', 'user_id')
                    ->join('users AS u2', 'u2.id', '=', 'coord_id')
                    ->join('users AS u3', 'u3.id', '=', 'hte_id')
                    ->where('u1.approved', 1)
                    ->where('u1.role', 3)
                    ->where('u1.course', $args[0])
                    ->where('u3.id', Auth::id())
                    ->get();

                    return $students;
                    break;
            }
        }

        // GET HANDLED STUDENTS
        if($name == 'getHandledStudents')
        {
            switch (count($args)) {
                case 0:
                    $students = DB::table('intern_handlers')
                    ->select('u1.id', 'u1.profile_picture AS stud_picture',
                    'u1.course', DB::raw('CONCAT(u1.first_name, " ", COALESCE(u1.middle_name, ""), " ", u1.last_name) AS name, CONCAT(u2.first_name, " ", COALESCE(u2.middle_name, ""), " ", u2.last_name) AS coord, u3.first_name AS hte'))
                    ->join('users AS u1', 'u1.id', '=', 'user_id')
                    ->join('users AS u2', 'u2.id', '=', 'coord_id')
                    ->join('users AS u3', 'u3.id', '=', 'hte_id')
                    ->where('u1.role', 3)
                    ->where('u2.id', Auth::id())
                    ->get();

                    return $students;
                    break;

                case 1:
                    $students = DB::table('intern_handlers')
                    ->select('u1.id', 'u1.profile_picture AS stud_picture',
                    'u1.course', DB::raw('CONCAT(u1.first_name, " ", COALESCE(u1.middle_name, ""), " ", u1.last_name) AS name, CONCAT(u2.first_name, " ", COALESCE(u2.middle_name, ""), " ", u2.last_name) AS coord, u3.first_name AS hte'))
                    ->join('users AS u1', 'u1.id', '=', 'user_id')
                    ->join('users AS u2', 'u2.id', '=', 'coord_id')
                    ->join('users AS u3', 'u3.id', '=', 'hte_id')
                    ->where('u1.role', 3)
                    ->where('u1.course', $args[0])
                    ->where('u2.id', Auth::id())
                    ->get();

                    return $students;
                    break;
            }
        }

    }

    public static function getApprovedStudent(int $id)
    {
        $student = DB::table('intern_handlers')
        ->select('u1.id', 'u1.profile_picture AS stud_picture',
         'u1.course', DB::raw('CONCAT(u1.first_name, " ", COALESCE(u1.middle_name, ""), " ", u1.last_name) AS name, CONCAT(u2.first_name, " ", COALESCE(u2.middle_name, ""), " ", u2.last_name) AS coord, u3.first_name AS hte'))
        ->join('users AS u1', 'u1.id', '=', 'user_id')
        ->join('users AS u2', 'u2.id', '=', 'coord_id')
        ->join('users AS u3', 'u3.id', '=', 'hte_id')
        ->where('u1.approved', 1)
        ->where('u1.id', $id)
        ->where('u1.role', 3)
        ->first();

        return $student;
    }

    public static function getHandledStudent(int $id)
    {
        $student = DB::table('intern_handlers')
        ->select('u1.id', 'u1.profile_picture AS stud_picture',
         'u1.course', DB::raw('CONCAT(u1.first_name, " ", COALESCE(u1.middle_name, ""), " ", u1.last_name) AS name, CONCAT(u2.first_name, " ", COALESCE(u2.middle_name, ""), " ", u2.last_name) AS coord, u3.first_name AS hte'))
        ->join('users AS u1', 'u1.id', '=', 'user_id')
        ->join('users AS u2', 'u2.id', '=', 'coord_id')
        ->join('users AS u3', 'u3.id', '=', 'hte_id')
        ->where('u1.approved', 1)
        ->where('u1.id', $id)
        ->where('u1.role', 3)
        ->first();

        return $student;
    }

    public static function getWeeklyTasks(int $id)
    {
        $tasks = DB::table('weekly_tasks')
        ->select('tasks', 'week', 'day', 'deadline')
        ->join('users AS u1', 'u1.id', '=', 'user_id')
        ->where('u1.id', $id)
        ->get();

        return $tasks;
    }

    public static function getDailyTasks(int $id, int $week)
    {
        $tasks = DB::table('weekly_tasks')
        ->select('tasks', 'week', 'day', 'deadline')
        ->join('users AS u1', 'u1.id', '=', 'user_id')
        ->where('u1.id', $id)
        ->where('week', $week)
        ->get();

        return $tasks;
    }

    public static function getWeeklyReports()
    {
        $reports = DB::table('weekly_reports')
        ->select('*')
        ->get();

        return $reports;
    }


    public function isApproved(int $id): bool
    {

        $user = DB::table('users')
        ->select('approved')
        ->where('id', $id)
        ->first();

        if($user->approved == 1){
            return true;
        }

        return false;
    }

    public function getProfile(){
        $user = User::find(Auth::id());

        return view('pages.profile', compact('user'));
    }

    public function updateUserProfile(Request $request)
    {

        switch ($request->submitBtn) {
            case 'hte':
                $validation = $request->validate([
                    'hte_first_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                    'hte_profile_picture' => 'nullable|image|mimes:jpeg,png,jpg',
                    'hte_username' => 'required|alpha:ascii',
                    'hte_password' => 'required|min:8'
                ]);

                if(isset($validation['hte_profile_picture']))
                {
                    $file = $request->file('hte_profile_picture');
                    $fileName = 'profile' . "-" . Auth::id() . '.' . $file->getCLientOriginalExtension();
                    $filePath = $file->storePubliclyAs('images', $fileName, 'public');
                }

                $user = [
                    'first_name' => $validation['hte_first_name'],
                    // 'profile_picture' => $validation['hte_profile_picture'] == null ? Auth::user()->profile_picture : $validation['hte_profile_picture'],
                    'profile_picture' => $fileName ?? Auth::user()->profile_picture,
                    'username' => $validation['hte_username'],
                    'password' => $validation['hte_password'],
                ];

                break;

            case 'coord':
                $validation = $request->validate([
                    'coord_first_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                    'coord_middle_name' => 'nullable|regex:/^[a-zA-Z\s]+$/',
                    'coord_last_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                    'coord_profile_picture' => 'sometimes|image|mimes:jpeg,png,jpg',
                    'coord_username' => 'required|alpha:ascii',
                    'coord_password' => 'required|min:8'
                ]);

                // if($validation['coord_profile_picture'] != null)
                if( isset($validation['coord_profile_picture']))
                {
                    $file = $request->file('coord_profile_picture');
                    $fileName = 'profile' . "-" . Auth::id() . '.' . $file->getCLientOriginalExtension();
                    $filePath = $file->storePubliclyAs('images', $fileName, 'public');
                }

                $user = [
                    'first_name' => $validation['coord_first_name'],
                    'middle_name' => $validation['coord_middle_name'],
                    'last_name' => $validation['coord_last_name'],
                    // 'profile_picture' => $validation['coord_profile_picture'] == null ? Auth::user()->profile_picture : $validation['coord_profile_picture'],
                    'profile_picture' => $fileName ?? Auth::user()->profile_picture,
                    'username' => $validation['coord_username'],
                    'password' => $validation['coord_password'],
                ];

                break;
            case 'stud':
                $validation = $request->validate([
                    'stud_first_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                    'stud_middle_name' => 'nullable|regex:/^[a-zA-Z\s]+$/',
                    'stud_last_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                    'stud_profile_picture' => 'nullable|image|mimes:jpeg,png,jpg',
                    'stud_username' => 'required|alpha:ascii',
                    'stud_password' => 'required|min:8',
                ]);

                if(isset($validation['stud_profile_picture']))
                {
                    $file = $request->file('stud_profile_picture');
                    $fileName = 'profile' . "-" . Auth::id() . '.' . $file->getCLientOriginalExtension();
                    $filePath = $file->storePubliclyAs('images', $fileName, 'public');
                }

                $user = [
                    'first_name' => $validation['stud_first_name'],
                    'middle_name' => $validation['stud_middle_name'],
                    'last_name' => $validation['stud_last_name'],
                    // 'profile_picture' => $validation['stud_profile_picture'] == null ? Auth::user()->profile_picture : $validation['stud_profile_picture'],
                    'profile_picture' => $fileName ?? Auth::user()->profile_picture,
                    'username' => $validation['stud_username'],
                    'password' => $validation['stud_password'],
                ];

                break;
        }


        User::find(Auth::id())
      ->update($user);

        return redirect()->route($request->submitBtn . '.index', Auth::id());
    }
}
