<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InternHandler;
use App\Models\Requirement;
use App\Models\Evaluation;
use App\Models\User;
use App\Models\WeeklyEvaluation;
use App\Models\WeeklyTask;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HostingTrainingEstablishmentController extends Controller
{
    public function createWeeklyTasks(Request $request)
    {
        $validated = $request->validate([
           'file' => 'required'
        ]);

        $request->file('file')->storeAs($request->file('file')->getClientOriginalName());
        $path = Storage::path($request->file('file')->getClientOriginalName());

        return redirect()->route('hte.weekly.tasks');
    }

    public function getStudentsToApprove()
    {
        $students = DB::table('applications AS appli')
        ->select('u2.id', 'req.requirement AS resume', 'u2.profile_picture AS stud_picture', DB::raw('CONCAT(u2.first_name, " ", COALESCE(u2.middle_name, ""), " ", u2.last_name) AS name'))
        ->join('users AS u1', 'u1.id', '=', 'appli.hte_id')
        ->join('users AS u2', 'u2.id', '=', 'appli.stud_id')
        ->join('requirements AS req', 'req.user_id', '=', 'appli.stud_id')
        ->where('u1.id', Auth::id())
        ->where('appli.declined', 0)
        ->get();

        if($students->isEmpty())
        {
            $students = 'No Student Application yet';
        }

        // dd($students);

        return view('pages.hte.redirection.approve-students', compact('students'));
    }

    public function uploadWeeklyTask(Request $request, int $id)
    {
        $validation = $request->validate([
            'week' => 'required',
            'deadlines' => 'required',
            'files' => 'required',
            'deadlines' => 'required|array',
            'deadlines.*' => 'required|date|after_or_equal:today', // Ensures no past date and not empty
        ]);

        // 5 because there are 5 days with tasks|| i = day
        for($i = 1; $i <= 5; $i++)
        {
            $file = $validation['files'][$i];
            $fileName = 'task' . $i . $id . "-" . $validation['deadlines'][$i] . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('tasks', $fileName);

            $weekly_task = [
                'user_id' => $id,
                'hte_id' => Auth::id(),
                'week' => $validation['week'],
                'day' => $i,
                'tasks' => $fileName,
                'deadline' => $validation['deadlines'][$i]
            ];

            WeeklyTask::updateOrCreate(
                ['user_id' => $id, 'hte_id' => Auth::id(),
                'week' => $validation['week'],
                'day' => $i,
                // 'tasks' => $fileName,
                // 'deadline' => $validation['deadlines'][$i]
            ],
                $weekly_task
            );
        }

        return redirect()->route('hte.index', Auth::id())->with('success', 'Tasks successfully uploaded.');
    }

    public function viewAllStudents()
    {
        $students = UserController::getApprovedStudents();

        return view('pages.hte.student-weekly-task', compact('students'));
    }

    public function viewStudents(string $type, int $course)
    {
        $students = UserController::getApprovedStudents($course);
        // checks whether students contains data, if not give a message for error handling
        if($students->isEmpty())
        {
            $rawStudents = [
                [
                    'message' => 'No Student Data Available for this Program/Course',
                    'course' => $course
                ]
            ];
            $students = collect($rawStudents)->map(function ($student) {
                return (object) $student; // Convert each item to an object
            })->toArray();
        }
        return view('pages.hte.redirection.view-program-specific-student-' . $type, compact('students'));
    }

    public function viewStudent(string $type, int $id)
    {
        $stud = UserController::getApprovedStudent($id);
        $reports = FileController::getStudentReports($id);
        return view('pages.hte.redirection.view-student-specific-' . $type, compact('stud', 'reports'));
    }

    public function approve(Request $request, int $id)
    {


        //DELETE ROW IN APPLICATIONS TABLE
        Application::where('stud_id', $id)->where('hte_id', Auth::id())->delete();

        if($request->submitBtn == 'approve')
        {
            InternHandler::where('user_id', $id)->update(['hte_id' => Auth::id()]);
            User::find($id)->update(['approved' => 1]);

            return redirect()->back()->with('message', 'Student approved.');
        }else
        {
            Application::where('stud_id', $id)->update(['declined' => 1]);
            return redirect()->back()->with('message', 'Student declined.');
        }

    }

    public function storeEvaluation(Request $request, int $id)
    {
        $validated = $request->validate([
            'generalAppearance' => 'required|numeric',
            'attendance' => 'required|numeric',
            'honesty' => 'required|numeric',
            'cooperation' => 'required|numeric',
            'initiative' => 'required|numeric',
            'dependability' => 'required|numeric',
            'tact' => 'required|numeric',
            'accuracy' => 'required|numeric',

            'cleanliness' => 'required|numeric',
            'safety' => 'required|numeric',
            'toolUsage' => 'required|numeric',
            'shopCondition' => 'required|numeric',

            'supervisorRelation' => 'required|numeric',
            'workerRelation' => 'required|numeric',
            'studentRelation' => 'required|numeric',
        ]);

        $pa_average = ($validated['generalAppearance'] +
        $validated['attendance'] +
        $validated['honesty'] +
        $validated['cooperation'] +
        $validated['initiative'] +
        $validated['dependability'] +
        $validated['tact'] +
        $validated['accuracy']) / 8;

        $sm_average = ($validated['cleanliness'] +
        $validated['safety'] +
        $validated['toolUsage'] +
        $validated['shopCondition']) / 4;

        $hrs_average = ($validated['supervisorRelation'] +
        $validated['workerRelation'] +
        $validated['studentRelation']) / 3;

        Evaluation::updateOrCreate(
            [
                'stud_id' => $id,
                'hte_id' => Auth::id(),
                'pa_average' => $pa_average,
                'sm_average' => $sm_average,
                'hrs_average' => $hrs_average,
                'total_average' => ($pa_average + $sm_average + $hrs_average) / 3
            ]
        );
        // Process the data (e.g., save to database)
        // Example:
        // Evaluation::create($validated);

        return redirect()->back()->with('success', 'Evaluation submitted successfully!');
    }

}
