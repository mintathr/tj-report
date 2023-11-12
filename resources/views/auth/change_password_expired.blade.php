<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ticketing | Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets-template/img/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets-template/img/favicon.ico">
    <link rel="stylesheet" href="/assets-template/css/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/assets-template/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Change Password</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Anda diarahkan ke halaman Change Password, dikarenakan password sudah melebihi 30 hari.</p>
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @error('password')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <form method="post" action="{{ route('changePasswordExp') }}">
                    @csrf
                    <div class="input-group mb-3 @error('current_password') is-invalid @enderror">
                        <input id="password-fieldBefore" type="password" name="current_password" class="form-control" oninput="this.value=this.value.replace(/[^A-Za-z0-9~`!@#$%^&*()_+={}|;:<>,.?/]/g,'');" placeholder="Current Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span toggle="#password-fieldBefore" class="fas fa-eye  toggle-passwordBefore"></span>
                            </div>
                        </div>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="input-group mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password-field" type="password" name="password" class="form-control" oninput="this.value=this.value.replace(/[^A-Za-z0-9~`!@#$%^&*()_+={}|;:<>,.?/]/g,'');" placeholder="New Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span toggle="#password-field" class="fas fa-eye  toggle-password"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            password salah
                        </div>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="password-Retype" type="password" name="password_confirmation" class="form-control" oninput="this.value=this.value.replace(/[^A-Za-z0-9~`!@#$%^&*()_+={}|;:<>,.?/]/g,'');" placeholder="New Password Confirm">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span toggle="#password-Retype" class="fas fa-eye  toggle-passwordRetype"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Change password</button>
                        </div>
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </p>
            </div>
        </div>
    </div>



    <script src="/assets-template/js/jquery.min.js"></script>
    <script src="/assets-template/js/bootstrap.bundle.min.js"></script>
    <script src="/assets-template/js/adminlte.min.js"></script>

    <script type="text/javascript">
        $(".toggle-passwordBefore").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>

    <script type="text/javascript">
        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>

    <script type="text/javascript">
        $(".toggle-passwordRetype").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
</body>

</html>