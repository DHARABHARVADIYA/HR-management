@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Edit Attendance</h3>
        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="card-body">
            <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="employee_id">Employee</label>
                            <select name="employee_id" id="employee_id" class="form-control" required>
                                <option value="">Select Employee</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}" {{ $attendance->employee_id == $employee->id ? 'selected' : '' }}>
                                        {{ $employee->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{ $attendance->date }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="present" {{ $attendance->status == 'present' ? 'selected' : '' }}>Present</option>
                                <option value="absent" {{ $attendance->status == 'absent' ? 'selected' : '' }}>Absent</option>
                                <option value="half-day" {{ $attendance->status == 'half-day' ? 'selected' : '' }}>Half Day</option>
                                <option value="on-leave" {{ $attendance->status == 'on-leave' ? 'selected' : '' }}>On Leave</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="check_in_time">Check-In Time</label>
                            <input type="time" name="check_in_time" id="check_in_time" class="form-control" value="{{ $attendance->check_in_time }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="check_out_time">Check-Out Time</label>
                            <input type="time" name="check_out_time" id="check_out_time" class="form-control" value="{{ $attendance->check_out_time }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="work_hours">Work Hours</label>
                            <input type="number" step="0.01" name="work_hours" id="work_hours" class="form-control" value="{{ $attendance->work_hours }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkInTime = document.getElementById('check_in_time');
        const checkOutTime = document.getElementById('check_out_time');
        const workHours = document.getElementById('work_hours');

       
        function calculateWorkHours() {
            const checkIn = checkInTime.value;
            const checkOut = checkOutTime.value;

            if (checkIn && checkOut) {
                const checkInDate = new Date('1970-01-01T' + checkIn + 'Z');  
                const checkOutDate = new Date('1970-01-01T' + checkOut + 'Z');

               
                const diffInMs = checkOutDate - checkInDate;
                
               
                const diffInHours = diffInMs / (1000 * 60 * 60);

                if (diffInHours < 0) {
                    workHours.value = '';
                    alert('Check-out time must be later than check-in time.');
                } else {
                    workHours.value = diffInHours.toFixed(2);
                }
            } else {
                workHours.value = '';
            }
        }

       
        checkInTime.addEventListener('input', calculateWorkHours);
        checkOutTime.addEventListener('input', calculateWorkHours);
    });
</script>
@endsection
