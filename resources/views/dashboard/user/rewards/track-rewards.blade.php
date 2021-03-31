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
    <li class="breadcrumb-item active">Track Rewards</li>

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
                        <div class="col-12">
                            <div class="form-group">

                                <form action="{{ route('panel.track-rewards.index') }}" method="GET">
                                    <div class="row">


                                        <div class="col-md-2">

                                            <div class="form-group">
                                                <select class="select2 event-name"  name="event_name" data-placeholder="Any" style="width: 100%;">
                                                    <option selected disabled>Select event</option>


                                                @foreach($EVENTS as $event)
                                                        <option  {{ ( $event == $eventName) ? 'selected' : '' }}>{{ $event }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">

                                            <div class="form-group">
                                                <input type="text" class="form-control" value="{{ old('char_name' , $charName) }}" name="char_name" placeholder="Charname">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Search</button>
                                        </div>


                                    </div>
                                </form>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Trackable Rewards</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Charname</th>
                                                        <th>Reward Type</th>
                                                        <th>Eventname</th>
                                                        <th>Description</th>
                                                        <th>Datetime</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($all_rewards as $index=>$reward)
                                                       <p>{{$reward->Eventname}}</p>
                                                        <tr>
                                                            <td>{{$index}}</td>
                                                            <td>{{ $reward->Charname }}</td>
                                                            <td>{{ $reward->RewardType }}</td>
                                                            <td>{{ $reward->Event }}</td>
                                                            <td>{{ $reward->Desc }}</td>
                                                            <td>{{ $reward->DateTime }}</td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer clearfix">
                                                <ul class="pagination pagination-sm m-0 float-right">
                                                    {{ $all_rewards->appends(request()->query())->links() }}
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.card -->


                                        <!-- /.card -->
                                    </div>
                                    <!-- /.col -->

                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
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

