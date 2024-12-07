@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-0">
    <div class="row">
       
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <!-- Stats Section (Total Employee, Present, Absent, Leave) -->
                    <div class="col-md-3 text-center">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="mdi mdi-account-multiple-outline" style="font-size: 30px; color: green;"></i>
                            </div>
                            <h5>Total Employee</h5>
                            <p class="display-4">{{ $totalEmployees }}</p>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="mdi mdi-fingerprint" style="font-size: 30px; color: green;"></i>
                            </div>
                            <h5>Today Presents</h5>
                            <p class="display-4">{{ $todayPresents }}</p>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="mdi mdi-account-off" style="font-size: 30px; color: green;"></i>
                            </div>
                            <h5>Today Absents</h5>
                            <p class="display-4">{{ $todayAbsents }}</p>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="mdi mdi-account-clock" style="font-size: 30px; color: green;"></i>
                            </div>
                            <h5>Today Leave</h5>
                            <p class="display-4">{{ $todayLeave }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notice and Employee Award List Sections -->
        <div class="col-lg-4 d-flex">
            <div class="card flex-grow-1">
                <div class="card-header" style="background-color: #f8f9fa;">
                    <h5 style="font-weight: bold;">Notice</h5>
                </div>
                <div class="card-body">
                    @foreach ($notices as $notice)
                        <div class="notice-item d-flex justify-content-between align-items-center mb-3">
                            <div class="notice-text">
                                <h6>{{ $notice->notice_type }}</h6>
                                <p>{{ $notice->notice_description }}</p>
                            </div>
                            <div class="notice-meta d-flex align-items-center">
                                <!-- Updated icon color to green -->
                                <i class="mdi mdi-calendar-text mr-2" style="color: green;"></i>
                                <span>{{ $notice->notice_date }}</span>
                                <!-- Updated star icon color to black -->
                                <button class="btn btn-sm btn-outline-warning ml-3">
                                    <i class="mdi mdi-star-outline" style="color: black;"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                    <a href="{{ route('notices.index') }}" class="btn btn-link" style="color: #007bff; font-weight: bold;">See More</a>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-12 d-flex">
            <div class="card flex-grow-1">
                <div class="card-header" style="background-color: #f8f9fa;">
                    <h5 style="font-weight: bold;">Employee Award List</h5>
                    <a href="{{ route('awards.index') }}" class="btn btn-float-left" >Award list</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead style="background-color: #f8f9fa;">
                            <tr>
                                <th>Sl.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Department Name</th>
                                <th>Award Name</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($awards as $index => $award)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><img src="{{ asset('images/' . $award->employee->image) }}" alt="Employee Image" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover;"></td>
                                    <td>{{ $award->employee->name }}</td>
                                    <td>{{ $award->employee->department->department_name }}</td>
                                    <td>{{ $award->award_name }}</td>
                                    <td>{{ $award->award_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- <a href="{{ route('awards.index') }}" class="btn btn-link" style="color: #007bff; font-weight: bold;">See More</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

