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
                return view('pages.ojy_coordinator.index', compact('user'));
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

    public static function getAllFromRole(int $role)
    {
        $users = DB::table('users')
        ->select('*')
        ->where('role', $role)
        ->get();

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
