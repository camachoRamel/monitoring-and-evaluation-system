<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoordinatorController extends Controller
{
    public function viewStudents(string $type, int $course)
    {
        $students = UserController::getApprovedStudents($course);

        return view('pages.ojt_coordinator.redirection.view-program-specific-student-' . $type, compact('students'));
    }

    public function viewStudent(string $type, int $id)
    {
        $stud = UserController::getApprovedStudent($id);
        $reports = FileController::getStudentReports($id);

        return view('pages.ojt_coordinator.redirection.view-student-specific-' . $type, compact('stud', 'reports'));
    }
}
