<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * for admin login form
     * @return \Illuminate\Contracts\view\view
     */
    public function showLogin()
    {
       // return view("login");
       return Inertia::render('Login');
    }

    //for post submitLogin
    public function submitLogin(Request $request)
    {
        $credentials = $request->validate([
            "loginEmail" => "required|email",
            "loginPassword" => "required",
        ]);
        $credentials = ["email"=> $credentials["loginEmail"],"password"=>$credentials["loginPassword"]];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended("dashboard");
        }

        return back()->withErrors([
            "loginEmail" => "The provided email do not match our records.",
            "loginPassword" => "Wrong password",
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
