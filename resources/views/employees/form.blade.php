<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Employee Form</h5>
        </div>
        <div class="card-body">
            <form action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store') }}" method="POST">
                @csrf
                @if(isset($employee))
                    @method('PUT')
                @endif

                <div class="row">
                    <!-- Name -->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" 
                                value="{{ old('name', $employee->name ?? '') }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Department -->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="department_id">Department</label>
                            <select name="department_id" id="department_id" class="form-control" required>
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" 
                                        {{ isset($employee) && $employee->department_id == $department->id ? 'selected' : '' }}>
                                        {{ $department->department_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Designation -->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" id="designation" class="form-control" 
                                value="{{ old('designation', $employee->designation ?? '') }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Joining Date -->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="joining_date">Joining Date</label>
                            <input type="date" name="joining_date" id="joining_date" class="form-control" 
                                value="{{ old('joining_date', $employee->joining_date ?? '') }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Monthly Salary -->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="monthly_salary">Monthly Salary</label>
                            <input type="number" name="monthly_salary" id="monthly_salary" class="form-control" 
                                value="{{ old('monthly_salary', $employee->monthly_salary ?? '') }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Allowed Paid Leaves -->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="allowed_paid_leaves">Allowed Paid Leaves</label>
                            <input type="number" name="allowed_paid_leaves" id="allowed_paid_leaves" class="form-control" 
                                value="{{ old('allowed_paid_leaves', $employee->allowed_paid_leaves ?? 0) }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Status -->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="Active" {{ isset($employee) && $employee->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ isset($employee) && $employee->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-4 text-right">
                    <button type="submit" class="btn btn-success">
                        {{ isset($employee) ? 'Update Employee' : 'Add Employee' }}
                    </button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
