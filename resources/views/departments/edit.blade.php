@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Edit Department</h4>
        </div>
        <div class="card-body">
            @if(auth()->user()->permissions->contains('name', 'Update Department'))
                
                <form action="{{ route('departments.update', $department) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="department_name">Department Name</label>
                        <input type="text" class="form-control" id="department_name" name="department_name" 
                               value="{{ $department->department_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="active" {{ $department->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $department->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Department</button>
                    <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            @else
               
                <div class="alert alert-danger">
                    <strong>Unauthorized:</strong> You do not have permission to edit this department.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
