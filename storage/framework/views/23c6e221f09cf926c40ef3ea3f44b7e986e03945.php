<?php $__env->startSection("title-admin", "Dashboard"); ?>

<?php $__env->startSection('content-admin'); ?>
<section>
    <div class="container-full">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="row mt-4 ml-3 mb-3">
                        <div class="ml-3">
                            <div class="col-xs-12 font-weight-bold">
                                <p class="font-16">BQI : So sánh MB và top ngân hàng đối thủ</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <form id="form" name="form" class="form-inline">
                                <div class="form-group">
                                    <label for="startDate" class="mr-2">From:</label>
                                    <input id="startDate" name="startDate" type="text" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="endDate" class="mr-2 ml-2">To:</label>
                                    <input id="endDate" name="endDate" type="text" class="form-control" />
                                </div>
                                <div class="form-group select-bank-column mr-2">
                                    <label for="endDate" class="mr-2 ml-2">Banks:</label>
                                    <select id="selectBankColumn" placeholder="" class="js-states form-control" name="banks[]" multiple="multiple">
                                        <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($item->id); ?>><?php echo e($item->id); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="button" id="selectDataColumn" class="btn btn-primary">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div id="bankColumnChart" class="col-xs-12 col-sm-12 col-md-12 columnChart">
                        </div>
                    </div>

                    <div class="ml-3 mt-4">
                        <div class="col-xs-12 font-weight-bold">
                            <p class="font-16">BQI theo ngày: So sánh MB và top ngân hàng đối thủ</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3 mb-2">
                            <div class="select-time d-flex flex-row align-items-center">
                                <label class="ml-3 mr-2">Select Time: </label>
                                <select id="selectTimeChart4" class="js-states form-control w-50">
                                    <?php $__currentLoopData = $time_chart4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($item); ?>><?php echo e(\Carbon\Carbon::parse($item)->format("d-m-Y")); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 mb-2">
                            <select id="selectBankChart4" placeholder="" class="js-states form-control" name="banks[]" multiple="multiple">
                                <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value=<?php echo e($item->id); ?>><?php echo e($item->id); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-1 mb-2">
                            <button type="button" id="selectDataChart4" class="btn btn-primary">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="w-100 mr-3 ml-3">
                            <div id="simpleColumnChart" class="waterfall"></div>
                        </div>
                    </div>
                    
                    <div class="ml-3 mt-4">
                        <div class="col-xs-12 font-weight-bold">
                            <p class="font-16">BQI theo tháng: So sánh MB và top ngân hàng đối thủ</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3 mb-2">
                            <div class="select-time  ml-3 ">
                                <select id="selectTimeTable" class="js-states form-control">
                                    <?php $__currentLoopData = $time_chart2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($item); ?>><?php echo e(\Carbon\Carbon::parse($item)->format("m-Y")); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6  col-md-6 mb-2">
                            <select id="selectBankTable" placeholder="" class="js-states form-control" name="banks[]" multiple="multiple">
                                <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value=<?php echo e($item->id); ?>><?php echo e($item->id); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-1 mb-2">
                            <button type="button" id="selectDataTbale" class="btn btn-primary">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <div class="ml-3 mr-3">
                        <table id="table-bqi-bank" class="table table-striped order-column hover pt-3 pb-3">
                            <thead>
                                <tr>
                                    <th class="text-center">Tên ngân hàng</th>
                                    <th class="text-center">BQI</th>
                                    
                                    <th class="text-center" id="levelOfInterest1">Độ quan tâm so với tháng</th> 
                                    <th class="text-center" id="levelOfInterest3">Độ quan tâm so với 3 tháng trước</th> 
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
<script src="<?php echo e(asset('js/bankBQITable.js')); ?>"></script>
<script src="<?php echo e(asset('js/bankColumnChart.js')); ?>"></script>
<script src="<?php echo e(asset('js/simpleColumnChart.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/mastermind/resources/views/admin/pages/dashboards/test.blade.php ENDPATH**/ ?>