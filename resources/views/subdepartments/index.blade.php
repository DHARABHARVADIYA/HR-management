@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Subdepartments List</h5>
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#subdepartmentModal">
                <i class="fas fa-plus"></i> Add Subdepartment
            </button>
        </div>
        <div class="card-body">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>SR</th>
                        <th>Subdepartment Name</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subdepartments as $index => $subdepartment)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $subdepartment->subdepartment_name }}</td>
                            <td>{{ $subdepartment->department->department_name }}</td>
                            <td>
                                <span class="badge badge-{{ $subdepartment->status == 'Active' ? 'success' : 'danger' }}">
                                    {{ $subdepartment->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('subdepartments.edit', $subdepartment) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('subdepartments.destroy', $subdepartment) }}" method="POST" style="display: inline;">
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

<!-- Modal for Add Subdepartment -->
<div class="modal fade" id="subdepartmentModal" tabindex="-1" role="dialog" aria-labelledby="subdepartmentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="subdepartmentModalLabel">Add Subdepartment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('subdepartments.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <!-- Subdepartment Name -->
          <div class="form-group">
            <label for="subdepartment_name">Subdepartment Name</label>
            <input type="text" class="form-control" id="subdepartment_name" name="subdepartment_name" required>
          </div>
          
          <!-- Department -->
          <div class="form-group">
            <label for="department_id">Department</label>
            <select class="form-control" id="department_id" name="department_id" required>
              @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
              @endforeach
            </select>
          </div>

          <!-- Status -->
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Subdepartment</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
