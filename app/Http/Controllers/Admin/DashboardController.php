<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Award;
use App\Models\Employee;
use App\Models\Attendance;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
       
        $notices = Notice::all(); 
        $awards = Award::all(); 

        $totalEmployees = Employee::count();

        $today = Carbon::today()->toDateString(); 
        $todayPresents = Attendance::whereDate('date', $today)->where('status', 'present')->count();
        $todayAbsents = Attendance::whereDate('date', $today)->where('status', 'absent')->count();
        $todayLeave = Attendance::whereDate('date', $today)->where('status', 'leave')->count();

        // Return the view with the necessary data
        return view('admin.dashboard', compact('notices', 'awards', 'totalEmployees', 'todayPresents', 'todayAbsents', 'todayLeave'));
    }
}
