<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role; 
use App\Models\Permission;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('role:admin')->only(['index', 'create']);
    }

    public function index()
    {
        $users = User::with('roles')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'required|exists:roles,id',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        $user->roles()->attach($validated['role']);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function editRoles(User $user)
    {
       
        $permissions = Permission::whereIn('module', ['department', 'subdepartment'])->get();
        $userPermissions = $user->permissions->pluck('id')->toArray();
        return view('users.editRoles', compact('user', 'permissions', 'userPermissions'));
    }
    

    public function updateRoles(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $permissions = $request->input('permissions', []);
        $user->permissions()->sync($permissions);

        return redirect()->back()->with('success', 'Permissions updated successfully for ' . $user->name);
    }

    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|min:8|confirmed',  // Password is optional but must be confirmed if provided
        'role' => 'required|array',  // Ensure an array of role ids is passed
        'role.*' => 'exists:roles,id', // Each role id must exist in the roles table
    ]);

    // Update user info
    $user->name = $request->name;
    $user->email = $request->email;

    // Update password if it's provided
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    // Sync roles (update the pivot table)
    $user->roles()->sync($request->role); // Sync the selected roles

    // Save the user
    $user->save();

    return redirect()->route('users.index')->with('success', 'User updated successfully!');
}


    public function edit($id)
    {
      
        $user = User::findOrFail($id);
        $roles = Role::all(); 
        return view('users.edit', compact('user', 'roles'));
    }

    public function destroy($id)
{
    $user = User::findOrFail($id);

    // Delete the user
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully!');
}

}
