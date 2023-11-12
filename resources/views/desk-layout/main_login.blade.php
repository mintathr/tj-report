<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reporting | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets-template/img/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets-template/img/favicon.ico">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets-template/css/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <!--<link rel="stylesheet" href="/assets-template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets-template/css/adminlte.min.css">
    @stack('css-login')
    <!-- <link rel="stylesheet" href="/assets-template/css/build_login.css"> -->
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login">
    @yield('content')

    <!-- jQuery -->
    <script src="/assets-template/js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets-template/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets-template/js/adminlte.min.js"></script>

    @stack('script-show-pass')
</body>

</html>