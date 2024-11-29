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
        <img src="<?php echo e(asset('admin/images/logo.png')); ?>" class="logo-icon" alt="logo icon">
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

        <!-- Customer -->
        <li class="nav-item">
            <a class="nav-link" href="customers">
                <i class="mdi mdi-account-plus menu-icon"></i>
                <span class="menu-title">Customer</span>
            </a>
        </li>

        <!-- Department Dropdown -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#departmentDropdown" aria-expanded="false">
                <i class="bi bi-bank"></i>
                <span class="menu-title">Department</span>
                <i class="bi bi-chevron-right arrow float-right"></i>
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
                <i class="bi bi-chevron-right arrow float-right"></i>
            </a>
            <ul class="collapse" id="employeeDropdown">
                <li class="nav-item">
                    <a class="nav-link" href="positions">
                        <i class="bi bi-dot"></i> Position
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="subdepartments">
                        <i class="bi bi-dot"></i> Employee
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="users">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">users</span>
            </a>
        </li>
    </ul>
</div>


<?php /**PATH C:\xampp\htdocs\laravel\company\resources\views/layouts/inc/admin/sidebar.blade.php ENDPATH**/ ?>