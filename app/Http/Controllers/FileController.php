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

    public function download(int $id)
    {
        $fileName = DB::table('users')
        ->select('profile_picture')
        ->where('id', $id)
        ->first();


        // dd(Storage::disk('public')->url('images/',$fileName->profile_picture));

        return Storage::disk('public')->download('images/' .$fileName->profile_picture);

    }
}
