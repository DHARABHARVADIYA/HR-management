<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Show the profile edit form
    public function edit()
    {
        return view('profile');
    }

    // Update profile logic
    public function update(Request $request)
    {
        // Validate the form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'current_password' => 'required',
            'new_password' => 'nullable|confirmed', // Optional, but if entered, must be confirmed
        ]);

        // Check if the current password matches the authenticated user's password
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match our records.']);
        }

        // Update user information
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        // If a new password is provided, update the password
        if ($request->new_password) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        // Redirect back with success message
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}

