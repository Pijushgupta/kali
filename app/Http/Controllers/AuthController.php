<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * for admin login form
     * @return \Illuminate\Contracts\view\view
     */
    public function showLogin(): \Illuminate\Contracts\View\View
    {
        return view("login");
    }

    //for post submitLogin
    public function submitLogin(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended("dashboard");
        }

        return back()->withErrors([
            "email" => "The provided email do not match our records.",
            "password" => "Wrong password",
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }

    // public function createTempUser()
    // {
    //     User::create([
    //         "email" => "pijush@live.com",
    //         "name" => "Pijush Gupta",
    //         "password" => Hash::make("BMW007bmw007"),
    //     ]);
    // }
}
