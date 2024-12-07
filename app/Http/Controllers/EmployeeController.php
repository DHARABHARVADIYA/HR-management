<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Company; // Add Company model
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('department', 'company')->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        $companies = Company::all(); // Get companies
        return view('employees.create', compact('departments', 'companies'));
    }

    public function store(Request $request)
    {
        // Add validation for new fields
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'designation' => 'required|string|max:255',
            'joining_date' => 'required|date',
            'monthly_salary' => 'required|numeric',
            'work_hours' => 'required|numeric',
            'allowed_paid_leaves' => 'required|integer',
            'status' => 'required|in:Active,Inactive',
            'address' => 'nullable|string|max:255', // Validate address
            'birthdate' => 'nullable|date', // Validate birthdate
            'company_id' => 'nullable|exists:companies,id', // Validate company_id
        ]);

        // Create employee with new fields
        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee added successfully!');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $companies = Company::all(); // Get companies
        return view('employees.edit', compact('employee', 'departments', 'companies'));
    }

    public function update(Request $request, Employee $employee)
    {
        // Add validation for new fields
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'designation' => 'required|string|max:255',
            'joining_date' => 'required|date',
            'monthly_salary' => 'required|numeric',
            'work_hours' => 'required|numeric',
            'allowed_paid_leaves' => 'required|integer',
            'status' => 'required|in:Active,Inactive',
            'address' => 'nullable|string|max:255', // Validate address
            'birthdate' => 'nullable|date', // Validate birthdate
            'company_id' => 'nullable|exists:companies,id', // Validate company_id
        ]);

        // Update employee with new fields
        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
