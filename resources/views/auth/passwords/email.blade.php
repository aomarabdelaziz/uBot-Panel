<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>uBot | Login </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">

<div class="login-box">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card card-outline card-primary">


        <div class="card-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                    placeholder="{{__('reset.Email')}}">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="input-group-append  @error('email') d-none @enderror">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->

<script src="{{ asset('adminlte_dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte_dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte_dashboard/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
