@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
@endpush
@section('title', 'uBot | Madness Settings')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.panel-home') }}">Panel</a></li>
    <li class="breadcrumb-item"><a href="#">Events</a></li>
    <li class="breadcrumb-item"><a href="#">Uniques Events</a></li>
    <li class="breadcrumb-item active">Madness</li>

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-6">

            <div class="card card-primary">
                <div class="card-header ">
                    <h3 class="card-title ">Madness Settings</h3>
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



                <form method="POST" action="{{ route('panel.event-madness') }}">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Reg Key</label>
                            <input type="text" class="form-control @error('RegKey') is-invalid @enderror" name="RegKey" value="{{ old('RegKey' , $data->RegKey) }}" placeholder="1">
                            @error('RegKey')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>




                        <div class="form-group">
                            <label for="exampleInputPassword1">Min Players</label>
                            <input type="number" class="form-control @error('MinxPlayers') is-invalid @enderror" name="MinPlayers" value="{{ old('MinPlayers' , $data->MinPlayers) }}" placeholder="1">
                            @error('MinPlayers')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="exampleInputPassword1">Max Players</label>
                            <input type="number" class="form-control @error('MaxPlayers') is-invalid @enderror" name="MaxPlayers" value="{{ old('MaxPlayers' , $data->MaxPlayers) }}" placeholder="1">
                            @error('MaxPlayers')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">UniqueID</label>
                            <input type="number" class="form-control @error('UniqueID') is-invalid @enderror" name="UniqueID" value="{{ old('UniqueID' , $data->UniqueID) }}" placeholder="1">
                            @error('UniqueID')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Required Level</label>
                            <input type="number" class="form-control @error('ReqLevel') is-invalid @enderror" name="ReqLevel" value="{{ old('ReqLevel' , $data->ReqLevel) }}" placeholder="1">
                            @error('ReqLevel')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Cape Detection</label>

                            <select class="form-control" name="CapeDetection">
                                <option value="0" {{ ( $data->CapeDetection == 0) ? 'selected' : '' }}> Disable </option>
                                <option value="1" {{ ( $data->CapeDetection == 1) ? 'selected' : '' }}> Enable </option>

                            </select>
                            @error('CapeDetection')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="exampleInputText">Prevent Player to participate if has same IP/Hwid</label>

                            <select class="form-control" name="PreventPlayerJoinInSameIPOrHwid">
                                <option value="0" {{ ( $data->PreventPlayerJoinInSameIPOrHwid == 0) ? 'selected' : '' }}> Disable </option>
                                <option value="1" {{ ( $data->PreventPlayerJoinInSameIPOrHwid == 1) ? 'selected' : '' }}> Enable </option>

                            </select>
                            @error('PreventPlayerJoinInSameIPOrHwid')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Delay 1</label>
                            <input type="number" class="form-control @error('Delay1') is-invalid @enderror" name="Delay1" value="{{ old('Delay1' , $data->Delay1) }}" placeholder="1">
                            @error('Delay1')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Delay 2</label>
                            <input type="number" class="form-control @error('Delay2') is-invalid @enderror" name="Delay2" value="{{ old('Delay2' , $data->Delay2) }}" placeholder="1">
                            @error('Delay2')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
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

