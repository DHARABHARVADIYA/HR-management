<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SubdepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\CompanyController;


Route::get('/', function () {
    return redirect()->route('login');
});


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::resource('customers', CustomerController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('departments', DepartmentController::class);
    Route::resource('subdepartments', SubdepartmentController::class);

    Route::resource('positions', PositionController::class);

    Route::resource('users', UserController::class)->middleware('auth');
    Route::get('users/{user}/roles', [UserController::class, 'editRoles'])->name('users.roles');

    Route::put('users/{user}/roles', [UserController::class, 'updateRoles'])->name('users.updateRoles');

    Route::get('/employee/create', function () {
        return view('employee.create');
    });

    Route::get('/unauthorized', function () {
        return view('unauthorized');
    })->name('unauthorized');

    Route::resource('employees', EmployeeController::class);
    Route::get('/employee-details/{employee_id}', [EmployeeController::class, 'getEmployeeDetail'])->name('employee.details');

    Route::get('leaves', [LeaveController::class, 'index'])->name('leaves.index');
    Route::post('leaves/{leave}/update-status', [LeaveController::class, 'updateStatus'])->name('leaves.update-status');

    Route::get('leaves/create', [LeaveController::class, 'create'])->name('leaves.create');
    Route::post('leaves', [LeaveController::class, 'store'])->name('leaves.store');


    Route::resource('awards', AwardController::class);

    Route::resource('notices', NoticeController::class);

    Route::resource('attendance', AttendanceController::class);

    Route::get('salary', [SalaryController::class, 'index'])->name('salary.index');
    Route::get('salary/employee-details', [SalaryController::class, 'getEmployeeDetails'])->name('salary.getEmployeeDetails');
    Route::post('salary', [SalaryController::class, 'store'])->name('salary.store');
    Route::get('/salary/{id}/edit', [SalaryController::class, 'edit'])->name('salary.edit');
    Route::put('/salary/{id}', [SalaryController::class, 'update'])->name('salary.update');
    Route::delete('/salary/{id}', [SalaryController::class, 'destroy'])->name('salary.destroy');
    Route::get('salary/list', [SalaryController::class, 'list'])->name('salary.list');
    Route::get('/salary/{salary}/view', [SalaryController::class, 'viewDetails'])->name('salary.viewDetails');
    Route::get('salary/{salary}/download-pdf', [SalaryController::class, 'downloadSalaryPDF'])->name('salary.downloadPDF');
    Route::get('salary/{salaryId}/download-pdf', [SalaryController::class, 'downloadSalaryPDF'])
        ->name('salary.downloadPDF');


    Route::get('/requirements/create', [RequirementController::class, 'create'])->name('requirements.create');
    Route::post('/requirements', [RequirementController::class, 'store'])->name('requirements.store');
    Route::get('/requirements', [RequirementController::class, 'index'])->name('requirements.index');

    Route::resource('job_postings', JobPostingController::class);
    Route::get('/job-postings/{jobPosting}', [JobPostingController::class, 'show'])->name('job_postings.show');


    Route::resource('companies', CompanyController::class);

});


