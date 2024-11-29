

<?php $__env->startSection('content'); ?>
<h1>Add New Department</h1>

<form action="<?php echo e(route('admin.departments.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="department_name">Department Name</label>
        <input type="text" name="department_name" class="form-control" id="department_name" value="<?php echo e(old('department_name')); ?>" required>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" id="status" required>
            <option value="active" <?php echo e(old('status') == 'active' ? 'selected' : ''); ?>>Active</option>
            <option value="inactive" <?php echo e(old('status') == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Save Department</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\company\resources\views/admin/departments/create.blade.php ENDPATH**/ ?>