@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-lg">
        <div class="card-header text-white text-center">
            <!-- Company Logo -->
            @if($salary->employee->company->logo)
                <img src="{{ asset('storage/' . $salary->employee->company->logo) }}" alt="Company Logo" class="img-fluid mb-3" style="max-height: 100px;">
            @else
                <img src="{{ asset('path/to/default-logo.png') }}" alt="Company Logo" class="img-fluid mb-3" style="max-height: 100px;">
            @endif
            <h5 class="font-weight-bold" style="text-transform: capitalize;">Employee Salary Details</h5>
        </div>

        <div class="card-body">
            <!-- Employee and Company Information Section -->
            <div class="row mb-4" style="display: flex; justify-content: space-between;">
                <div class="col-md-6" style="display: flex; flex-direction: column; height: 100%;"> 
                    <h5 class="font-weight-bold" style="text-transform: capitalize;">Employee Information</h5>
                    <table class="table table-bordered" style="flex-grow: 1;">
                        <tr>
                            <th>Name</th>
                            <td>{{ $salary->employee->name }}</td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td>{{ $salary->employee->department->department_name }}</td>
                        </tr>
                        <tr>
                            <th>Birthdate</th>
                            <td>{{ \Carbon\Carbon::parse($salary->employee->birthdate)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Joining Date</th>
                            <td>{{ \Carbon\Carbon::parse($salary->employee->joining_date)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $salary->employee->address }}</td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-6" style="display: flex; flex-direction: column; height: 100%;"> 
                    <h5 class="font-weight-bold" style="text-transform: capitalize;">Company Information</h5>
                    <table class="table table-bordered" style="flex-grow: 1;">
                        <tr>
                            <th>Company Name</th>
                            <td>{{ $salary->employee->company->company_name }}</td>
                        </tr>
                        <tr>
                            <th>Company Address</th>
                            <td>{{ $salary->employee->company->address }}</td>
                        </tr>
                        <tr>
                            <th>Company Phone</th>
                            <td>{{ $salary->employee->company->phone ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Company Email</th>
                            <td>{{ $salary->employee->company->email ?? 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Salary Information Section (Full Width) -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <h5 class="font-weight-bold" style="text-transform: capitalize;">Salary Information</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Month</th>
                            <td>{{ \Carbon\Carbon::parse($salary->month.'-01')->format('F') }}</td>
                        </tr>
                        <tr>
                            <th>Basic Salary</th>
                            <td>{{ number_format($salary->employee->monthly_salary, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Working Hours</th>
                            <td>{{ $salary->employee->work_hours }} hours</td>
                        </tr>
                        <tr>
                            <th>Present Days</th>
                            <td>{{ $present_days }}</td>
                        </tr>
                        <tr>
                            <th>Present Hours</th>
                            <td>{{ $present_hours }}</td>
                        </tr>
                        <tr>
                            <th>Calculated Salary</th>
                            <td>{{ number_format($salary->calculated_salary, 2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Leave Information Section -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <h5 class="font-weight-bold" style="text-transform: capitalize;">Leave Information</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Leave Type</th>
                                <th>Period</th>
                                <th>Total Leave Days</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salary->employee->leaves as $leave)
                                @php
                                    $start_date = \Carbon\Carbon::parse($leave->start_date);
                                    $end_date = \Carbon\Carbon::parse($leave->end_date);
                                    $total_leave_days = $start_date->diffInDays($end_date) + 1;
                                @endphp
                                <tr>
                                    <td>{{ $leave->leave_type }}</td>
                                    <td>{{ $start_date->format('d-m-Y') }} - {{ $end_date->format('d-m-Y') }}</td>
                                    <td>{{ $total_leave_days }} days</td>
                                    <td>
                                        @if($leave->approval_status)
                                            <span class="badge bg-success">Approved</span>
                                        @else
                                            <span class="badge bg-danger">Not Approved</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
