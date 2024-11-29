@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4"> <!-- Use .container-fluid for full-width -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Position List</h5>
            <a href="{{ route('positions.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Add Position
            </a>
        </div>
        <div class="card-body">
            <!-- Responsive table wrapper -->
            <div class="table-responsive">
                <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th>SR</th>
                            <th>Position Name</th>
                            <th>Position Details</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($positions as $index => $position)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $position->position_name }}</td>
                                <td>{{ $position->position_details }}</td>
                                <td>
                                    <span class="badge badge-{{ $position->status == 'Active' ? 'success' : 'danger' }}">
                                        {{ $position->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('positions.edit', $position) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('positions.destroy', $position) }}" method="POST" style="display: inline;">
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
        </div>
    </div>
</div>
@endsection
