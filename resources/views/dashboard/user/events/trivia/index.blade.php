@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
@endpush
@section('title', 'uBot | Trivia Settings')
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
                    <h3 class="card-title ">Trivia Settings</h3>
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



                <form method="POST" action="{{ route('dashboard.event-trivia') }}">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Max Rounds</label>
                            <input type="number" class="form-control @error('MaxRounds') is-invalid @enderror" name="MaxRounds" value="{{ old('MaxRounds' , $data->MaxRounds) }}" placeholder="1">
                            @error('MaxRounds')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="exampleInputText">Send Answer</label>

                            <select class="form-control" name="SendAnswer">
                                <option value="0" {{ ( $data->SendAnswer == 0) ? 'selected' : '' }}> Disable </option>
                                <option value="1" {{ ( $data->SendAnswer == 1) ? 'selected' : '' }}> Enable </option>

                            </select>
                            @error('SendAnswer')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="exampleInputText">Prevent After Limitation</label>

                            <select class="form-control" name="PreventAfterLimit">
                                <option value="0" {{ ( $data->PreventAfterLimit == 0) ? 'selected' : '' }}> Disable </option>
                                <option value="1" {{ ( $data->PreventAfterLimit == 1) ? 'selected' : '' }}> Enable </option>

                            </select>
                            @error('PreventAfterLimit')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message  }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Win Limit</label>
                            <input type="number" class="form-control @error('WinLimit') is-invalid @enderror" name="WinLimit" value="{{ old('WinLimit' , $data->WinLimit) }}" placeholder="1">
                            @error('WinLimit')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Incorrect Limit</label>
                            <input type="number" class="form-control @error('InCorrentLimit') is-invalid @enderror" name="InCorrentLimit" value="{{ old('InCorrentLimit' , $data->InCorrentLimit) }}" placeholder="1">
                            @error('InCorrentLimit')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
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

