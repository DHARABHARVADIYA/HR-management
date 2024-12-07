@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Requirements</h5>
                <div>
                    @if(auth()->check() && auth()->user()->hasRole('admin'))
                    <a href="{{ route('requirements.create') }}" class="btn btn-success" style="height: 42px;">
                        <i class="fas fa-plus"></i> Create Requirement
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
                    <input type="text" id="search" class="form-control" placeholder="Search Requirement"
                        onkeyup="filterTable()" style="height: 42px; width: 200px;">
                </div>
            </div>

            
            <div class="table-responsive">
                <table class="table table-striped table-bordered w-100" id="requirementTable">
                    <thead>
                        <tr>
                            <th>SR</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Deadline</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($requirements as $index => $requirement)
                            <tr>
                                <td>{{ $requirements->firstItem() + $index }}</td>
                                <td>{{ $requirement->title }}</td>
                                <td>{{ $requirement->description }}</td>
                                <td>{{ $requirement->priority }}</td>
                                <td>{{ $requirement->deadline }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No requirements found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <p class="text-muted">
                    Showing {{ $requirements->firstItem() }} to {{ $requirements->lastItem() }} of {{ $requirements->total() }} entries
                </p>
                {{ $requirements->appends(['entries' => request('entries')])->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    function filterTable() {
        let searchValue = document.getElementById('search').value.toLowerCase();
        let table = document.getElementById('requirementTable');
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
