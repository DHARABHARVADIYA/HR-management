

<?php $__env->startSection('content'); ?>
<h1>Department List</h1>
<a href="<?php echo e(route('admin.departments.create')); ?>" class="btn btn-primary">Add New Department</a>

<table class="table">
    <thead>
        <tr>
            <th>Department Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($department->department_name); ?></td>
            <td><?php echo e(ucfirst($department->status)); ?></td>
            <td>
                <a href="<?php echo e(route('admin.departments.edit', $department->id)); ?>" class="btn btn-warning">Edit</a>
                <form action="<?php echo e(route('admin.departments.destroy', $department->id)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\company\resources\views/admin/departments/index.blade.php ENDPATH**/ ?>