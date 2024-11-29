<?php

namespace App\Http\Controllers;

use App\Models\Subdepartment;
use App\Models\Department;
use Illuminate\Http\Request;

class SubdepartmentController extends Controller
{
   // In SubdepartmentController.php
public function index()
{
    $subdepartments = Subdepartment::all();  // Fetch all subdepartments
    $departments = Department::all();        // Fetch all departments to display in the modal

    return view('subdepartments.index', compact('subdepartments', 'departments'));
}


    public function create()
{
    $departments = Department::all(); // Get all departments
    return view('subdepartments.create', compact('departments'));
}


    public function store(Request $request)
    {
        $request->validate([
            'subdepartment_name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'status' => 'required|in:Active,Inactive',
        ]);

        Subdepartment::create($request->all());
        return redirect()->route('subdepartments.index')->with('success', 'Subdepartment created successfully.');
    }

    public function edit($id)
    {
        // Find the subdepartment by ID
        $subdepartment = Subdepartment::findOrFail($id);
    
        // Get all departments for the select options
        $departments = Department::all();
    
        // Return the edit view with the subdepartment and departments
        return view('subdepartments.edit', compact('subdepartment', 'departments'));
    }
    public function update(Request $request, Subdepartment $subdepartment)
    {
        $request->validate([
            'subdepartment_name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'status' => 'required|in:Active,Inactive',
        ]);

        $subdepartment->update($request->all());
        return redirect()->route('subdepartments.index')->with('success', 'Subdepartment updated successfully.');
    }

    public function destroy(Subdepartment $subdepartment)
    {
        $subdepartment->delete();
        return redirect()->route('subdepartments.index')->with('success', 'Subdepartment deleted successfully.');
    }
}

