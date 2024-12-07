@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Create Job Posting</h1>
    <form method="POST" action="{{ route('job_postings.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">Job Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Job Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="department_id">Department</label>
            <select name="department_id" id="department_id" class="form-control" required>
                <option value="" disabled selected>Select Department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="employment_type">Employment Type</label>
            <select name="employment_type" id="employment_type" class="form-control" required>
                <option value="" disabled selected>Select Employment Type</option>
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-time</option>
                <option value="Contract">Contract</option>
                <option value="Temporary">Temporary</option>
            </select>
        </div>

        <div class="form-group">
            <label for="salary_range">Salary Range (Optional)</label>
            <input type="text" name="salary_range" id="salary_range" class="form-control">
        </div>

        <div class="form-group">
            <label for="skills_required">Skills Required</label>
            <input type="text" name="skills_required" id="skills_required" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="experience_required">Experience Required (in years)</label>
            <input type="number" name="experience_required" id="experience_required" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="posted_date">Posted Date</label>
            <input type="date" name="posted_date" id="posted_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="application_deadline">Application Deadline</label>
            <input type="date" name="application_deadline" id="application_deadline" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="" disabled selected>Select Status</option>
                <option value="Open">Open</option>
                <option value="Closed">Closed</option>
                <option value="Paused">Paused</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Job Posting</button>
    </form>
</div>
@endsection
