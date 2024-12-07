@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Add New Department</h5>
            @if(auth()->user()->permissions->contains('name', 'Create Department'))
                <a href="{{ route('departments.store') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Add Department
                </a>
            @else
            <a href="{{ route('unauthorized') }}" class="btn btn-danger">
                    <i class="fas fa-ban"></i> Unauthorized
                </a>
            @endif
        </div>
        
        <div class="card-body">
            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="department_name">Department Name</label>
                    <input type="text" class="form-control" id="department_name" name="department_name" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save Department</button>
                <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
