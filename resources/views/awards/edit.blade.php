@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Award</h5>
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

            <form action="{{ route('awards.update', $award->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="award_name">Award Name</label>
                    <input type="text" name="award_name" id="award_name" class="form-control" value="{{ old('award_name', $award->award_name) }}" required>
                </div>

                <div class="form-group">
                    <label for="award_description">Award Description</label>
                    <textarea name="award_description" id="award_description" class="form-control" required>{{ old('award_description', $award->award_description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="gift_item">Gift Item</label>
                    <input type="text" name="gift_item" id="gift_item" class="form-control" value="{{ old('gift_item', $award->gift_item) }}" required>
                </div>

                <div class="form-group">
                    <label for="award_date">Award Date</label>
                    <input type="date" name="award_date" id="award_date" class="form-control" value="{{ old('award_date', $award->award_date) }}" required>
                </div>

                <div class="form-group">
                    <label for="employee_id">Employee</label>
                    <select name="employee_id" id="employee_id" class="form-control" required>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}" {{ $employee->id == $award->employee_id ? 'selected' : '' }}>
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Award</button>
            </form>
        </div>
    </div>
</div>
@endsection
