<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SubdepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return redirect()->route('login'); 
});


Auth::routes();

Route::get('/employee/create', function () {
    return view('employee.create');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::resource('customers', CustomerController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Show profile form

    // Route to update the profile
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Update profile


    Route::resource('departments', DepartmentController::class);
    Route::resource('subdepartments', SubdepartmentController::class);

    Route::resource('positions', PositionController::class);

//     Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('/users', [UserController::class, 'store'])->name('users.store');
// Route::resource('users', UserController::class);

// routes/web.php
Route::resource('users', UserController::class)->middleware('auth');
Route::get('users/{user}/roles', [UserController::class, 'editRoles'])->name('users.roles');

// Route to update the roles for a user
Route::put('users/{user}/roles', [UserController::class, 'updateRoles'])->name('users.updateRoles');


Route::get('/unauthorized', function() {
    return view('unauthorized');  // Create a 'unauthorized.blade.php' view
})->name('unauthorized');

  
});
// routes/web.php

