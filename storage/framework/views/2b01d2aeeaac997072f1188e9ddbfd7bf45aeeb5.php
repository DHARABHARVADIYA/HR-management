<!-- <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex justify-content-center">
    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
      <a class="navbar-brand brand-logo" href="index.html">
        <img src="<?php echo e(asset('assets/images/logo2.png')); ?>" alt="logo">


      </a>
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-sort-variant"></span>
      </button>
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <ul class="navbar-nav mr-lg-4 w-100">
      <li class="nav-item nav-search d-none d-lg-block w-100">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="search">
              <i class="mdi mdi-magnify"></i>
            </span>
          </div>
          <input type="text" class="form-control" placeholder="Search now" aria-label="search"
            aria-describedby="search">
        </div>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">


      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
          <img src="images/faces/face5.jpg" alt="profile" />
          <span class="nav-profile-name"><?php echo e(Auth::user()->name); ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>">
            <i class="mdi mdi-settings text-primary"></i> Profile
          </a>



          <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <i class="mdi mdi-logout text-primary"></i> <?php echo e(__('Logout')); ?>

          </a>

          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
            <?php echo csrf_field(); ?>
          </form>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
      data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav> -->

<header class="topbar-nav">
    <nav id="header-setting" class="navbar navbar-expand navbar-light fixed-top">

        <!-- Toggle Menu Icon -->
        <div class="toggle-menu">
            <i class="zmdi zmdi-menu"></i>
        </div>

        <!-- Navbar Items (Right side) -->
        <ul class="navbar-nav align-items-center ml-auto">
            <!-- User Profile Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-toggle="dropdown" href="javascript:void();">
                    <!-- User Avatar -->
                    <span class="user-profile">
                        <img src="<?php echo e(asset('admin/images/use_icon.png')); ?>" class="img-circle" alt="user avatar" style="width: 40px; height: 40px;">
                    </span>
                </a>
                
                <!-- Dropdown Menu -->
                <ul class="dropdown-menu dropdown-menu-right">
                    <!-- User Details -->
                    <li class="dropdown-item user-details">
                        <a href="javascript:void();">
                            <div class="media">
                                <!-- Avatar Image -->
                                <div class="avatar">
                                    <img class="align-self-start mr-3" src="<?php echo e(asset('admin/images/use_icon.png')); ?>" alt="user avatar" style="width: 40px; height: 40px;">
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0"><?php echo e(Auth::user()->name); ?></h6> <!-- Assuming you're displaying the logged-in user's name -->
                                </div>
                            </div>
                        </a>
                    </li>

                    <!-- Profile Link -->
                    <li>
                        <a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>">
                            <i class="mdi mdi-settings text-primary"></i> Profile
                        </a>
                    </li>

                    <!-- Logout Link -->
                    <li>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout text-primary"></i> Logout
                        </a>
                        <!-- Logout Form -->
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>

<?php /**PATH C:\xampp\htdocs\laravel\company\resources\views/layouts/inc/admin/navbar.blade.php ENDPATH**/ ?>