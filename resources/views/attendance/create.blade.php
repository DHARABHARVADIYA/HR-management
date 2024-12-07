@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <h5>ADD Attendance</h5>

        </div>
        <div class="card-body">
            <form action="{{ route('attendance.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="employee_id">Employee</label>
                            <select name="employee_id" id="employee_id" class="form-control" required>
                                <option value="">Select Employee</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="present">Present</option>
                                <option value="absent">Absent</option>
                                <option value="half-day">Half Day</option>
                                <option value="on-leave">On Leave</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="check_in_time">Check-In Time</label>
                            <input type="time" name="check_in_time" id="check_in_time" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="check_out_time">Check-Out Time</label>
                            <input type="time" name="check_out_time" id="check_out_time" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="work_hours">Work Hours</label>
                            <input type="number" step="0.01" name="work_hours" id="work_hours" class="form-control"
                                readonly>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const checkInTime = document.getElementById('check_in_time');
        const checkOutTime = document.getElementById('check_out_time');
        const workHours = document.getElementById('work_hours');

        const calculateWorkHours = () => {
            if (checkInTime.value && checkOutTime.value) {
                const checkIn = new Date(`1970-01-01T${checkInTime.value}:00`);
                const checkOut = new Date(`1970-01-01T${checkOutTime.value}:00`);
                const diffInMs = checkOut - checkIn;
                if (diffInMs >= 0) {
                    const diffInHours = diffInMs / (1000 * 60 * 60);
                    workHours.value = diffInHours.toFixed(2);
                } else {
                    workHours.value = '';
                    alert('Check-out time must be after check-in time.');
                }
            } else {
                workHours.value = '';
            }
        };

        checkInTime.addEventListener('change', calculateWorkHours);
        checkOutTime.addEventListener('change', calculateWorkHours);
    });
</script>
@endsection