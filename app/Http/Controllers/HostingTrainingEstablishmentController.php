<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
}
