<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    
    public function showLoginForm()
    {
        return view('user.auth.login');
    }

   
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('user.dashboard');
        }

        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

   
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }
}
