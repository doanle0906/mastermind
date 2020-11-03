<!DOCTYPE html>
<html lang="en">
<head>
    <title>MASTERMIND - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset("images/favicon.ico") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("vendor/bootstrap/css/bootstrap.min.css")}} ">
    <link rel="stylesheet" type="text/css" href="{{ asset("fonts/iconic/css/material-design-iconic-font.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/login-utils.css")}}">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/login.css")}}">
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="{{ route("user.login") }}">
                    {{ csrf_field() }}
                    <span class="login100-form-title p-b-26">
                        Welcome
                    </span>
                    <span class="login100-form-title pb-4">
                        <i class="zmdi zmdi-font"></i>
                    </span>

                    @if (Session::has("error"))
                        <div class="d-block invalid-feedback error-flash pb-3">
                        {{ Session::get('error') }}
                        </div>
                    @endif

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

                    {{-- <div class="text-center p-t-33">
                        <span class="txt1">
                            Forgot your password?
                        </span>
                        <a class="txt2" href="#">
                            Click here
                        </a>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset("vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{ asset("vendor/bootstrap/js/bootstrap.min.js")}}"></script>
    <script src="{{ asset("js/login.js")}}"></script>
</body>
</html>
