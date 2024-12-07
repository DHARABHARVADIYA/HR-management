@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Sub department List</h5>
                <div>
                    @if(auth()->user()->permissions->contains('name', 'Create Subdepartment'))
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#subdepartmentModal" style="height: 42px;">
                            <i class="fas fa-plus"></i> Add Subdepartment
                        </button>
                    @else
                        <a href="{{ route('unauthorized') }}" class="btn btn-danger" style="height: 42px;">
                            <i class="fas fa-ban"></i> Add Subdepartment
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                <div class="d-flex align-items-center mb-2 mb-sm-0">
                    <label for="entries" class="mr-2 mb-0">Show</label>
                    <select id="entries" class="form-control d-inline-block" style="width: 80px;" onchange="updateEntries()">
                        <option value="5" {{ request('entries') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('entries') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('entries') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="ml-2">entries</span>
                </div>

                <div class="d-flex align-items-center mb-2 mb-sm-0">
                    <button class="btn btn-success mx-1">
                        <i class="fas fa-file-csv"></i> CSV
                    </button>
                    <button class="btn btn-success mx-1">
                        <i class="fas fa-file-excel"></i> Excel
                    </button>
                </div>

                <div class="d-flex align-items-center">
                    <label for="search" class="mr-2 mb-0">Search</label> 
                    <input type="text" id="search" class="form-control" placeholder="Search Subdepartment"
                        onkeyup="filterTable()" style="height: 42px; width: 200px;">
                </div>
            </div>

            <!-- Responsive Table Wrapper -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered w-100" id="subdepartmentTable">
                    <thead>
                        <tr>
                            <th>SR</th>
                            <th>Subdepartment Name</th>
                            <th>Department Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subdepartments as $index => $subdepartment)
                            <tr>
                                <td>{{ $subdepartments->firstItem() + $index }}</td>
                                <td>{{ $subdepartment->subdepartment_name }}</td>
                                <td>{{ $subdepartment->department->department_name }}</td>
                                <td>
                                    <span class="badge badge-{{ $subdepartment->status == 'Active' ? 'success' : 'danger' }}">
                                        {{ $subdepartment->status }}
                                    </span>
                                </td>
                                <td>
                                    @if(auth()->user()->permissions->contains('name', 'Update Subdepartment'))
                                        <a href="{{ route('subdepartments.edit', $subdepartment) }}" class="btn btn-sm btn-outline-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endif

                                    @if(auth()->user()->permissions->contains('name', 'Delete Subdepartment'))
                                        <form action="{{ route('subdepartments.destroy', $subdepartment) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <p class="text-muted">
                    Showing {{ $subdepartments->firstItem() }} to {{ $subdepartments->lastItem() }} of {{ $subdepartments->total() }} entries
                </p>
                {{ $subdepartments->appends(['entries' => request('entries')])->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal for Adding Subdepartment -->
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
                    <div class="form-group">
                        <label for="subdepartment_name">Subdepartment Name</label>
                        <input type="text" class="form-control" id="subdepartment_name" name="subdepartment_name" required>
                    </div>
                    <div class="form-group">
                        <label for="department_id">Department</label>
                        <select class="form-control" id="department_id" name="department_id" required>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
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

<script>
    function filterTable() {
        let searchValue = document.getElementById('search').value.toLowerCase();
        let table = document.getElementById('subdepartmentTable');
        let rows = table.getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) {
            let cells = rows[i].getElementsByTagName('td');
            let match = false;

            for (let j = 0; j < cells.length; j++) {
                if (cells[j].innerText.toLowerCase().includes(searchValue)) {
                    match = true;
                    break;
                }
            }

            if (match) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }
</script>

@endsection
