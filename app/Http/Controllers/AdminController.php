<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InternHandler;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createUser(Request $request)
    {
        $studentCoord = null;
        switch($request->btradio)
        {
            case 'student':
                $user = $request->validate([
                    'first_name' => 'required',
                    'middle_name' => 'sometimes',
                    'last_name' => 'required',
                    'username' => 'required',
                    'password' => 'required|min:8',
                    'course' => 'required'
                ]);

                $studentCoord = $request->validate([
                    'coord_id' => 'required'
                ]);
                break;

            case 'ojt_coordinator':
                $user = $request->validate([
                    'first_name' => 'required',
                    'middle_name' => 'sometimes',
                    'last_name' => 'required',
                    'username' => 'required',
                    'password' => 'required|min:8'
                ]);
                break;

            case 'hte':
                $user = $request->validate([
                    'first_name' => 'required',
                    'username' => 'required',
                    'password' => 'required|min:8'
                ]);
                break;

        }

        //NOT TESTED YET
        $userID = User::create($user)->id;

        if($studentCoord != null)
        {
            InternHandler::create([
                'user_id' => $userID,
                'coord_id' => $studentCoord[0]->coord_id
            ]);
        }

        //dont know where to return
        return redirect()->route('admin.index')->with('success', 'Accounts successfully created.');
    }

    public function viewItStudents(string $type)
    {

        $students = UserController::getAllUsers(3, 1);

        return view('pages.admin.redirection.view-program-specific-student-' . $type, compact('students'));
    }

    public function viewComSciStudents(string $type)
    {

        $students = UserController::getAllUsers(3, 2);

        return view('pages.admin.redirection.view-program-specific-student-' . $type, compact('students'));
    }

    public function viewIsStudents(string $type)
    {

        $students = UserController::getAllUsers(3, 3);

        return view('pages.admin.redirection.view-program-specific-student-' . $type, compact('students'));
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
}
