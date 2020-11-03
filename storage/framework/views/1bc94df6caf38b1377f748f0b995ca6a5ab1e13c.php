<?php $__env->startSection("title-admin", "Change Password"); ?>

<?php $__env->startSection('content-admin'); ?>
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header>
            <h1 class="h3 display">Change Password</h1>
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
                        <form id="formChangePassword" class="form-horizontal form-validate mt-4" method="post" action="<?php echo e(route("user.postChangePassword")); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-2 form-control-label d-flex align-items-center">Current Password</label>
                                <div class="col-sm-5">
                                    <input 
                                        type="password" 
                                        class="form-control" 
                                        data-rule-required="true"
                                        data-msg-required="Please enter current password" 
                                        name="currentPassword"
                                        value="<?php echo e(!empty(old('currentPassword')) ? old('currentPassword') : ''); ?>"
                                        placeholder="Enter current password" />
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-2 form-control-label d-flex align-items-center">New Password</label>
                                <div class="col-sm-5">
                                    <input
                                        type="password" 
                                        class="form-control" 
                                        id="newPassword"
                                        name="newPassword"
                                        data-rule-required="true"
                                        data-msg-required="Please enter new password"
                                        value="<?php echo e(!empty(old('newPassword')) ? old('newPassword') : ''); ?>"
                                        placeholder="Enter new password" />
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-2 form-control-label d-flex align-items-center">Confirm Password</label>
                                <div class="col-sm-5">
                                    <input
                                        type="password"
                                        class="form-control" 
                                        data-rule-required="true"
                                        data-rule-equalTo="#newPassword"
                                        data-msg-required="Please confirm new password" 
                                        data-msg-equalTo="Please enter the same password again." 
                                        name="rePassword"
                                        value="<?php echo e(!empty(old('rePassword')) ? old('rePassword') : ''); ?>"
                                        placeholder="Confirm new password"
                                    />
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-5 offset-sm-2">
                                    <a class="btn btn-secondary"  href="<?php echo e(URL::previous()); ?>">Cancel</a>
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
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/mastermind/resources/views/admin/pages/users/changePassword.blade.php ENDPATH**/ ?>