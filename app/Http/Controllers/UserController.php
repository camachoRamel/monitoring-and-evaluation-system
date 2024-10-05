<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(int $id)
    {
        $user = DB::table('users')
        ->select('*')
        ->where('id', $id)
        ->first();

        switch ($user->role) {
            case 0:
                return view('pages.admin.index', compact('user'));
                break;
            case 1:
                return view('pages.hte.index', compact('user'));
                break;
            case 2:
                return view('pages.ojt_coordinator.index', compact('user'));
                break;
            case 3:
                //checks student is approved by hte
                if(!UserController::isApproved($id))
                {
                    return view('pages.student.conditional-pages.submit-requirements', compact('user'));
                }
                return view('pages.student.index', compact('user'));
                break;
        }




        // $relations = DB::table('intern_handlers')->select('*')->where('user_id', $id);

    }

    //FIRST ARGUMENT IS FOR ROLE SECOND IS FOR COURSE. SECOND ARGUMENT IS ONLY PRESENT WHEN ITS FOR STUDENT
    public static function __callStatic($name, $args)
    {
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
                    ->select('u1.id', DB::raw('CONCAT(u1.first_name, " ", u1.middle_name, " ", u1.last_name) AS name, CONCAT(u2.first_name, " ", u2.middle_name, " ", u2.last_name) AS coord, CONCAT(u3.first_name, " ", u3.middle_name, " ", u3.last_name) AS hte'))
                    ->join('users AS u1', 'u1.id', '=', 'user_id')
                    ->join('users AS u2', 'u2.id', '=', 'coord_id')
                    ->leftJoin('users AS u3', 'u3.id', '=', 'hte_id')
                    ->where('u1.role', $args[0])
                    ->where('u1.course', $args[1])
                    ->get();
            }
        }

        return $users;
    }

    public static function getWeeklyTasks()
    {
        $tasks = DB::talbe('weekly_tasks')
        ->select('*')
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
}
