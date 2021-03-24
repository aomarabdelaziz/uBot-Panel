@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
@endpush
@section('title', 'uBot | SQL Settings')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Link 1</a></li>
    <li class="breadcrumb-item active">Link 2</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-6">

            <div class="card card-primary">
                <div class="card-header ">
                    <h3 class="card-title ">Server Settings</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->


                @if(session('success'))
                    <script>

                        window.onload = function() {
                            toastr.success("{{ session('success') }}")
                        }

                    </script>
                @endif



                <form method="POST" action="{{ route('dashboard.server-settings') }}">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Server Host</label>
                            <input type="text" class="form-control @error('server_host') is-invalid @enderror" name="server_host" value="{{ old('server_host' , $data->server_host) }}" placeholder="127.0.0.1">
                            @error('server_host')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Server Port</label>
                            <input type="text" class="form-control @error('server_port') is-invalid @enderror" name="server_port" value="{{ old('server_port' , $data->server_port) }}" placeholder="15779">

                            @error('server_port')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Account ID</label>
                            <input type="text" class="form-control @error('server_accountid') is-invalid @enderror" name="server_accountid" value="{{ old('server_accountid' , $data->server_accountid) }}" placeholder="autoevent">

                            @error('server_accountid')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Account PW</label>
                            <input type="text" class="form-control  @error('server_accountpw') is-invalid @enderror" name="server_accountpw" value="{{ old('server_accountpw' , $data->server_accountpw) }}" placeholder="autoevent@12@15">
                            @error('server_accountpw')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Charname</label>
                            <input type="text" class="form-control  @error('server_charname') is-invalid @enderror" name="server_charname" value="{{ old('server_charname' , $data->server_charname) }}" placeholder="AutoEvent" disabled>
                            @error('server_charname')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Captcha</label>
                            <input type="text" class="form-control  @error('server_captcha') is-invalid @enderror" name="server_captcha" value="{{ old('server_captcha') ?? ''}}" placeholder="Captcha">
                            @error('server_captcha')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>







                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>

            </div>
        </div>
@endsection

@push('js')


            <script src="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.js') }}"></script>
            <script src="{{ asset('adminlte_dashboard/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
            <script>
                $(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                });
            </script>



@endpush

