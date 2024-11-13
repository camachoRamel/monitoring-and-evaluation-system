<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{
    public static function loginTime()
    {
        Record::create([
            'user_id' => Auth::id(),
            'time' => Carbon::now()->toDayDateTimeString(),
            'log_type' => 0
        ]);
    }

    public static function logoutTime()
    {
        Record::create([
            'user_id' => Auth::id(),
            'time' => Carbon::now()->toDayDateTimeString(),
            'log_type' => 1
        ]);
    }

    public function viewRecords()
    {
        $records = DB::table('records')
        ->select('time', 'log_type', 'u.role', 'u.username')
        ->join('users AS u', 'u.id', '=', 'user_id')
        ->get();
        return view('pages.admin.redirection.records', compact('records'));
    }
}
