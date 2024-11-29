

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header">
            <h3 class="mb-0">Add Customer</h3>
        </div>
        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Customer Add Form -->
            <form action="<?php echo e(route('customers.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <!-- Customer Name -->
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="customer_name" class="form-label custom-label">Customer Name</label>
                        <input type="text" name="customer_name" id="customer_name" class="form-control"
                            value="<?php echo e(old('customer_name')); ?>" placeholder="Enter Customer Name" required>
                    </div>
                </div>

                <!-- GSTIN and PAN Card No -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="gstin" class="form-label custom-label">GSTIN</label>
                        <input type="text" name="gstin" id="gstin" class="form-control" value="<?php echo e(old('gstin')); ?>"
                            placeholder="Enter GSTIN" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pancard_no" class="form-label custom-label">PAN Card No</label>
                        <input type="text" name="pancard_no" id="pancard_no" class="form-control"
                            value="<?php echo e(old('pancard_no')); ?>" placeholder="Enter PAN Card No" required>
                    </div>
                </div>

                <!-- Email and Mobile -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label custom-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email')); ?>"
                            placeholder="Enter Email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="mobile_no" class="form-label custom-label">Mobile No.</label>
                        <input type="text" name="mobile_no" id="mobile_no" class="form-control"
                            value="<?php echo e(old('mobile_no')); ?>" placeholder="Enter Mobile Number" required>
                    </div>
                </div>

                <!-- Address and City -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="address" class="form-label custom-label">Address</label>
                        <textarea name="address" id="address" class="form-control" rows="2"
                            placeholder="Enter Address" required><?php echo e(old('address')); ?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="city" class="form-label custom-label">City</label>
                        <input type="text" name="city" id="city" class="form-control" value="<?php echo e(old('city')); ?>"
                            placeholder="Enter City" required>
                    </div>
                </div>

                <!-- State, Pincode, and Contact Person -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="state" class="form-label custom-label">State</label>
                        <input type="text" name="state" id="state" class="form-control" value="<?php echo e(old('state')); ?>"
                            placeholder="Enter State" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pincode" class="form-label custom-label">Pincode</label>
                        <input type="text" name="pincode" id="pincode" class="form-control" value="<?php echo e(old('pincode')); ?>"
                            placeholder="Enter Pincode" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="contact_person" class="form-label custom-label">Contact Person</label>
                        <input type="text" name="contact_person" id="contact_person" class="form-control"
                            value="<?php echo e(old('contact_person')); ?>" placeholder="Enter Contact Person" required>
                    </div>

                    <!-- Status Field -->
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label custom-label">Status</label>
                        <select name="status" id="status" class="form-control" >
                            <option value="active" <?php echo e(old('status') == 'active' ? 'selected' : ''); ?>>Active</option>
                            <option value="inactive" <?php echo e(old('status') == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                        </select>
                    </div>
                </div>

                <!-- Submit and Cancel buttons -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-plus-circle fa-sm"></i> Submit
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\company\resources\views/customers/create.blade.php ENDPATH**/ ?>