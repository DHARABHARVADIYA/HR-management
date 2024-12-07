@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5>Job Posting Details</h5>
        </div>
        <div class="card-body">
            <h6><strong>Title:</strong> {{ $jobPosting->title }}</h6>
            <p><strong>Description:</strong></p>
            <p>{{ $jobPosting->description }}</p>

            <p><strong>Department:</strong> 
                {{ $jobPosting->department ? $jobPosting->department->department_name : 'No Department' }}
            </p>
            <p><strong>Location:</strong> {{ $jobPosting->location }}</p>
            <p><strong>Employment Type:</strong> {{ $jobPosting->employment_type }}</p>
            <p><strong>Salary Range:</strong> {{ $jobPosting->salary_range }}</p>
            <p><strong>Skills Required:</strong> {{ $jobPosting->skills_required }}</p>
            <p><strong>Experience Required:</strong> {{ $jobPosting->experience_required }} years</p>
            <p><strong>Posted Date:</strong> {{ $jobPosting->posted_date }}</p>
            <p><strong>Application Deadline:</strong> {{ $jobPosting->application_deadline }}</p>
            <p><strong>Status:</strong> {{ $jobPosting->status }}</p>

            <a href="{{ route('job_postings.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
