<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" />
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css')}}" />
    <!-- Iconic Icon s-->
    <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ asset('css/fontastic.css')}}" />
    <!-- Google fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{ asset('css/grasp_mobile_progress_circle-1.0.0.min.css')}}" />
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}" />
    <!-- Datatable-->
    <link rel="stylesheet" href="{{ asset('vendor/datatables/DataTables/css/dataTables.bootstrap4.min.css')}}" />
    <!-- toastr-->
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css')}}" id="theme-stylesheet" />
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css')}}" id="theme-stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.blue.css')}}" id="theme-stylesheet" />
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/main.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/import-file.css')}}" />
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('vendor/DatePicker/bootstrap-datepicker.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('vendor/DatePicker/bootstrapValidator.min.css')}}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico')}}" />
</head>
<body>
    @yield('content')
    <!-- JavaScript files-->
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/grasp_mobile_progress_circle-1.0.0.min.js')}}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/datatables.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/DataTables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('vendor/toastr/toastr.min.js')}}"></script>
    <script src="{{ asset('vendor/lodash/groupBy.min.js')}}"></script>
    <script src="{{ asset('vendor/lodash/merge.min.js')}}"></script>
    <script src="{{ asset('vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset('vendor/chartjs-waterfall/chartjs-plugin-waterfall.min.js')}}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js')}}"></script>
    <script src="{{ asset('vendor/moment/moment.js')}}"></script>
    <script src="{{ asset('vendor/amcharts/core.js')}}"></script>
    <script src="{{ asset('vendor/amcharts/charts.js')}}"></script>
    <script src="{{ asset('vendor/amcharts/wordCloud.js')}}"></script>
    <script src="{{ asset('vendor/amcharts/animated.js')}}"></script>
    <script src="{{ asset('vendor/DatePicker/bootstrapValidator.min.js')}}"></script>
    <script src="{{ asset('vendor/DatePicker/moment.min.js')}}"></script>
    <script src="{{ asset('vendor/DatePicker/bootstrap-datepicker.min.js')}}"></script>

    <!-- Main File-->
    <script src="{{ asset('js/front.js')}}"></script>
    <script src="{{ asset('js/notification.js')}}"></script>
    <script src="{{ asset('js/modal-custom.js')}}"></script>
    <script src="{{ asset('js/import-file.js')}}"></script>
    @yield('script')
</body>
</html>