<?php

// app/Http/Controllers/SalaryController.php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use App\Models\Attendance;
use App\Models\Leave;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
   
    public function showSalaryForm()
    {
        // Fetch all employees from the database
        $employees = Employee::all();

        // Pass the employees to the view
        return view('salary.form', compact('employees'));
    }

    // Calculate and store the salary details
    public function calculateSalary(Request $request)
    {
        $employeeId = $request->employee_id;
        $month = $request->month;
    
        // Get employee's monthly salary and paid leave allowance
        $employee = Employee::find($employeeId);
        $monthlySalary = $employee->monthly_salary;
        $allowedPaidLeaves = $employee->allowed_paid_leaves;  // Get paid leave allowance
    
        $totalDaysInMonth = \Carbon\Carbon::parse($month)->daysInMonth;
    
        // Get Attendance Data (Present Days)
        $presentDays = Attendance::where('employee_id', $employeeId)
            ->where('status', 'Present')
            ->whereYear('attendance_date', \Carbon\Carbon::parse($month)->year)
            ->whereMonth('attendance_date', \Carbon\Carbon::parse($month)->month)
            ->count();
    
        // Calculate absent days as total days in the month minus present days
        $absentDays = $totalDaysInMonth - $presentDays;
    
        // Get Leave Data (Paid and Unpaid Leave Days)
        $totalLeaveDays = Leave::where('employee_id', $employeeId)
            ->where('approval_status', 'Approved')
            ->whereMonth('start_date', $month)
            ->sum('leave_duration');  // Total leave days
    
        // Calculate Paid Leave Days (this will use the allowed paid leave limit)
        $paidLeaveDays = Leave::where('employee_id', $employeeId)
            ->where('leave_type', 'Paid')  // Ensure we filter for 'Paid' leave type
            ->where('approval_status', 'Approved')
            ->whereMonth('start_date', $month)
            ->sum('leave_duration');  // Paid leave days
    
        // Ensure that paid leave days do not exceed the allowed paid leave days
        $paidLeaveDays = min($paidLeaveDays, $allowedPaidLeaves);
    
        // Calculate Unpaid Leave Days
        $unpaidLeaveDays = $totalLeaveDays - $paidLeaveDays;
    
        // Calculate daily rate based on the monthly salary
        $dailyRate = $monthlySalary / $totalDaysInMonth;
    
        // Calculate the total deductions based on both absent and unpaid leave days
        $deductions = ($absentDays + $unpaidLeaveDays) * $dailyRate;
    
        // Calculate the final salary after deductions
        $finalSalary = $monthlySalary - $deductions;
    
        // Save or update the salary record in the Salary table
        $salary = Salary::updateOrCreate(
            ['employee_id' => $employeeId, 'month' => $month],
            [
                'total_working_days' => $totalDaysInMonth,
                'present_days' => $presentDays,
                'absent_days' => $absentDays,
                'paid_leave_days' => $paidLeaveDays,
                'unpaid_leave_days' => $unpaidLeaveDays,
                'deductions' => $deductions,
                'final_salary' => $finalSalary,
            ]
        );
    
        // Fetch all salary records for the month (for reporting)
        $salaries = Salary::where('month', $month)->get(); // Ensure you are passing the list of salaries for the month
    
        // Return the view with salary and leave data
        return view('salary.report', [
            'salaries' => $salaries,  // Pass salaries data to the view
        ])->with('success', 'Salary Calculated Successfully!');
    }
    
    
    
    
    
    public function showSalaryReport()
    {
        $salaries = Salary::with('employee')->get();
        return view('salary.report', compact('salaries'));
    }
}
