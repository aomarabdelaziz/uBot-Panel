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
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">

        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                           autofocus placeholder="{{ __('login.Email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="input-group-append @error('email') d-none @enderror">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required
                           autocomplete="current-password" placeholder="{{ __('login.Password') }}">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-group-append @error('password') d-none @enderror">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mt-3">
                   <div class="row">
                       <div class="col-7">
                           <input type="text"  class="form-control  @error('captcha') is-invalid @enderror" name="captcha" required placeholder="{{ __('Captcha') }}">
                       </div>
                       <div class="col-3">
                           {!! captcha_img('math') !!}

                           @error('captcha')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                       </div>
                   </div>

                </div>
                <div class="row">
                    <div class="col-8 mt-3">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                {{ __('login.Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4 mt-3">
                        <button type="submit" class=" btn btn-primary btn-block">{{ __('login.Sign In') }}</button>

                    </div>





                    <!-- /.col -->
                </div>
            </form>




            @if (Route::has('password.request'))
                <p class="mb-1">
                    <a href="{{ route('password.request') }}">{{ __('login.Forgot Your Password?') }}</a>
                </p>
            @endif

            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">{{ __('login.Register a new membership') }}</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
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
