<?php

namespace App\Http\Controllers;
use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::with('employee')->paginate(10);
        return view('leaves.index', compact('leaves'));
    }

    public function updateStatus(Request $request, Leave $leave)
    {
        $leave->update(['approval_status' => $request->status]);
        return redirect()->route('leaves.index')->with('success', 'Leave status updated successfully!');
    }
    public function create()
    {
        $employees = Employee::all();
        return view('leaves.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type' => 'required|in:Paid,Unpaid,Sick,Casual',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'nullable|string|max:255',
        ]);

        $leaveDuration = \Carbon\Carbon::parse($request->start_date)
            ->diffInDays(\Carbon\Carbon::parse($request->end_date)) + 1;

        Leave::create([
            'employee_id' => $request->employee_id,
            'leave_type' => $request->leave_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'leave_duration' => $leaveDuration,
            'reason' => $request->reason,
            'approval_status' => 'Pending', 
        ]);

        return redirect()->route('leaves.index')->with('success', 'Leave request created successfully.');
    }

}
