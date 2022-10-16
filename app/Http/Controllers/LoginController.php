<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function masuk ()
    {
        return view('/login');
    }

    public function cek(Request $request)
    {
        $cek = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($cek)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Stop Anda Bau');

        return redirect('/login');
    }

    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
