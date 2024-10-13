<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
}
