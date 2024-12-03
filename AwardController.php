<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Employee;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    // Display a list of awards
    public function index()
    {
        $awards = Award::with('employee')->paginate(10); // Eager load the employee relationship
        return view('awards.index', compact('awards'));
    }

    // Show the form to create a new award
    public function create()
    {
        $employees = Employee::all(); // Fetch all employees for the dropdown
        return view('awards.create', compact('employees'));
    }

    // Store the new award
    public function store(Request $request)
    {
        $request->validate([
            'award_name' => 'required|string|max:255',
            'award_description' => 'required|string',
            'gift_item' => 'required|string',
            'award_date' => 'required|date',
            'employee_id' => 'required|exists:employees,id',
        ]);

        Award::create($request->all());

        return redirect()->route('awards.index')->with('success', 'Award created successfully.');
    }

    // Show the form to edit an award
    public function edit($id)
    {
        $award = Award::findOrFail($id);
        $employees = Employee::all(); // Fetch all employees for the dropdown
        return view('awards.edit', compact('award', 'employees'));
    }

    // Update an award
    public function update(Request $request, $id)
    {
        $request->validate([
            'award_name' => 'required|string|max:255',
            'award_description' => 'required|string',
            'gift_item' => 'required|string',
            'award_date' => 'required|date',
            'employee_id' => 'required|exists:employees,id',
        ]);

        $award = Award::findOrFail($id);
        $award->update($request->all());

        return redirect()->route('awards.index')->with('success', 'Award updated successfully.');
    }

    // Delete an award
    public function destroy($id)
    {
        $award = Award::findOrFail($id);
        $award->delete();

        return redirect()->route('awards.index')->with('success', 'Award deleted successfully.');
    }
}
