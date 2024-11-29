

<?php $__env->startSection('content'); ?>
<h1>Employee List</h1>
<a href="<?php echo e(route('admin.employees.create')); ?>" class="btn btn-primary">Add New Employee</a>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile No</th>
            <th>Aadhar Card</th>
            <th>Pan Card</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($employee->name); ?></td>
            <td><?php echo e($employee->email); ?></td>
            <td><?php echo e($employee->mobile_no); ?></td>
            <td><img src="<?php echo e(Storage::url($employee->aadhar_card_1)); ?>" width="50" height="50"></td>
            <td><img src="<?php echo e(Storage::url($employee->pan_card_1)); ?>" width="50" height="50"></td>
            <td>
                <a href="<?php echo e(route('admin.employees.edit', $employee->id)); ?>">Edit</a>
                <form action="<?php echo e(route('admin.employees.destroy', $employee->id)); ?>" method="POST" style="display:inline;">
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\company\resources\views/admin/employees/index.blade.php ENDPATH**/ ?>