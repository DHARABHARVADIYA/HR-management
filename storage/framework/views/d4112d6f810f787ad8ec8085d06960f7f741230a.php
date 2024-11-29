

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Add New Department</h5>
        </div>
        <div class="card-body">
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
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\company\resources\views/departments/create.blade.php ENDPATH**/ ?>