<!DOCTYPE html>
<html lang="en">
<head>
    <title>MASTERMIND - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo e(asset("images/favicon.ico")); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("vendor/bootstrap/css/bootstrap.min.css")); ?> ">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("fonts/iconic/css/material-design-iconic-font.min.css")); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("css/login-utils.css")); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("css/login.css")); ?>">
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="<?php echo e(route("user.login")); ?>">
                    <?php echo e(csrf_field()); ?>

                    <span class="login100-form-title p-b-26">
                        Welcome
                    </span>
                    <span class="login100-form-title pb-4">
                        <i class="zmdi zmdi-font"></i>
                    </span>

                    <?php if(Session::has("error")): ?>
                        <div class="d-block invalid-feedback error-flash pb-3">
                        <?php echo e(Session::get('error')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="text" name="email" maxlength="50">
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password" maxlength="30">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset("vendor/jquery/jquery.min.js")); ?>"></script>
    <script src="<?php echo e(asset("vendor/bootstrap/js/bootstrap.min.js")); ?>"></script>
    <script src="<?php echo e(asset("js/login.js")); ?>"></script>
</body>
</html>
<?php /**PATH /var/www/mastermind/resources/views/admin/pages/login.blade.php ENDPATH**/ ?>