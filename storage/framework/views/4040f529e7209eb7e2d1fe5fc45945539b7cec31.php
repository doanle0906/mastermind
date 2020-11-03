<div id="alert" class="d-none">
        <?php if($message = Session::get('success')): ?>
            <div id="alert-success" class="success">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>
    
        <?php if($message = Session::get('error')): ?>
            <div id="alert-danger" class="error">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>
    
        <?php if($message = Session::get('warning')): ?>
            <div id="alert-warning" class="warning">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>
    
        <?php if($message = Session::get('info')): ?>
            <div id="alert-info" class="info">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>
    
        <?php if($message = Session::get('danger')): ?>
            <div id="alert-danger" class="error">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div id="alert-danger" class="error">
                Please check the form below for errors
            </div>
        <?php endif; ?>
    </div><?php /**PATH /var/www/mastermind/resources/views/admin/components/notification.blade.php ENDPATH**/ ?>