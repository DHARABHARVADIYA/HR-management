

<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-4"> <!-- Use .container-fluid for full-width -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Position List</h5>
            <a href="<?php echo e(route('positions.create')); ?>" class="btn btn-success">
                <i class="fas fa-plus"></i> Add Position
            </a>
        </div>
        <div class="card-body">
            <!-- Responsive table wrapper -->
            <div class="table-responsive">
                <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th>SR</th>
                            <th>Position Name</th>
                            <th>Position Details</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($position->position_name); ?></td>
                                <td><?php echo e($position->position_details); ?></td>
                                <td>
                                    <span class="badge badge-<?php echo e($position->status == 'Active' ? 'success' : 'danger'); ?>">
                                        <?php echo e($position->status); ?>

                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('positions.edit', $position)); ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('positions.destroy', $position)); ?>" method="POST" style="display: inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\company\resources\views/positions/index.blade.php ENDPATH**/ ?>