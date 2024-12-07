<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     * 


     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // app/Http/Controllers/Auth/LoginController.php
protected function authenticated(Request $request, $user)
{
    // Check if the user has the 'admin' role
    if ($user->hasRole('admin')) {
        // Redirect to the users index page or any other page
        return redirect()->route('users.index');  // or route to any other page
    }

    // For other users, redirect to the home page
    return redirect()->route('home');
}

}
