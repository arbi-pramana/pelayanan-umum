<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{ $title or 'Your Application Name' }}</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('vendor/admin-bsb/favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('vendor/admin-bsb/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('vendor/admin-bsb/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('vendor/admin-bsb/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('vendor/admin-bsb/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-template/css/style.css') }}" rel="stylesheet">
</head>

<body class="login-page bg-blue">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Aplikasi Pemesanan Ruang, Konsumsi Dan Kendaraan</a>
            <!-- <small>Admin BootStrap Based - Material Design</small> -->
        </div>
        @if($errors->has('email'))
        <div class="alert alert-danger">
          <b class="close" data-dismiss="alert">&times;</b>
          <i class="fa fa-warning"></i> {{ $errors->first('email') }}
        </div>
        @endif
        @include('admin::partials.alert-messages')
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="remember" id="remember" class="filled-in chk-col-pink">
                            <label for="remember">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            {!! csrf_field() !!}
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <!-- <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('vendor/admin-bsb/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('vendor/admin-bsb/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('vendor/admin-bsb/plugins/node-waves/waves.js') }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ asset('vendor/admin-bsb/plugins/jquery-validation/jquery.validate.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('vendor/admin-bsb/js/admin.js') }}"></script>
    <script src="{{ asset('vendor/admin-bsb/js/pages/examples/sign-in.js') }}"></script>
</body>

</html>