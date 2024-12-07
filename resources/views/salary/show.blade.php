@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Employee Salary Details</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="employee_name">Employee Name</label>
                        <input type="text" id="employee_name" class="form-control" value="{{ $employee->name }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="employee_id">Employee ID</label>
                        <input type="text" id="employee_id" class="form-control" value="{{ $employee->id }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basic_salary">Basic Salary</label>
                        <input type="text" id="basic_salary" class="form-control" value="{{ $employee->basic_salary }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="present_days">Total Present Days</label>
                        <input type="text" id="present_days" class="form-control" value="{{ $employee->present_days }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basic_hours">Basic Working Hours</label>
                        <input type="text" id="basic_hours" class="form-control" value="{{ $employee->basic_hours }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="present_hours">Total Present Hours</label>
                        <input type="text" id="present_hours" class="form-control" value="{{ $employee->present_hours }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="calculated_salary">Calculated Salary</label>
                        <input type="text" id="calculated_salary" class="form-control" value="{{ $employee->calculated_salary }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="month">Month</label>
                        <input type="text" id="month" class="form-control" value="{{ $employee->month }}" readonly>
                    </div>
                </div>
            </div>

            <div class="mt-4 text-right">
                <a href="{{ route('salary.index') }}" class="btn btn-secondary">Back to Salary List</a>
            </div>
        </div>
    </div>
</div>
@endsection
