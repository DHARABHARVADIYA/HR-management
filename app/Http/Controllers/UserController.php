<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role; // Import the Role model
use Illuminate\Http\Request;
use App\Models\Permission;

class UserController extends Controller
{
    public function __construct()
{
    // Apply the 'role:admin' middleware to the index and create methods
    $this->middleware('role:admin')->only(['index', 'create']);
}

    // Fetch users along with their roles (only accessible by admin)
public function index()
{
    // Fetch users along with their roles
    $users = User::with('roles')->get();

    return view('users.index', compact('users'));
}

    // Show user creation form
    public function create()
    {
        // Retrieve all roles from the database
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    // Store the newly created user
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
    
        // Attach the selected role to the user
        $user->roles()->attach($validated['role']);
    
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    public function editRoles(User $user)
{
    // Get all permissions related to the department module
    $permissions = Permission::where('module', 'department')->get();
    
    // Get the permissions that the user currently has
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


    
}

