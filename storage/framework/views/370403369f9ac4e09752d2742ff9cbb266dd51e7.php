<?php
$route = Request::route()->getName();
$currentMenu = '';

switch($route) {
    case "bankmanage.list":
        $currentMenu = "banks";
        break;
    case "usermanage.list":
        $currentMenu = "users";
        break;
    case "dashboard.index":
        $currentMenu = "dashboard";
        break;
    case "dashboard.test":
        $currentMenu = "test";
        break;
    case "reportbank.import":
        $currentMenu = "imports";
        break;
    case "report-search.index":
        $currentMenu = "report-search";
        break;
    default:
        break;
}
?>
<!-- Side Navbar -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center">
                
                <strong class="text-logo">BQI</strong>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo">
                <a href="<?php echo e(url('/dashboard')); ?>" class="brand-small text-center">
                    
                    <strong class="text-primary">B</strong>
                </a>
            </div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li class="<?php echo e($currentMenu == 'dashboard' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('dashboard.index')); ?>">
                        <i class="fa fa-tachometer" aria-hidden="true"></i><span>DashBoard</span>
                    </a>
                </li>
                <li class="<?php echo e($currentMenu == 'report-search' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('report-search.index')); ?>">
                        <i class="fa fa-flag" aria-hidden="true"></i><span>Report Search</span>
                    </a>
                </li>
                <?php
                    if(Auth::user()->role === "admin") {
                ?>
                    <li class="<?php echo e($currentMenu == 'test' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('dashboard.test')); ?>">
                            <i class="fa fa-tachometer" aria-hidden="true"></i><span>Test</span>
                        </a>
                    </li>
                    <li class="<?php echo e($currentMenu == 'banks' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('bankmanage.list')); ?>">
                            <i class="fa fa-university" aria-hidden="true"></i><span>Banks Management</span>
                        </a>
                    </li>
                    <li class="<?php echo e($currentMenu == 'users' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('usermanage.list')); ?>">
                            <i class="fa fa-users" aria-hidden="true"></i><span>Users Management</span>
                        </a>
                    </li>
                    <li class="<?php echo e($currentMenu == 'imports' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('reportbank.import')); ?>">
                            <i class="fa fa-cloud-upload" aria-hidden="true"></i><span>Import Data</span>
                        </a>
                    </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</nav><?php /**PATH /var/www/mastermind/resources/views/admin/components/sidebar.blade.php ENDPATH**/ ?>