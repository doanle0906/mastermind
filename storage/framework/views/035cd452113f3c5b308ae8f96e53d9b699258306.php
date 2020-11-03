<header class="header">
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <a id="toggle-btn" href="#" class="menu-btn">
                        <i class="icon-bars"></i>
                    </a>
                </div>
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <li class="dropdown nav-item">
                        <a class="nav-link dropdown-toggle" 
                            href="#" id="navbarDropdown" 
                            role="button" 
                            data-toggle="dropdown" 
                            aria-haspopup="true" 
                            aria-expanded="false">Welcome, <?php echo e(Auth::user()->name); ?></a>
                        <div class="dropdown-menu p-2" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item pt-2 pb-2 pl-3 pr-3" href="/change-password"><i class="fa fa-cog"></i> Change Password </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item pt-2 pb-2 pl-3 pr-3" href="<?php echo e(route("user.logout")); ?>"><i class="fa fa-sign-out"> Logout</i></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header><?php /**PATH /var/www/mastermind/resources/views/admin/components/header.blade.php ENDPATH**/ ?>