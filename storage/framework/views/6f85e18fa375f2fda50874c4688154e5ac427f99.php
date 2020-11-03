<?php $__env->startSection("title-admin", "Water Fall Chart"); ?>

<?php $__env->startSection('content-admin'); ?>
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header>
            <h1 class="h3 display">Water Fall Chart</h1>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="col-md-6 mb-2">
                        <label>Filter Time: </label>
                        <select id="selectTimeChart" class="js-states form-control w-50">
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>
                        </select>
                    </div>
                    <div style="position: relative; width: 50%; height:30%">
                        <canvas id="myChart" width="600px" height="200px"></canvas>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/mastermind/resources/views/admin/pages/banks/waterFallChart.blade.php ENDPATH**/ ?>