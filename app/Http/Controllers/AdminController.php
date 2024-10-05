<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createUser(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'sometimes',
            'last_name' => 'required',
            'profile_picture' => 'sometimes|required',
            'role' => 'sometimes',
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        User::create($validated);

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
