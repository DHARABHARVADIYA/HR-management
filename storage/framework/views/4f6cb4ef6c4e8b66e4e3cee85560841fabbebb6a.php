

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header">
            <h3 class="mb-0">Edit Customer</h3>
        </div>
        <div class="card-body">
            <!-- Display validation errors if any -->
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Edit Customer Form -->
            <form action="<?php echo e(route('customers.update', $customer)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" name="customer_name" id="customer_name" class="form-control" value="<?php echo e(old('customer_name', $customer->customer_name)); ?>" placeholder="Enter Customer Name">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="gstin" class="form-label">GSTIN</label>
                        <input type="text" name="gstin" id="gstin" class="form-control" value="<?php echo e(old('gstin', $customer->gstin)); ?>" placeholder="Enter GSTIN">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pancard_no" class="form-label">PAN Card No</label>
                        <input type="text" name="pancard_no" id="pancard_no" class="form-control" value="<?php echo e(old('pancard_no', $customer->pancard_no)); ?>" placeholder="Enter PAN Card No">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email', $customer->email)); ?>" placeholder="Enter Email">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="mobile_no" class="form-label">Mobile No.</label>
                        <input type="text" name="mobile_no" id="mobile_no" class="form-control" value="<?php echo e(old('mobile_no', $customer->mobile_no)); ?>" placeholder="Enter Mobile Number">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" class="form-control" rows="2" placeholder="Enter Address"><?php echo e(old('address', $customer->address)); ?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" id="city" class="form-control" value="<?php echo e(old('city', $customer->city)); ?>" placeholder="Enter City">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" name="state" id="state" class="form-control" value="<?php echo e(old('state', $customer->state)); ?>" placeholder="Enter State">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pincode" class="form-label">Pincode</label>
                        <input type="text" name="pincode" id="pincode" class="form-control" value="<?php echo e(old('pincode', $customer->pincode)); ?>" placeholder="Enter Pincode">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="contact_person" class="form-label">Contact Person</label>
                        <input type="text" name="contact_person" id="contact_person" class="form-control" value="<?php echo e(old('contact_person', $customer->contact_person)); ?>" placeholder="Enter Contact Person">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control" style="width: 100%; height: 42px">
                            <option value="active" <?php echo e(old('status', $customer->status) == 'active' ? 'selected' : ''); ?>>Active</option>
                            <option value="inactive" <?php echo e(old('status', $customer->status) == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                        </select>
                    </div>
                </div>

                <!-- Submit and Cancel buttons -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-save fa-sm"></i> Update
                    </button>
                    <a href="<?php echo e(route('customers.index')); ?>" class="btn btn-warning">
                        <i class="fas fa-times-circle fa-sm"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\company\resources\views/customers/edit.blade.php ENDPATH**/ ?>