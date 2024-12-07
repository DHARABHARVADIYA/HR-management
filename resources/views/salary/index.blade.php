@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Salary Calculation</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="card-body">
            <form id="salary-form" action="{{ route('salary.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="employee_id">Select Employee</label>
                            <select name="employee_id" id="employee_id" class="form-control" required>
                                <option value="">Select Employee</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div id="employee-details">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="basic_salary">Basic Salary</label>
                                <input type="text" id="monthly_salary" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="present_days">Present Days</label>
                                <input type="text" id="present_days" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="basic_hours">Basic Working Hours</label>
                                <input type="text" id="work_hours" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="present_hours">Present Hours</label>
                                <input type="text" id="present_hours" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="month">Select Month</label>
                            <input type="month" id="month" name="month" class="form-control" required>
                        </div>
                    </div>
                </div>
        </div>

        <div class="mt-4 text-right">
            <button type="submit" class="btn btn-success">Calculate Salary</button>
        </div>
        </form>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        function fetchEmployeeDetails() {
            var employeeId = $('#employee_id').val();
            var selectedMonth = $('#month').val(); // Get the value of the input field

            // Clear fields before fetching
            $('#monthly_salary').val('');
            $('#present_days').val('');
            $('#work_hours').val('');
            $('#present_hours').val('');

            if (employeeId && selectedMonth) {
                var year = selectedMonth.split('-')[0]; // Extract year
                var month = selectedMonth.split('-')[1]; // Extract month

                $.ajax({
                    url: '{{ route("salary.getEmployeeDetails") }}',
                    type: 'GET',
                    data: {
                        employee_id: employeeId,
                        year: year,      // Send the extracted year
                        month: month     // Send the extracted month
                    },
                    success: function (response) {
                        if (response.error) {
                            alert(response.error);
                            return;
                        }

                        $('#monthly_salary').val(response.monthly_salary);
                        $('#present_days').val(response.present_days);
                        $('#work_hours').val(response.work_hours);
                        $('#present_hours').val(response.present_hours);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error fetching employee details.');
                    }
                });
            }
        }

        // Trigger fetch on change of employee or month
        $('#employee_id').change(fetchEmployeeDetails);
        $('#month').change(fetchEmployeeDetails);
    });

</script>
@endsection