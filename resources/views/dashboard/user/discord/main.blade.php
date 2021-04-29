@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
@endpush
@section('title', 'uBot | SQL Settings')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.panel-home') }}">Panel</a></li>
    <li class="breadcrumb-item"><a href="#">Discord</a></li>
    <li class="breadcrumb-item active">Discord WebHook</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-6">

            <div class="card card-primary">
                <div class="card-header ">
                    <h3 class="card-title ">Discord WebHook</h3>
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

                @if(session('error'))
                    <script>

                        window.onload = function() {
                            toastr.error("{{ session('error') }}")
                        }

                    </script>
                @endif



                <form method="POST" action="{{ route('panel.discord.store') }}">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputText">Enable Discord</label>

                            <select class="form-control" name="Service">
                                <option value="0" {{ ( $data->Service == 0) ? 'selected' : '' }}> Disable </option>
                                <option value="1" {{ ( $data->Service == 1) ? 'selected' : '' }}> Enable </option>

                            </select>
                            @error('Service')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">AutoEvent Channel WebHook</label>
                            <input type="text" class="form-control @error('AutoEvent') is-invalid @enderror" name="AutoEvent" value="{{ old('AutoEvent' , $data->AutoEvent) }}" placeholder="">
                            @error('AutoEvent')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Global Channel WebHook</label>
                            <input type="text" class="form-control @error('Global') is-invalid @enderror" name="Global" value="{{ old('Global' , $data->Global) }}" placeholder="">

                            @error('Global')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Uniques Channel WebHook</label>
                            <input type="text" class="form-control @error('Uniques') is-invalid @enderror" name="Uniques" value="{{ old('Uniques' , $data->Uniques) }}" placeholder="">
                            @error('Uniques')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Bot Sender Name</label>
                            <input type="text" class="form-control  @error('BotName') is-invalid @enderror" name="BotName" value="{{ old('BotName' , $data->BotName) }}" placeholder="uBot">
                            @error('BotName')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Bot Avatar URL</label>
                            <input type="text" class="form-control  @error('BotAvatar') is-invalid @enderror" name="BotAvatar" value="{{ old('BotAvatar' , $data->BotAvatar) }}" placeholder="">
                            @error('BotAvatar')
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

