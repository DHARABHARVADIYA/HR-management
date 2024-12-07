@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Attendance Records</h5>
                <div>
                    <a href="{{ route('attendance.create') }}" class="btn btn-success" style="height: 42px;">
                        <i class="fas fa-plus"></i> Add Attendance
                    </a>
                    <button class="btn btn-primary ml-2" style="height: 42px;" data-toggle="modal"
                        data-target="#filterModal">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <!-- Show Detailed Attendance Table only when filter is applied -->
                @if(request('employee_id') || request('month_year'))
                    <!-- Detailed Attendance Table when filter is applied -->
                    @if($employeeId && $daysInMonth->isNotEmpty())
                        <div class="card mt-4">
                            <div class="card-header">
                                <h5>Detailed Attendance for {{ \Carbon\Carbon::parse($monthYear)->format('F Y') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Check-In</th>
                                                <th>Check-Out</th>
                                                <th>Work Hours</th>
                                                <th>Leave Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($daysInMonth as $day)
                                                @php
                                                    $attendance = $attendances->first(function ($attendance) use ($day) {
                                                        return \Carbon\Carbon::parse($attendance->date)->format('Y-m-d') == $day->format('Y-m-d');
                                                    });
                                                    $leave = $leaves->first(function ($leave) use ($day) {
                                                        return $day->between($leave->start_date, $leave->end_date);
                                                    });
                                                @endphp
                                                <tr style="{{ !$attendance && !$leave ? 'background-color: #f8d7da;' : '' }}">
                                                    <td>{{ $day->format('d-m-Y') }}</td>
                                                    <td>
                                                        @if($attendance)
                                                            {{ ucfirst($attendance->status) }}
                                                        @elseif($leave)
                                                            On Leave
                                                        @else
                                                            Absent
                                                        @endif
                                                    </td>
                                                    <td>{{ $attendance->check_in_time ?? '-' }}</td>
                                                    <td>{{ $attendance->check_out_time ?? '-' }}</td>
                                                    <td>{{ $attendance->work_hours ?? '-' }}</td>
                                                    <td>
                                                        @if($leave)
                                                            <strong>Status:</strong> <span
                                                                style="color: {{ $leave->approval_status == 'Approved' ? 'green' : 'red' }};">{{ $leave->approval_status }}</span><br>
                                                            <strong>Reason:</strong> {{ $leave->reason }}
                                                        @else
                                                            - 
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <!-- Default Attendance Records Table when no filter is applied -->
                    <table class="table table-striped table-bordered w-100" id="attendanceTable">
                        <thead>
                            <tr>
                                <th>SR</th>
                                <th>Employee Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Check-In</th>
                                <th>Check-Out</th>
                                <th>Work Hours</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $index => $attendance)
                                <tr>
                                    <td>{{ $attendances->firstItem() + $index }}</td>
                                    <td>{{ $attendance->employee->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d-m-Y') }}</td>
                                    <td>{{ ucfirst($attendance->status) }}</td>
                                    <td>{{ $attendance->check_in_time }}</td>
                                    <td>{{ $attendance->check_out_time }}</td>
                                    <td>{{ $attendance->work_hours }}</td>
                                    <td>
                                        <a href="{{ route('attendance.edit', $attendance) }}"
                                            class="btn btn-sm btn-outline-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('attendance.destroy', $attendance) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p class="text-muted">
                            Showing {{ $attendances->firstItem() }} to {{ $attendances->lastItem() }} of
                            {{ $attendances->total() }} entries
                        </p>
                        {{ $attendances->appends(request()->query())->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="GET" action="{{ route('attendance.index') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filter Attendance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                    <div class="form-group">
                        <label for="employee_id">Employee</label>
                        <select name="employee_id" id="employee_id" class="form-control">
                            <option value="">Select Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ request('employee_id') == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                 
                    <div class="form-group">
                        <label for="month_year">Month and Year</label>
                        <input type="month" name="month_year" id="month_year" class="form-control"
                            value="{{ request('month_year') ?? date('Y-m') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Apply Filter</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
