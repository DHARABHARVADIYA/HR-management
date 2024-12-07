<!-- <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="dashboard">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="customers">
            <i class="mdi mdi-account-plus menu-icon"></i>
                <span class="menu-title">Customer</span>
            </a>
        </li>



    </ul>
</nav> -->




<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">

    <div class="brand-logo">
        <img src="{{ asset('admin/images/logo.png') }}" class="logo-icon" alt="logo icon">
        <div class="close-btn"><i class="zmdi zmdi-close"></i></div>
    </div>

    <ul class="metismenu" id="menu">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="dashboard">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
    <a class="nav-link" href="{{ route('companies.index') }}">
        <i class="mdi mdi-office-building menu-icon"></i>
        <span class="menu-title">Company</span>
    </a>
</li>

        <!-- <li class="nav-item">
            <a class="nav-link" href="users">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">users</span>
            </a>
        </li> -->

        <!-- Customer -->
        <!-- <li class="nav-item">
            <a class="nav-link" href="customers">
                <i class="mdi mdi-account-plus menu-icon"></i>
                <span class="menu-title">Customer</span>
            </a>
        </li> -->

        <!-- Department Dropdown -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#departmentDropdown" aria-expanded="false">
                <i class="bi bi-bank"></i>
                <span class="menu-title">Department</span>
                <!-- <i class="bi bi-chevron-right arrow float-right"></i> -->
            </a>
            <ul class="collapse" id="departmentDropdown">
                <li class="nav-item">
                    <a class="nav-link" href="departments">
                        <i class="bi bi-dot"></i> Department
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="subdepartments">
                        <i class="bi bi-dot"></i> Sub-Department
                    </a>
                </li>
            </ul>
        </li>

        <!-- Employee Dropdown -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#employeeDropdown" aria-expanded="false">
                <i class="bi bi-person"></i>
                <span class="menu-title">Employee</span>
                <!-- <i class="bi bi-chevron-right arrow float-right"></i> -->
            </a>
            <ul class="collapse" id="employeeDropdown">
                <li class="nav-item">
                    <a class="nav-link" href="positions">
                        <i class="bi bi-dot"></i> Position
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="employees">
                        <i class="bi bi-dot"></i> Employee
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="leaves">
                <i class="mdi mdi-airplane menu-icon"></i>
                <span class="menu-title">Leave</span>
            </a>
        </li>


        <li class="nav-item">
            @if(auth()->check() && auth()->user()->hasRole('admin'))
                <a class="nav-link" href="users">
                    <i class="fa fa-users menu-icon"></i>
                    <span class="menu-title">Users</span>
                </a>
            @endif
        </li>

        <li class="nav-item">
            <a class="nav-link" href="attendance">
                <i class="mdi mdi-account-plus menu-icon"></i>
                <span class="menu-title">Attendance</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="salary/list">
                <i class="mdi mdi-account-plus menu-icon"></i>
                <span class="menu-title">salary</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="awards">
                <i class="mdi mdi-trophy menu-icon"></i>
                <span class="menu-title">Awards</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('notices.index') }}">
                <i class="mdi mdi-bell-ring menu-icon"></i>
                <span class="menu-title">Notice board</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#requirementsDropdown" aria-expanded="false"
                aria-controls="requirementsDropdown">
                <i class="mdi mdi-clipboard-text-outline menu-icon"></i>
                <span class="menu-title">Requirements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="requirementsDropdown">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('job_postings.index') }}">View Requirements</a>
                    </li>
                    <li class="nav-item">
                        @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('user2')))
                            <a class="nav-link" href="{{ route('job_postings.create') }}">Create Requirement</a>
                        @endif
                    </li>



                </ul>
            </div>
        </li>


    </ul>
</div>