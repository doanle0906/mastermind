<?php $__env->startSection("title-admin", "Import Banks Information"); ?>

<?php $__env->startSection('content-admin'); ?>
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <?php if($errors->any()): ?>
                        <div class="form-group-material invalid-feedback error-flash">
                            <?php echo e(implode(' ', $errors->all(':message'))); ?>

                        </div>
                        <?php endif; ?>
                        <div class="alert alert-danger alert-import alert-dismissible fade show" role="alert">
                        <span id="error-import">You should check in on some of those fields below.</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>  
                        <form class="form-horizontal form-validate import-banks" method="POST" enctype="multipart/form-data" action="<?php echo e(url('/banks/import')); ?>>
                            <?php echo csrf_field(); ?>
                            <div class="zone  d-flex align-items-center flex-column justify-content-center">
                                <div id="dropZ" class="h-100" ondragover="handleDragOver(event)" ondrop="handleFileSelect(event)">
                                    <div class="import d-block">
                                        <div class="w-100 mt-5">
                                            <div class="d-flex justify-content-around">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="typeImportBqi" name="type-import" class="custom-control-input" value="bqi" checked="checked" />
                                                    <label class="custom-control-label" for="typeImportBqi">Import BQI</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="typeImportChart" name="type-import" class="custom-control-input" value="chart" />
                                                    <label class="custom-control-label" for="typeImportChart">Import Chart</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="import-file">
                                            <i class="fa fa-cloud-upload upload-icon mt-3"></i>
                                            <div class="drag-drop-caption mt-2">Drag and drop your file here</div>                  
                                            <span class="indicator">OR</span>
                                            <div class="selectFile">       
                                                <label for="file">Select file</label>                   
                                                <input type="file" name="files[]" id="file" accept=".xls, .xlsx, .xlsm">
                                                <button type="button" class="btn btn-light" id="btn-upload">Import file</button>
                                            </div>
                                            <span class="mb-2">File size limit : 20 MB</span>
                                        </div>
                                    </div>
                                    <div class="d-none importing">
                                        <div class="d-flex flex-row justify-content-center align-items-center">
                                            <div class="dot-loader"></div>
                                            <div class="dot-loader"></div>
                                            <div class="dot-loader"></div>
                                            <div class="dot-loader"></div>
                                        </div>
                                        <strong class="text-importing">Importing</strong>
                                    </div>
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
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/mastermind/resources/views/admin/pages/banks/import.blade.php ENDPATH**/ ?>