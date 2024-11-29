

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Add New Department</h5>
            <?php if(auth()->user()->permissions->contains('name', 'Create Department')): ?>
                <!-- User has permission to create a department -->
                <a href="#" class="btn btn-success disabled">
                    <i class="fas fa-plus"></i> Add Department
                </a>
            <?php else: ?>
                <!-- User does not have permission -->
                <a href="#" class="btn btn-danger disabled">
                    <i class="fas fa-ban"></i> Unauthorized
                </a>
            <?php endif; ?>
        </div>

        <div class="card-body">
            <?php if(auth()->user()->permissions->contains('name', 'Create Department')): ?>
                <form action="<?php echo e(route('departments.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="department_name">Department Name</label>
                        <input type="text" class="form-control" id="department_name" name="department_name" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Department</button>
                    <a href="<?php echo e(route('departments.index')); ?>" class="btn btn-secondary">Cancel</a>
                </form>
            <?php else: ?>
                <div class="alert alert-danger">
                    <strong>Unauthorized:</strong> You do not have permission to create a department.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\hrmanagementwithroles\company\resources\views/departments/create.blade.php ENDPATH**/ ?>