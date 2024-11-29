

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <!-- Card Header -->
    <div class="card">
        <div class="card-header ">
            <h3 class="mb-0">Customer List</h3>
        </div>

       
        <div class="card-body">
            
            <a href="<?php echo e(route('customers.create')); ?>" class="btn btn-danger mb-3">+ Add Customer</a>

           
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>sr No.</th>
                        <th>Customer Name</th>
                        <th>City</th>
                        <th>GST IN</th>
                        <th>PAN Card No</th>
                        <th>Mobile No</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($customer->customer_name); ?></td>
                            <td><?php echo e($customer->city); ?></td>
                            <td><?php echo e($customer->gstin); ?></td>
                            <td><?php echo e($customer->pancard_no); ?></td>
                            <td><?php echo e($customer->mobile_no); ?></td>
                            <td><?php echo e($customer->email); ?></td>
                            <td>

                                <a href="<?php echo e(route('customers.edit', $customer)); ?>" class="btn btn-primary btn-md">
                                    <i class="fas fa-edit "></i> 
                                </a>

                                <form action="<?php echo e(route('customers.destroy', $customer)); ?>" method="POST" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-md" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"style="color:red"></i> 
                                    </button>
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <div>
                    Showing <?php echo e($customers->firstItem()); ?> to <?php echo e($customers->lastItem()); ?> of <?php echo e($customers->total()); ?> entries
                </div>
                <div>
                    <?php echo e($customers->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\hrmanagementwithroles\company\resources\views/customers/index.blade.php ENDPATH**/ ?>