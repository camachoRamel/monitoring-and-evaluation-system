<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

        $iTCount = User::where('role', 3)->where('course', 1)->get()->count();
        $iSCount = User::where('role', 3)->where('course', 2)->get()->count();
        $comSciCount = User::where('role', 3)->where('course', 3)->get()->count();

        $htes = UserController::getAllUsers(1);
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
                return view('pages.student.index', compact('user', 'tasks'));
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
                    ->select('u1.id', 'u1.course', DB::raw('CONCAT(u1.first_name, " ", u1.middle_name, " ", u1.last_name) AS name, CONCAT(u2.first_name, " ", u2.middle_name, " ", u2.last_name) AS coord, CONCAT(u3.first_name, " ", u3.middle_name, " ", u3.last_name) AS hte'))
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
                    ->select('u1.id', 'u1.course', 'u1.profile_picture AS stud_picture', 'u2.profile_picture AS coord_picture', 'u3.profile_picture AS hte_picture', DB::raw('CONCAT(u1.first_name, " ", u1.middle_name, " ", u1.last_name) AS name, CONCAT(u2.first_name, " ", u2.middle_name, " ", u2.last_name) AS coord, CONCAT(u3.first_name, " ", u3.middle_name, " ", u3.last_name) AS hte'))
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
                    'u1.course', DB::raw('CONCAT(u1.first_name, " ", u1.middle_name, " ", u1.last_name) AS name, CONCAT(u2.first_name, " ", u2.middle_name, " ", u2.last_name) AS coord, CONCAT(u3.first_name, " ", u3.middle_name, " ", u3.last_name) AS hte'))
                    ->join('users AS u1', 'u1.id', '=', 'user_id')
                    ->join('users AS u2', 'u2.id', '=', 'coord_id')
                    ->join('users AS u3', 'u3.id', '=', 'hte_id')
                    ->where('u1.approved', 1)
                    ->where('u1.role', 3)
                    ->get();

                    return $students;
                    break;

                case 1:
                    $students = DB::table('intern_handlers')
                    ->select('u1.id', 'u1.profile_picture AS stud_picture',
                    'u1.course', DB::raw('CONCAT(u1.first_name, " ", u1.middle_name, " ", u1.last_name) AS name, CONCAT(u2.first_name, " ", u2.middle_name, " ", u2.last_name) AS coord, CONCAT(u3.first_name, " ", u3.middle_name, " ", u3.last_name) AS hte'))
                    ->join('users AS u1', 'u1.id', '=', 'user_id')
                    ->join('users AS u2', 'u2.id', '=', 'coord_id')
                    ->join('users AS u3', 'u3.id', '=', 'hte_id')
                    ->where('u1.approved', 1)
                    ->where('u1.role', 3)
                    ->where('u1.course', $args[0])
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
         'u1.course', DB::raw('CONCAT(u1.first_name, " ", u1.middle_name, " ", u1.last_name) AS name, CONCAT(u2.first_name, " ", u2.middle_name, " ", u2.last_name) AS coord, CONCAT(u3.first_name, " ", u3.middle_name, " ", u3.last_name) AS hte'))
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

        // dd($tasks);

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
}
