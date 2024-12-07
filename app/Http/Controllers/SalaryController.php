<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PDF;


class SalaryController extends Controller
{
    public function index()
    {

        $employees = Employee::all();
        return view('salary.index', compact('employees'));
    }

    public function getEmployeeDetails(Request $request)
    {
        $employee = Employee::find($request->employee_id);

        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }


        $month = $request->month ?? now()->month;
        $year = now()->year;


        $attendance = Attendance::where('employee_id', $employee->id)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->get();

        $present_days = $attendance->count();
        $present_hours = $attendance->sum('work_hours');

        return response()->json([
            'monthly_salary' => $employee->monthly_salary,
            'work_hours' => $employee->work_hours,
            'present_days' => $present_days,
            'present_hours' => $present_hours,
        ]);
    }

    public function store(Request $request)
    {
        Log::info('Request Data:', $request->all());

        $employee = Employee::find($request->employee_id);
        if (!$employee) {
            return redirect()->route('salary.index')->with('error', 'Employee not found');
        }


        $selectedMonth = $request->month;
        $month = (int) substr($selectedMonth, 5, 2);
        $year = (int) substr($selectedMonth, 0, 4);


        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $attendance = Attendance::where('employee_id', $employee->id)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->get();

        $present_days = $attendance->count();
        $present_hours = $attendance->sum('work_hours');

        $total_monthly_hours = $daysInMonth * $employee->work_hours;

        if ($total_monthly_hours == 0) {
            return redirect()->route('salary.index')->with('error', 'Total monthly hours cannot be zero');
        }

        $calculated_salary = ($employee->monthly_salary / $total_monthly_hours) * $present_hours;

        Log::info('Calculated Salary:', ['salary' => $calculated_salary]);

        $salary = Salary::create([
            'employee_id' => $request->employee_id,
            'month' => $selectedMonth,
            'calculated_salary' => $calculated_salary,
        ]);

        if ($salary) {
            return redirect()->route('salary.list')->with('success', 'Salary Calculated Successfully');
        } else {
            return redirect()->route('salary.index')->with('error', 'Failed to calculate salary');
        }
    }


    public function edit($id)
    {
        $salary = Salary::find($id);
        $employees = Employee::all();
        return view('salary.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $salary = Salary::find($id);
        $salary->update($request->all());
        return redirect()->route('salary.index')->with('success', 'Salary Updated Successfully');
    }

    public function destroy($id)
    {
        $salary = Salary::find($id);
        $salary->delete();
        return redirect()->route('salary.list')->with('success', 'Salary Deleted Successfully');
    }

    public function list()
    {
        $entries = request()->get('entries', 10);
        $salaries = Salary::with('employee')->paginate($entries);

        foreach ($salaries as $salary) {

            if (is_numeric($salary->month)) {
                $salary->month = str_pad($salary->month, 2, '0', STR_PAD_LEFT);
                $salary->month = $salary->year . '-' . $salary->month;
            }
        }

        return view('salary.list', compact('salaries'));
    }


    public function getEmployeeDetail($employee_id)
    {

        $employee = Employee::with(['salaries', 'leaves'])->findOrFail($employee_id);


        return response()->json([
            'employee' => $employee,
            'salary' => $employee->salaries,
            'leave' => $employee->leaves,
        ]);
    }
    public function viewDetails($salary_id)
    {
        $salary = Salary::with('employee', 'employee.salaries', 'employee.leaves')->findOrFail($salary_id);


        $year = substr($salary->month, 0, 4);
        $month = substr($salary->month, 5, 2);


        $attendance = Attendance::where('employee_id', $salary->employee->id)
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->get();


        $present_days = $attendance->count();
        $present_hours = $attendance->sum('work_hours');

        return view('salary.details', compact('salary', 'present_days', 'present_hours'));
    }

    public function downloadSalaryPDF($salaryId)
    {
        $salary = Salary::findOrFail($salaryId);
        $present_days = $this->getPresentDays($salary->employee);
        $present_hours = $this->getPresentHours($salary->employee);
    
        $pdf = PDF::loadView('salary.pdf', compact('salary', 'present_days', 'present_hours'));
        return $pdf->download('salary_details.pdf');
    }
    public function getPresentDays(Employee $employee)
{
    $attendance = Attendance::where('employee_id', $employee->id)
        ->whereMonth('date', now()->month)
        ->whereYear('date', now()->year)
        ->get();

    return $attendance->count();
}

public function getPresentHours(Employee $employee)
{
    $attendance = Attendance::where('employee_id', $employee->id)
        ->whereMonth('date', now()->month)
        ->whereYear('date', now()->year)
        ->get();

    return $attendance->sum('work_hours');
}






}
