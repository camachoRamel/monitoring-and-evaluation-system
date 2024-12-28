<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginLogoutController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            RecordController::loginTime();
            //switch case to determine the role of the user
            switch(Auth::user()->role)
            {
                case 0:
                    return redirect()->route('admin.index', Auth::id());
                    break;

                case 1:
                    return redirect()->route('hte.index', Auth::id());
                    break;

                case 3:
                    return redirect()->route('stud.index', Auth::id());
                    break;
            }
        }

        //return if login failed
        return redirect('/')->with('incorrect', 'Incorrect password or username');
    }

    public function logout(Request $request)
    {
        RecordController::logoutTime();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }
}
