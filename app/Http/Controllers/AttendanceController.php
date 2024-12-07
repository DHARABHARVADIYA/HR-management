<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $employeeId = $request->employee_id;
        $monthYear = $request->month_year ?? Carbon::now()->format('Y-m');
        $year = substr($monthYear, 0, 4);
        $month = substr($monthYear, 5, 2);
    
        $query = Attendance::with('employee')
            ->whereYear('date', $year)
            ->whereMonth('date', $month);
    
        if ($employeeId) {
            $query->where('employee_id', $employeeId);
        }
    
        $attendances = $query->paginate(10);
    
        $employees = Employee::all();
    
        $daysInMonth = collect();
        for ($day = 1; $day <= Carbon::createFromDate($year, $month)->daysInMonth; $day++) {
            $daysInMonth->push(Carbon::create($year, $month, $day));
        }
    
        $leaveQuery = Leave::whereYear('start_date', $year)
            ->whereMonth('start_date', $month);
    
        if ($employeeId) {
            $leaveQuery->where('employee_id', $employeeId);
        }
    
        $leaves = $leaveQuery->get();
    
        return view('attendance.index', compact('attendances', 'employees', 'daysInMonth', 'monthYear', 'employeeId', 'leaves'));
    }
    


    public function create()
    {
        $employees = Employee::all();
        return view('attendance.create', compact('employees'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'status' => 'required',
        ]);

        $leave = Leave::where('employee_id', $request->employee_id)
            ->whereDate('start_date', '<=', $request->date)
            ->whereDate('end_date', '>=', $request->date)
            ->where('approval_status', 'Approved')
            ->first();

        if ($leave) {

            return back()->with('error', 'Attendance cannot be recorded on a leave day.');
        }

        $existingAttendance = Attendance::where('employee_id', $request->employee_id)
            ->whereDate('date', $request->date)
            ->exists();

        if ($existingAttendance) {

            return back()->with('error', 'Attendance for this employee on this date has already been recorded.');
        }

        Attendance::create([
            'employee_id' => $request->employee_id,
            'date' => $request->date,
            'status' => $request->status,
            'check_in_time' => $request->check_in_time,
            'check_out_time' => $request->check_out_time,
            'work_hours' => $request->work_hours,
        ]);

        return redirect()->route('attendance.index')->with('success', 'Attendance added successfully!');
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::all();
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);


        $validated = $request->validate([
            'employee_id' => 'required',
            'date' => 'required|date',
            'status' => 'required',
            'check_in_time' => 'required|date_format:H:i',
            'check_out_time' => 'required|date_format:H:i',
            'work_hours' => 'nullable|numeric',
        ]);


        \Log::debug('Check-out time format: ' . $request->input('check_out_time'));

        $checkInTime = $request->input('check_in_time');
        $checkOutTime = $request->input('check_out_time');


        if ($checkInTime && $checkOutTime) {
            $checkInDate = new \DateTime('1970-01-01T' . $checkInTime);
            $checkOutDate = new \DateTime('1970-01-01T' . $checkOutTime);

            $interval = $checkInDate->diff($checkOutDate);
            $workHours = $interval->h + ($interval->i / 60);
        } else {
            $workHours = 0;
        }

        $attendance->update([
            'employee_id' => $request->input('employee_id'),
            'date' => $request->input('date'),
            'status' => $request->input('status'),
            'check_in_time' => $checkInTime,
            'check_out_time' => $checkOutTime,
            'work_hours' => $workHours,
        ]);

        return redirect()->route('attendance.index')->with('success', 'Attendance updated successfully!');
    }

    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return redirect()->route('attendance.index')->with('success', 'Attendance record deleted successfully.');
    }
}
