@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Salary List</h5>
                <div>
                    <a href="{{ route('salary.index') }}" class="btn btn-success" style="height: 42px;">
                        <i class="fas fa-plus"></i> Add Salary
                    </a>
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
                    <input type="text" id="search" class="form-control" placeholder="Search Salaries"
                        onkeyup="filterTable()" style="height: 42px; width: 200px;">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered w-100" id="salaryTable">
                    <thead>
                        <tr>
                            <th>SR</th>
                            <th>Employee Name</th>
                            <th>Month</th>
                            <th>Calculated Salary</th>
                            <!-- <th>Status</th> -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salaries as $index => $salary)
                            <tr>
                                <td>{{ $salaries->firstItem() + $index }}</td>
                                <td>{{ $salary->employee->name }}</td>
                                <td>
    {{ \Carbon\Carbon::parse($salary->month . '-01')->format('F') }}
</td>


                                <td>{{ number_format($salary->calculated_salary, 2) }}</td>
                                <!-- <td>
                                    <span class="badge badge-{{ $salary->status == 'Paid' ? 'success' : 'danger' }}">
                                        {{ $salary->status }}
                                    </span>
                                </td> -->
                                <td>
                                    <!-- View Button -->
                                    <a href="{{ route('salary.viewDetails', $salary) }}" class="btn btn-sm btn-outline-info">
                                        <i class="fas fa-eye"></i> 
                                    </a>
                                  

                                    <a href="{{ route('salary.edit', $salary) }}" class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('salary.destroy', $salary) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('salary.downloadPDF', $salary) }}" class="btn btn-primary">
    <i class="fas fa-file-pdf"></i> Download PDF
</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <p class="text-muted">
                    Showing {{ $salaries->firstItem() }} to {{ $salaries->lastItem() }} of {{ $salaries->total() }} entries
                </p>
                {{ $salaries->appends(['entries' => request('entries')])->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    function filterTable() {
        let searchValue = document.getElementById('search').value.toLowerCase();
        let table = document.getElementById('salaryTable');
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
