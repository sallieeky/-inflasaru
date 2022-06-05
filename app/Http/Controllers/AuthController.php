<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('v_login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect("/");
        } else {
            return back()->with("error", "Username atau Password Salah");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Berhasil Logout');
    }
}
