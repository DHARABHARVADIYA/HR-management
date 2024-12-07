@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Department List</h5>
                <div>
                    @if(auth()->user()->permissions->contains('name', 'Create Department'))
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#departmentModal"
                            style="height: 42px;">
                            <i class="fas fa-plus"></i> Add Department
                        </button>
                    @else
                        <a href="{{ route('unauthorized') }}" class="btn btn-danger" style="height: 42px;">
                            <i class="fas fa-ban"></i> Add Department
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                <div class="d-flex align-items-center mb-2 mb-sm-0">
                    <label for="entries" class="mr-2 mb-0">Show</label>
                    <select id="entries" class="form-control d-inline-block" style="width: 70px; height: 30px;"
                        onchange="updateEntries()">
                        <option value="5" {{ request('entries') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('entries') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('entries') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="ml-2">entries</span>
                </div>

                <div class="d-flex align-items-center mb-2 mb-sm-0">
                    <button class="btn btn-success mx-1"
                        style="height: 42px; padding: 0 20px; font-size: 14px; display: flex; align-items: center;">
                        <i class="fas fa-file-csv" style="font-size: 18px; margin-right: 8px;"></i> CSV
                    </button>
                    <button class="btn btn-success mx-1"
                        style="height: 42px; padding: 0 20px; font-size: 14px; display: flex; align-items: center;">
                        <i class="fas fa-file-excel" style="font-size: 18px; margin-right: 8px;"></i> Excel
                    </button>
                </div>



                <div class="d-flex align-items-center">
                    <label for="search" class="mr-2 mb-0">Search</label>
                    <input type="text" id="search" class="form-control" placeholder="Search Department"
                        onkeyup="filterTable()" style="height: 42px; width: 200px;">
                </div>
            </div>

           
            <div class="table-responsive">
                <table class="table table-striped table-bordered w-100" id="departmentTable">
                    <thead>
                        <tr>
                            <th>SR</th>
                            <th>Department Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $index => $department)
                            <tr>
                                <td>{{ $departments->firstItem() + $index }}</td>
                                <td>{{ $department->department_name }}</td>
                                <td>
                                    <span class="badge badge-{{ $department->status == 'Active' ? 'success' : 'success' }}">
                                        {{ $department->status }}
                                    </span>
                                </td>
                                <td>
                                    @if(auth()->user()->permissions->contains('name', 'Update Department'))
                                        <a href="{{ route('departments.edit', $department) }}"
                                            class="btn btn-sm btn-outline-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endif

                                    @if(auth()->user()->permissions->contains('name', 'Delete Department'))
                                        <form action="{{ route('departments.destroy', $department) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure?')">
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
                    Showing {{ $departments->firstItem() }} to {{ $departments->lastItem() }} of
                    {{ $departments->total() }} entries
                </p>
                {{ $departments->appends(['entries' => request('entries')])->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal for Adding Department -->
<div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="departmentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="departmentModalLabel">Add Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="department_name">Department Name</label>
                        <input type="text" class="form-control" id="department_name" name="department_name" required>
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
                    <button type="submit" class="btn btn-primary">Save Department</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function filterTable() {
        let searchValue = document.getElementById('search').value.toLowerCase();
        let table = document.getElementById('departmentTable');
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
<script>
    function updateEntries() {
        const entries = document.getElementById('entries').value;
        const url = new URL(window.location.href);
        url.searchParams.set('entries', entries);
        window.location.href = url.toString();
    }
</script>

@endsection