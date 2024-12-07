@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Edit Job Posting</h1>
    <form method="POST" action="{{ route('job_postings.update', $jobPosting->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Job Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $jobPosting->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Job Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ $jobPosting->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="department_id">Department</label>
            <select name="department_id" id="department_id" class="form-control" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" 
                        {{ $jobPosting->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->department_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $jobPosting->location }}" required>
        </div>

        <div class="form-group">
            <label for="employment_type">Employment Type</label>
            <select name="employment_type" id="employment_type" class="form-control" required>
                <option value="Full-time" {{ $jobPosting->employment_type == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                <option value="Part-time" {{ $jobPosting->employment_type == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                <option value="Contract" {{ $jobPosting->employment_type == 'Contract' ? 'selected' : '' }}>Contract</option>
                <option value="Temporary" {{ $jobPosting->employment_type == 'Temporary' ? 'selected' : '' }}>Temporary</option>
            </select>
        </div>

        <div class="form-group">
            <label for="salary_range">Salary Range (Optional)</label>
            <input type="text" name="salary_range" id="salary_range" class="form-control" value="{{ $jobPosting->salary_range }}">
        </div>

        <div class="form-group">
            <label for="skills_required">Skills Required</label>
            <input type="text" name="skills_required" id="skills_required" class="form-control" value="{{ $jobPosting->skills_required }}" required>
        </div>

        <div class="form-group">
            <label for="experience_required">Experience Required (in years)</label>
            <input type="number" name="experience_required" id="experience_required" class="form-control" value="{{ $jobPosting->experience_required }}" required>
        </div>

        <div class="form-group">
            <label for="posted_date">Posted Date</label>
            <input type="date" name="posted_date" id="posted_date" class="form-control" value="{{ $jobPosting->posted_date }}" required>
        </div>

        <div class="form-group">
            <label for="application_deadline">Application Deadline</label>
            <input type="date" name="application_deadline" id="application_deadline" class="form-control" value="{{ $jobPosting->application_deadline }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Open" {{ $jobPosting->status == 'Open' ? 'selected' : '' }}>Open</option>
                <option value="Closed" {{ $jobPosting->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                <option value="Paused" {{ $jobPosting->status == 'Paused' ? 'selected' : '' }}>Paused</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Job Posting</button>
    </form>
</div>
@endsection
