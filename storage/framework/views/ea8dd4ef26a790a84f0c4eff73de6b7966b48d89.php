

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Subdepartment</h5>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('subdepartments.update', $subdepartment)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                
                <!-- Subdepartment Name -->
                <div class="form-group">
                    <label for="subdepartment_name">Subdepartment Name</label>
                    <input type="text" name="subdepartment_name" class="form-control" value="<?php echo e(old('subdepartment_name', $subdepartment->subdepartment_name)); ?>" required>
                </div>
                
                <!-- Department -->
                <div class="form-group">
                    <label for="department_id">Department</label>
                    <select name="department_id" class="form-control" required>
                        <option value="">Select Department</option>
                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($department->id); ?>" 
                                <?php echo e($department->id == old('department_id', $subdepartment->department_id) ? 'selected' : ''); ?>>
                                <?php echo e($department->department_name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                
                <!-- Status -->
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="Active" <?php echo e(old('status', $subdepartment->status) == 'Active' ? 'selected' : ''); ?>>Active</option>
                        <option value="Inactive" <?php echo e(old('status', $subdepartment->status) == 'Inactive' ? 'selected' : ''); ?>>Inactive</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Update Subdepartment</button>
                <a href="<?php echo e(route('subdepartments.index')); ?>" class="btn btn-secondary">Cancel</a> 
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\company\resources\views/subdepartments/edit.blade.php ENDPATH**/ ?>