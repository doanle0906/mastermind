<?php $__env->startSection("title-admin", "Report Search"); ?>

<?php $__env->startSection('content-admin'); ?>
<section>
    <div class="container-full">
        <div class="row">
            <div class="col-md-12">
                <div class="row mt-4">
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3 mb-2">
                        <div class="select-time ml-3 ">
                            <select id="selectTimeWordCloudAndBarChart" class="js-states form-control">
                                <?php $__currentLoopData = $time_chart3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value=<?php echo e($item); ?>><?php echo e(\Carbon\Carbon::parse($item)->format('m-Y')); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 mb-2">
                        <select id="selectBankWordCloudAndBarChart" placeholder="" class="js-states form-control" name="banks[]" multiple="multiple">
                            <?php $__currentLoopData = $list_bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value=<?php echo e($item->id); ?>><?php echo e($item->id); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-1 mb-2">
                        <button type="button" id="btnBankWordCloudAndBarChart" class="btn btn-primary">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div id="wordCloudAndBarChart" class="col-xs-12 col-sm-12 col-md-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script-admin'); ?>
<script src="<?php echo e(asset('js/bankWordCloudAndBarChart.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/mastermind/resources/views/admin/pages/dashboards/report.blade.php ENDPATH**/ ?>