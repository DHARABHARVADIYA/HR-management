@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Job Postings</h1>
    <a href="{{ route('job_postings.create') }}" class="btn btn-primary mb-3">Create New Job Posting</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Department</th>
                <th>Location</th>
                <th>Employment Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobPostings as $jobPosting)
                <tr>
                    <td>{{ $jobPosting->title }}</td>
                    <td>{{ $jobPosting->location }}</td>
                    <td>{{ $jobPosting->employment_type }}</td>
                    <td>{{ $jobPosting->department ? $jobPosting->department->department_name : 'No Department' }}</td>
                    <td>{{ $jobPosting->status }}</td>
                    <td>
                        <a href="{{ route('job_postings.show', $jobPosting->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('job_postings.edit', $jobPosting->id) }}" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('job_postings.destroy', $jobPosting->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection