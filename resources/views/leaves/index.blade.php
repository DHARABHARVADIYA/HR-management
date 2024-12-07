@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Leave Requests</h5>
                <a href="{{ route('leaves.create') }}" class="btn btn-success" style="height: 42px;">
                    <i class="fas fa-plus"></i> Create Leave
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                <!-- Entries Selection -->
                <div class="d-flex align-items-center mb-2 mb-sm-0">
                    <label for="entries" class="mr-2 mb-0">Show</label>
                    <select id="entries" class="form-control d-inline-block" style="width: 80px;"
                        onchange="updateEntries()">
                        <option value="5" {{ request('entries') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('entries') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('entries') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="ml-2">entries</span>
                </div>

                <!-- Export Buttons -->
                <div class="d-flex align-items-center mb-2 mb-sm-0">
                    <button class="btn btn-success mx-1">
                        <i class="fas fa-file-csv"></i> CSV
                    </button>
                    <button class="btn btn-success mx-1">
                        <i class="fas fa-file-excel"></i> Excel
                    </button>
                </div>

                <!-- Search Bar -->
                <div class="d-flex align-items-center">
                    <label for="search" class="mr-2 mb-0">Search</label>
                    <input type="text" id="search" class="form-control" placeholder="Search Leave"
                        onkeyup="filterTable()" style="height: 42px; width: 200px;">
                </div>
            </div>

            <!-- Responsive Table Wrapper -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered w-100" id="leaveTable">
                    <thead>
                        <tr>
                            <th>Leave ID</th>
                            <th>Employee Name</th>
                            <th>Leave Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Duration (Days)</th>
                            <th>Reason</th>
                            <th>Approval Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaves as $leave)
                            <tr>
                                <td>{{ $leave->id }}</td>
                                <td>{{ $leave->employee->name }}</td>
                                <td>{{ $leave->leave_type }}</td>
                                <td>{{ $leave->start_date }}</td>
                                <td>{{ $leave->end_date }}</td>
                                <td>{{ $leave->leave_duration }}</td>
                                <td>{{ $leave->reason ?? 'N/A' }}</td>
                                <td>
                                    <div class="d-flex">
                                        @if(auth()->check() && auth()->user()->roles->contains('name', 'admin'))


                                            <form action="{{ route('leaves.update-status', $leave->id) }}" method="POST"
                                                style="margin-right: 5px;">
                                                @csrf
                                                <button type="submit" name="status" value="Approved"
                                                    class="btn btn-sm btn-success {{ $leave->approval_status === 'Approved' ? 'disabled' : '' }}">
                                                    Approve
                                                </button>
                                            </form>


                                            <form action="{{ route('leaves.update-status', $leave->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" name="status" value="Rejected"
                                                    class="btn btn-sm btn-danger {{ $leave->approval_status === 'Rejected' ? 'disabled' : '' }}">
                                                    Reject
                                                </button>
                                            </form>

                                        @endif
                                    </div>


                                    <span
                                        class="badge badge-{{ $leave->approval_status == 'Pending' ? 'warning' : ($leave->approval_status == 'Approved' ? 'success' : 'danger') }}">
                                        {{ $leave->approval_status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <p class="text-muted">
                    Showing {{ $leaves->firstItem() }} to {{ $leaves->lastItem() }} of {{ $leaves->total() }} entries
                </p>
                {{ $leaves->appends(['entries' => request('entries')])->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    function filterTable() {
        let searchValue = document.getElementById('search').value.toLowerCase();
        let table = document.getElementById('leaveTable');
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

            rows[i].style.display = match ? '' : 'none';
        }
    }
</script>
@endsection