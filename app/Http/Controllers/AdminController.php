<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InternHandler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function createUser(Request $request)
    {
        // dd($request);
        $studentCoord = null;
        switch($request->role)
        {
            case 3:
                $validation = $request->validate([
                    'stud_first_name' => 'required',
                    'stud_middle_name' => 'sometimes',
                    'stud_last_name' => 'required',
                    'role' => 'required',
                    'stud_username' => 'required|alpha:ascii',
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

                $studentCoord = $request->validate([
                    'coord_id' => 'required'
                ]);

                break;

            case 2:
                $validation = $request->validate([
                    'coord_first_name' => 'required',
                    'coord_middle_name' => 'sometimes',
                    'coord_last_name' => 'required',
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
                    'hte_first_name' => 'required',
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

        //dont know where to return
        return redirect()->route('admin.index', Auth::id())->with('success', 'Accounts successfully created.');
    }

    public function viewUser(int $id)
    {
        $stud = UserController::getUser($id);

        return view('pages.admin.redirection.view-student-specific-list', compact('stud'));
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
