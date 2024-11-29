<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <link rel="stylesheet" href="<?php echo e(asset('admin/css/pace.min.css')); ?>">

  
    <!--favicon-->
    <link rel="icon" href="<?php echo e(asset('admin/images/favicon.ico')); ?>" type="image/x-icon">
    <!-- simplebar CSS-->
    <link href="<?php echo e(asset('admin/plugins/simplebar/css/simplebar.css')); ?>" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="<?php echo e(asset('admin/css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="<?php echo e(asset('admin/css/animate.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="<?php echo e(asset('admin/css/icons.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="<?php echo e(asset('admin/plugins/metismenu/css/metisMenu.min.css')); ?>" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="<?php echo e(asset('admin/css/app-style.css')); ?>" rel="stylesheet" />
    <!-- skins CSS-->
    <link href="<?php echo e(asset('admin/css/skins.css')); ?>" rel="stylesheet" />
 <!-- font CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.materialdesignicons.com/6.4.95/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Pace CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/themes/blue/pace-theme-minimal.min.css">
<!-- Pace JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/pace.min.js"></script>

    <?php echo \Livewire\Livewire::styles(); ?>

</head>

<body>
  <?php echo $__env->make('layouts.inc.admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    <div id="wrapper">
        <?php echo $__env->make('layouts.inc.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

        <div class="content-wrapper">
      
            <div class="container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>


    <script src="<?php echo e(asset('admin/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/bootstrap.min.js')); ?>"></script>

    <!-- simplebar js -->
    <script src="<?php echo e(asset('admin/plugins/simplebar/js/simplebar.js')); ?>"></script>
    <!-- sidebar-menu js -->
    <script src="<?php echo e(asset('admin/plugins/metismenu/js/metisMenu.min.js')); ?>"></script>

    <!-- Custom scripts -->
    <script src="<?php echo e(asset('admin/js/app-script.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/pace.min.js')); ?>"></script>

    <?php echo \Livewire\Livewire::scripts(); ?>

</body>

</html>
<?php /**PATH D:\hrmanagementwithroles\company\resources\views/layouts/admin.blade.php ENDPATH**/ ?>