@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Salary Calculation</h5>
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
                                <input type="text" id="basic_salary" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="present_days">Total Present Days</label>
                                <input type="text" id="present_days" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="basic_hours">Basic Working Hours</label>
                                <input type="text" id="basic_hours" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="present_hours">Total Present Hours</label>
                                <input type="text" id="present_hours" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>

               
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="month">Select Month</label>
                            <select name="month" id="month" class="form-control" required>
                                <option value="">Select Month</option>
                                <option value="28">28 Days (February)</option>
                                <option value="30">30 Days</option>
                                <option value="31">31 Days</option>
                            </select>
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
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#employee_id').change(function() {
        var employeeId = $(this).val();

     
        $('#basic_salary').val('');
        $('#present_days').val('');
        $('#basic_hours').val('');
        $('#present_hours').val('');

        if(employeeId) {
            $.ajax({
                url: '{{ route("salary.getEmployeeDetails") }}', 
                type: 'GET',
                data: { employee_id: employeeId },
                success: function(response) {
                    console.log(response);  
                    if(response.error) {
                        alert(response.error);
                    } else {
                        
                        $('#basic_salary').val(response.basic_salary);
                        $('#present_days').val(response.present_days);
                        $('#basic_hours').val(response.basic_hours);
                        $('#present_hours').val(response.present_hours);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);  
                    alert('Error fetching employee details');
                }
            });
        }
    });
});
</script>

