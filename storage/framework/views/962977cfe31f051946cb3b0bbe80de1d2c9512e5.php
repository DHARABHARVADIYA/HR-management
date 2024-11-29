

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>User List</h2>

        <!-- Display Success Message if Any -->
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Add User Button -->
        <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary mb-3">Add User</a>

        <!-- Users Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td>
                            <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- <span class="badge badge-info"><?php echo e($role->name); ?></span> -->
                                <a href="<?php echo e(route('users.roles', $user->id)); ?>" class="btn btn-info btn-sm">Roles</a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-warning">Edit</a>
                            <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\hrmanagementwithroles\company\resources\views/users/index.blade.php ENDPATH**/ ?>