<?php $__env->startSection("title-admin", "List User"); ?>

<?php $__env->startSection('content-admin'); ?>
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header>
            <h1 class="h3 display">List User</h1>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-table">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="search">
                                        <input id="input-search" type="text" placeholder="Search..." class="form-control" />
                                        <button class="btn btn-search d-flex align-items-center justify-content-center">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6  d-flex justify-content-end align-items-center">
                                    <a class="btn btn-primary d-flex justify-content-end align-items-center" href="<?php echo e(route("usermanage.add")); ?>">
                                        <i class="fa fa-plus mr-1"></i>Add</a>
                                </div>
                            </div>
                        </div>
                        <table id="table-users" class="table table-striped order-column hover pt-3 pb-3" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th class="action">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script-admin'); ?>
<script>
    window.API_USER_LIST = "<?php echo e(route("api.usermanage.getList")); ?>";
    window.API_DELETE_USER = "<?php echo e(route("api.usermanage.delete", ["id_user"])); ?>";
</script>
<script src="<?php echo e(asset("js/userDataTable.js")); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/mastermind/resources/views/admin/pages/users/list.blade.php ENDPATH**/ ?>