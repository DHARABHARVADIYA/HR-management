

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Edit Department</h4>
        </div>
        <div class="card-body">
            <?php if(auth()->user()->permissions->contains('name', 'Edit Department')): ?>
                <!-- Show the form if the user has permission -->
                <form action="<?php echo e(route('departments.update', $department)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label for="department_name">Department Name</label>
                        <input type="text" class="form-control" id="department_name" name="department_name" 
                               value="<?php echo e($department->department_name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="active" <?php echo e($department->status == 'active' ? 'selected' : ''); ?>>Active</option>
                            <option value="inactive" <?php echo e($department->status == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Department</button>
                    <a href="<?php echo e(route('departments.index')); ?>" class="btn btn-secondary">Cancel</a>
                </form>
            <?php else: ?>
                <!-- Show unauthorized message if the user lacks permission -->
                <div class="alert alert-danger">
                    <strong>Unauthorized:</strong> You do not have permission to edit this department.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\hrmanagementwithroles\company\resources\views/departments/edit.blade.php ENDPATH**/ ?>