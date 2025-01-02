<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WeeklyEvaluation;
use App\Models\WeeklyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function storePicture(Request $request, int $id)
    {
        $request->validate([
            'test_file' => 'required|mimes:docx,pdf,txt',
        ]);

        $file = $request->file('test_file');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storePubliclyAs('images', $fileName, 'public');

        $user = User::find($id);
        $user->profile_picture = $fileName;
        $user->save();

        return redirect()->back()->with('message', 'File uploaded successfully.');
    }


    public function fileDownload(string $path, string $fileName)
    {
        return Storage::download($path . '/' . $fileName);
    }

    public static function getStudentReports(int $id)
    {
        $reports = DB::table('weekly_reports')
        ->select('*')
        ->join('users AS u', 'user_id', '=', 'u.id')
        ->where('user_id', $id)
        ->get();

        return $reports;
    }

    public static function getStudentWeeklyReport(int $id, int $week)
    {
        $report = DB::table('weekly_reports')
        ->select('*')
        ->join('users AS u', 'user_id', '=', 'u.id')
        ->where('user_id', $id)
        ->where('task_week', $week)
        ->get();

        return response()->json($report);
    }


    public function uploadEvaluation(Request $request, int $id)
    {
        $validation = $request->validate([
            // 'week' => 'required',
            'evaluation' => 'required'
        ]);


        $file = $request->file('evaluation');
        //  . "-" . Auth::id() . time() .  USED TO BE IN THE FILENAME
        $fileName = 'evaluation-'. Auth::user()->first_name .'.' . $file->getCLientOriginalExtension();
        $filePath = $file->storeAs('evaluations', $fileName);

        $weekly_evaluation = [
            'user_id' => $id,
            'task_week' => 1,
            'evaluator_id' => Auth::id(),
            'evaluation' => $fileName,
        ];

        WeeklyEvaluation::create($weekly_evaluation);

        return redirect()->back();
    }

    public function deleteWeeklyReport(Request $request, int $id)
    {
        $validation = $request->validate([
            'week' => 'required'
        ]);

        WeeklyReport::where('user_id', $id)->where('task_week', $validation['week'])->delete();
        return redirect()->back();
    }
}
