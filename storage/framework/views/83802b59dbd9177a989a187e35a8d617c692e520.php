

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header">
            <h3 class="mb-0">Update Profile</h3>
        </div>
        <div class="card-body">
            <!-- Display Success Message -->
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <!-- Display Error Messages -->
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('profile.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!-- Name -->
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name', auth()->user()->name)); ?>" required>
                    </div>
                </div>

                <!-- Email -->
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email', auth()->user()->email)); ?>" required>
                    </div>
                </div>

                <!-- Current Password -->
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Enter current password" required>
                    </div>
                </div>

                <!-- New Password -->
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Enter new password">
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" placeholder="Confirm new password">
                    </div>
                </div>

                <!-- Submit and Cancel buttons -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-save fa-sm"></i> Update Profile
                    </button>
                    <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-warning">
                        <i class="fas fa-times-circle fa-sm"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\hrmanagementwithroles\company\resources\views/profile.blade.php ENDPATH**/ ?>