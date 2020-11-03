<?php $__env->startSection("title-admin", "Add Bank"); ?>

<?php $__env->startSection('content-admin'); ?>
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header>
            <h1 class="h3 display">Add Bank</h1>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <?php if($errors->any()): ?>
                        <div class="form-group-material invalid-feedback error-flash">
                            <?php echo e(implode(' ', $errors->all(':message'))); ?>

                        </div>
                        <?php endif; ?>
                        <form class="form-horizontal form-validate mt-4" enctype="multipart/form-data" method="post" action="<?php echo e(route('bankmanage.create')); ?>" >
                            <?php echo csrf_field(); ?>
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-2 form-control-label d-flex align-items-center">Select Bank Type</label>
                                <div class="col-sm-5 mb-3">
                                    <select name="bankType" class="form-control" required data-msg="Please select bank type"
                                        value="<?php echo e(!empty(old('bankType')) ? old('bankType') : ''); ?>">
                                        <option value="">Select Bank Type</option>
                                        <?php $__currentLoopData = config("constants.TYPE_BANK"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($index); ?>"
                                            <?php echo e(old('bankType') == $index ? 'selected="selected"' : ''); ?>><?php echo e($item); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-2 form-control-label d-flex align-items-center">Bank Identifier</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" required data-msg="Please enter bank identifier"
                                        name="identifier" value="<?php echo e(!empty(old('identifier')) ? old('identifier') : ''); ?>"
                                        placeholder="Enter bank identifier" />
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-2 form-control-label d-flex align-items-center">Bank Logo</label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control-file" required data-msg="Please choose bank logo"
                                        name="bankLogo" value="<?php echo e(!empty(old('bankLogo')) ? old('bankLogo') : ''); ?>" accept=".jpg,.jpeg,.png"/>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-2 form-control-label d-flex align-items-center">Bank Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" required data-msg="Please enter bank name"
                                        name="bankName" value="<?php echo e(!empty(old('bankName')) ? old('bankName') : ''); ?>"
                                        placeholder="Enter bank name" />
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-5 offset-sm-2">
                                    <a class="btn btn-secondary" href="<?php echo e(route('bankmanage.list')); ?>">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/mastermind/resources/views/admin/pages/banks/add.blade.php ENDPATH**/ ?>