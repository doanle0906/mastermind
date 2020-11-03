<?php $__env->startSection("title"); ?>
    <?php echo $__env->yieldContent("title-admin"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
    <?php echo $__env->make("admin.components.notification", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make("admin.components.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page">
        <?php echo $__env->make("admin.components.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make("admin.components.breadcrumb", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- navbar-->
        <?php echo $__env->yieldContent("content-admin"); ?>
        <?php echo $__env->make("admin.components.modal-custom", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make("admin.components.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
    <?php echo $__env->yieldContent("script-admin"); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/mastermind/resources/views/admin/admin.blade.php ENDPATH**/ ?>