<!DOCTYPE html>
<html>
<head>
    <title>Salary Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center; /* Centering all content in the body */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        h1, h2, h5 {
            text-transform: capitalize;
        }
        .table-title {
            font-weight: bold;
            margin-top: 20px;
        }
        .text-center {
            text-align: center;
        }
        .logo {
            width: 150px; 
            margin-bottom: 20px; 
        }
    </style>
</head>
<body>
    <!-- Logo Section -->
    <div>
        <!-- <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="logo">  -->
    </div>

    <h1>Employee Salary Details</h1>

    <h2>Employee Information</h2>
    <table>
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

    <h2>Company Information</h2>
    <table>
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

    <h2 class="table-title">Salary Information</h2>
    <table>
        <tr>
            <th>Month</th>
            <td>{{ \Carbon\Carbon::parse($salary->month . '-01')->format('F') }}</td>
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

    <h2 class="table-title">Leave Information</h2>
    <table>
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
                            <span style="color: green;">Approved</span>
                        @else
                            <span style="color: red;">Not Approved</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center">
        <p>Generated on: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
    </div>
</body>
</html>
