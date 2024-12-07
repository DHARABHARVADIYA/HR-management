<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use App\Models\Department;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
   
    public function index()
    {
        $requirements = Requirement::paginate(10); 
        return view('requirements.index', compact('requirements'));
    }
    
    public function create()
    {
        $departments = Department::all();
        return view('requirements.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:Low,Medium,High,Urgent',
            'budget' => 'nullable|numeric',
            'deadline' => 'required|date',
            'department_id' => 'required|exists:departments,id',
            'status' => 'required|in:Draft,Published',
        ]);

        Requirement::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'budget' => $request->budget,
            'deadline' => $request->deadline,
            'department_id' => $request->department_id,
            'status' => $request->status,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('requirements.index')->with('success', 'Requirement created successfully.');
    }
}
