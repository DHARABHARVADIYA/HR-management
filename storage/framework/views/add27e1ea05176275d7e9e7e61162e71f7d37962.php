

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Assign Permissions to <?php echo e($user->name); ?></h2>

        <!-- Display Success Message if Any -->
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('users.updateRoles', $user->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="permissions">Select Permissions for Department</label>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Permission</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="permissions[]" value="<?php echo e($permission->id); ?>"
                                           <?php if(in_array($permission->id, $userPermissions)): ?> checked <?php endif; ?>>
                                </td>
                                <td><?php echo e($permission->name); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-primary">Update Permissions</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\hrmanagementwithroles\company\resources\views/users/editRoles.blade.php ENDPATH**/ ?>