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
                    <h3 class="card-title ">SQL Settings</h3>
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



                <form method="POST" action="{{ route('dashboard.sql-settings') }}">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">SQL Host</label>
                            <input type="text" class="form-control @error('sql_host') is-invalid @enderror" name="sql_host" value="{{ old('sql_host' , $data->sql_host) }}" placeholder="127.0.0.1,15779">
                            @error('sql_host')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">SQL Username</label>
                            <input type="text" class="form-control @error('sql_username') is-invalid @enderror" name="sql_username" value="{{ old('sql_username' , $data->sql_username) }}" placeholder="sa">

                            @error('sql_username')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">SQL Password</label>
                            <input type="text" class="form-control @error('sql_password') is-invalid @enderror" name="sql_password" value="{{ old('sql_password' , $data->sql_password) }}" placeholder="sa">

                            @error('sql_password')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Account DB</label>
                            <input type="text" class="form-control  @error('db_account') is-invalid @enderror" name="db_account" value="{{ old('db_account' , $data->db_account) }}" placeholder="SRO_VT_ACCOUNT">
                            @error('db_account')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Shard DB</label>
                            <input type="text" class="form-control  @error('db_shard') is-invalid @enderror" name="db_shard" value="{{ old('db_shard' , $data->db_shard) }}" placeholder="SRO_VT_ACCOUNT">
                            @error('db_shard')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Shardlog DB</label>
                            <input type="text" class="form-control  @error('db_shard') is-invalid @enderror" name="db_shardlog" value="{{ old('db_shard' , $data->db_shard) }}" placeholder="SRO_VT_ACCOUNT">
                            @error('db_shard')
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

