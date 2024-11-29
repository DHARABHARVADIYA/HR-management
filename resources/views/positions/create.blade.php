@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5>Create Position</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('positions.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="position_name">Position Name</label>
                    <input type="text" name="position_name" class="form-control" id="position_name" required>
                </div>
                <div class="form-group">
                    <label for="position_details">Position Details</label>
                    <textarea name="position_details" class="form-control" id="position_details" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status" required>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save Position</button>
                <a href="{{ route('positions.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
