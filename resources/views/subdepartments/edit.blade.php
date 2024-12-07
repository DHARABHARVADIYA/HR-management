@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Subdepartment</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('subdepartments.update', $subdepartment) }}" method="POST">
                @csrf
                @method('PUT')
                
              
                <div class="form-group">
                    <label for="subdepartment_name">Subdepartment Name</label>
                    <input type="text" name="subdepartment_name" class="form-control" value="{{ old('subdepartment_name', $subdepartment->subdepartment_name) }}" required>
                </div>
                
              
                <div class="form-group">
                    <label for="department_id">Department</label>
                    <select name="department_id" class="form-control" required>
                        <option value="">Select Department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" 
                                {{ $department->id == old('department_id', $subdepartment->department_id) ? 'selected' : '' }}>
                                {{ $department->department_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
              
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="Active" {{ old('status', $subdepartment->status) == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ old('status', $subdepartment->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Update Subdepartment</button>
                <a href="{{ route('subdepartments.index') }}" class="btn btn-secondary">Cancel</a> 
            </form>
        </div>
    </div>
</div>
@endsection
