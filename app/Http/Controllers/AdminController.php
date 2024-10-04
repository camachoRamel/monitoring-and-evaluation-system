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

    public function viewStudents()
    {
        //still not complete
        $students = UserController::getAllFromRole(3);
        return view('pages.admin.student-list', compact('students'));
    }

    public function viewHtes()
    {
        //still not complete
        $htes = UserController::getAllFromRole(1);
        return view('pages.admin.student-list', compact('htes'));
    }

    public function viewCoordinators()
    {
        //still not complete
        $coordinators = UserController::getAllFromRole(2);
        return view('pages.admin.student-list', compact('coordinators'));
    }
}
