<?php
$route = Request::route()->getName();
$breadcrumb = [];

switch($route) {
    case "reportbank.import":
        $breadcrumb[] = "Banks Report";
        $breadcrumb[] = "Import";
        break;
    case "reportbank.viewlist":
        $breadcrumb[] = "Banks Report";
        break;
    case "bankmanage.add":
        $breadcrumb[] = "Banks Management";
        $breadcrumb[] = "Add";
        break;
    case "bankmanage.edit":
        $breadcrumb[] = "Banks Management";
        $breadcrumb[] = "Edit";
        break;
    case "user.changePassword":
        $breadcrumb[] = "Change Password";
        break;
    case "usermanage.add":
        $breadcrumb[] = "Users Management";
        $breadcrumb[] = "Add";
        break;
    case "usermanage.edit":
        $breadcrumb[] = "Users Management";
        $breadcrumb[] = "Edit";
        break;
    case "usermanage.list":
        $breadcrumb[] = "Users Management";
        $breadcrumb[] = "List";
        break;
    default:
        $breadcrumb[] = "Dashboard";
        break;
}
?>
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo e(url('/dashboard')); ?>">Admin</a>
            </li>
            <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="breadcrumb-item <?php echo e($index+1 == count($breadcrumb) ? 'active' : ''); ?>"><?php echo e($value); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div><?php /**PATH /var/www/mastermind/resources/views/admin/components/breadcrumb.blade.php ENDPATH**/ ?>