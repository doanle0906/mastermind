<?php $__env->startSection("title-admin", "List Bank"); ?>

<?php $__env->startSection('content-admin'); ?>
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header>
            <h1 class="h3 display">List Bank</h1>
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
                                <div class="col-sm-12 col-md-6 d-flex justify-content-end">
                                    <a class="btn btn-primary" href="<?php echo e(route('bankmanage.add')); ?>"><i
                                            class="fa fa-plus mr-1"></i>Add</a>
                                </div>
                            </div>
                        </div>
                        <table id="table-banks" class="table table-striped order-column hover pt-3 pb-3" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Bank Id</th>
                                    <th>Bank Name</th>
                                    <th>Type</th>
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
    window.API_BANK_LIST = "<?php echo e(route('api.bankmanage.getList')); ?>";
    window.API_DELETE_BANK = "<?php echo e(route('api.bankmanage.delete', ['id_bank'])); ?>";
</script>
<script src="<?php echo e(asset('js/bankDataTable.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/mastermind/resources/views/admin/pages/banks/list.blade.php ENDPATH**/ ?>