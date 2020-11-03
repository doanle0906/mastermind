<?php $__env->startSection("title-admin", "Add User"); ?>

<?php $__env->startSection('content-admin'); ?>
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header>
            <h1 class="h3 display">Add User</h1>
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
                            <form class="form-horizontal form-validate mt-4" method="post" action='<?php echo e(route("usermanage.postAdd")); ?>'>
                            <?php echo csrf_field(); ?>
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-1 form-control-label d-flex align-items-center">Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" required data-msg="Please enter name"
                                        name="name" value="<?php echo e(!empty(old('name')) ? old('name') : ''); ?>"
                                        placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-1 form-control-label d-flex align-items-center">Email</label>
                                <div class="col-sm-5">
                                    <input type="email" class="form-control" required 
                                        data-msg-required="Please enter email"
                                        data-msg-email="Please enter a valid email"
                                        name="email" value="<?php echo e(!empty(old('email')) ? old('email') : ''); ?>"
                                        placeholder="Enter email" />
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-1 form-control-label d-flex align-items-center">Password</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" required
                                        data-msg="Please enter password" name="password"
                                        value="<?php echo e(!empty(old('password')) ? old('password') : ''); ?>"
                                        placeholder="Enter password" />
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-6 offset-sm-2">
                                <a class="btn btn-secondary" href="<?php echo e(route('usermanage.list')); ?>">Cancel</a>
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
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/mastermind/resources/views/admin/pages/users/add.blade.php ENDPATH**/ ?>