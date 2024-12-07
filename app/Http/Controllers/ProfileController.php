<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    public function edit()
    {
        return view('profile');
    }

   
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'current_password' => 'required',
            'new_password' => 'nullable|confirmed', 
        ]);

       
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match our records.']);
        }

      
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        
        if ($request->new_password) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}

