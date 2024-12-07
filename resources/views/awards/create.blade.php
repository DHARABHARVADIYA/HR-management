@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Create New Award</h5>
        </div>

        <div class="card-body">
            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('awards.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="award_name">Award Name</label>
                    <input type="text" name="award_name" id="award_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="award_description">Award Description</label>
                    <textarea name="award_description" id="award_description" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="gift_item">Gift Item</label>
                    <input type="text" name="gift_item" id="gift_item" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="award_date">Award Date</label>
                    <input type="date" name="award_date" id="award_date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="employee_id">Employee</label>
                    <select name="employee_id" id="employee_id" class="form-control" required>
                        <option value="">Select Employee</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit Award</button>
            </form>
        </div>
    </div>
</div>
@endsection
