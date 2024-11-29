<?php

// app/Http/Controllers/DepartmentController.php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Display a listing of departments
    public function index()
    {
        // Paginate the departments with 10 items per page (you can change this number)
        $departments = Department::paginate(10);
        return view('departments.index', compact('departments'));
    }

    // Show the form for creating a new department
    public function create()
    {
        return view('departments.create');
    }

    // Store a newly created department in storage
    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        Department::create($request->all());

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    // Show the form for editing the specified department
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    // Remove the specified department from storage
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
