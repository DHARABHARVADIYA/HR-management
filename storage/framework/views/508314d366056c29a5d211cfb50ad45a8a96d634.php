

<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Department List</h5>
            
            <!-- Check if the user has permission to create a department -->
            <?php if(auth()->user()->permissions->contains('name', 'Create Department')): ?>
            <a href="<?php echo e(route('departments.create')); ?>" class="btn btn-success">
                    <i class="fas fa-plus"></i> Add Department
                </a>
            <?php else: ?>
            <a href="<?php echo e(route('unauthorized')); ?>" class="btn btn-danger">
                    <i class="fas fa-ban"></i>ADD departments
                </a>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="departmentTable" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Department Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($department->department_name); ?></td>
                                <td>
                                    <span class="badge badge-<?php echo e($department->status == 'Active' ? 'success' : 'danger'); ?>">
                                        <?php echo e($department->status); ?>

                                    </span>
                                </td>
                                <td>
    <!-- Edit Button -->
    <?php if(auth()->user()->permissions->contains('name', 'Update Department')): ?>
        <a href="<?php echo e(route('departments.edit', $department)); ?>" class="btn btn-sm btn-warning">
            <i class="fas fa-edit"></i>
        </a>
    <?php endif; ?>

    <!-- Delete Button -->
    <?php if(auth()->user()->permissions->contains('name', 'Delete Department')): ?>
        <form action="<?php echo e(route('departments.destroy', $department)); ?>" method="POST" style="display: inline;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    <?php endif; ?>
</td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add DataTables and Export buttons CSS -->
<link rel="stylesheet" href="<?php echo e(asset('admin/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('admin/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css')); ?>">

<!-- jQuery -->
<script src="<?php echo e(asset('admin/js/jquery.min.js')); ?>"></script>

<!-- DataTables Core JS -->
<script src="<?php echo e(asset('admin/plugins/bootstrap-datatable/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js')); ?>"></script>

<!-- Export Buttons Dependencies -->
<script src="<?php echo e(asset('admin/plugins/bootstrap-datatable/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/bootstrap-datatable/js/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/bootstrap-datatable/js/buttons.html5.min.js')); ?>"></script>

<!-- Initialize DataTables -->
<script>
$(document).ready(function () {
    $('#departmentTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { extend: 'csvHtml5', text: 'Export CSV', className: 'btn btn-sm btn-primary' },
            { extend: 'excelHtml5', text: 'Export Excel', className: 'btn btn-sm btn-success' }
        ],
        responsive: true
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\hrmanagementwithroles\company\resources\views/departments/index.blade.php ENDPATH**/ ?>