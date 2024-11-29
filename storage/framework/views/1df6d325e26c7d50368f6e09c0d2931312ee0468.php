

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Add New Subdepartment</h5>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('subdepartments.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="subdepartment_name">Subdepartment Name</label>
                    <input type="text" name="subdepartment_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="department_id">Department</label>
                    <select name="department_id" class="form-control" required>
                        <option value="">Select Department</option>
                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($department->id); ?>"><?php echo e($department->department_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save Subdepartment</button>
                <a href="<?php echo e(route('subdepartments.index')); ?>" class="btn btn-secondary">Cancel</a> 
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\company\resources\views/subdepartments/create.blade.php ENDPATH**/ ?>