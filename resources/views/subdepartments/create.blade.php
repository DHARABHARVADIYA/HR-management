@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Add New Subdepartment</h5>
        </div>
        <div class="card-body">
           
            @if(auth()->user()->permissions->contains('name', 'Create Subdepartment'))
                <form action="{{ route('subdepartments.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="subdepartment_name">Subdepartment Name</label>
                        <input type="text" name="subdepartment_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="department_id">Department</label>
                        <select name="department_id" class="form-control" required>
                            <option value="">Select Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Subdepartment</button>
                    <a href="{{ route('subdepartments.index') }}" class="btn btn-secondary">Cancel</a> 
                </form>
            @else
                <div class="alert alert-danger">
                    <p>You do not have permission to create a subdepartment.</p>
                    <a href="{{ route('unauthorized') }}" class="btn btn-danger">Go to Unauthorized Page</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
