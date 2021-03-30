@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/dist/css/adminlte.min.css') }}">


    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>




@endpush
@section('title', 'uBot | Warps')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.panel-home') }}">Panel</a></li>
    <li class="breadcrumb-item active">Warps</li>

@endsection
@section('content')

<div class="wrapper">

    @if(session('success'))
        <script>

            window.onload = function() {
                toastr.success("{{ session('success') }}")
            }

        </script>
    @endif



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">

                                <form action="{{ route('panel.warps.index') }}" method="GET">
                                    <div class="row">


                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <select class="select2 event-name"  name="event_name" data-placeholder="Any" style="width: 100%;">
                                                    <option selected disabled>Select event</option>
                                                    @foreach($EVENTS as $event)
                                                        <option  {{ ( $event == $eventName) ? 'selected' : '' }}>{{ $event }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Search</button>
                                        </div>


                                    </div>
                                </form>


                                @if($eventName)




                                    <div class="card card-primary">
                                        <div class="card-header ">
                                            <h3 class="card-title ">Warp Settings</h3>
                                        </div>

                                        <form action="{{ route('panel.warps.store') }}" method="POST">
                                            @csrf
                                            <div class="card-body">

                                                <input type="hidden" value="{{$eventName}}" name="event">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Region ID</label>
                                                    <input type="number" class="form-control @error('RegionID') is-invalid @enderror" name="RegionID" value="{{ old('RegionID' , $warps->RegionID) }}" placeholder="">
                                                    @error('RegionID')
                                                        <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">PosX</label>
                                                    <input type="number" class="form-control @error('PosX') is-invalid @enderror" name="PosX" value="{{ old('PosX' , $warps->PosX) }}" placeholder="">
                                                    @error('PosX')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">PosY</label>
                                                    <input type="number" class="form-control @error('PosY') is-invalid @enderror" name="PosY" value="{{ old('PosY' , $warps->PosY) }}" placeholder="">
                                                    @error('PosY')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">PosZ</label>
                                                    <input type="number" class="form-control @error('PosZ') is-invalid @enderror" name="PosZ" value="{{ old('PosZ' , $warps->PosZ) }}" placeholder="">
                                                    @error('PosZ')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">World ID</label>
                                                    <input type="number" class="form-control @error('WorldID') is-invalid @enderror" name="WorldID" value="{{ old('WorldID' , $warps->WorldID) }}" placeholder="">
                                                    @error('WorldID')
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



                                @endif
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

@endsection
@push('js')


    <script src="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('adminlte_dashboard/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('adminlte_dashboard/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

        });
        $(function () {
            $('.select2').select2()
        });



    </script>




@endpush

