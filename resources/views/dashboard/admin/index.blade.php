@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
@endpush
@section('title', 'Admin | Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard-admin.admin-home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Home</li>


@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $usersCount }}</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $premiumCount }}</h3>

                    <p>Premium Users</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                <h3>  {{ $incomeUSD }}</h3>

                    <p>Total USD</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Latest Members</h3>

                    <div class="card-tools">
                        <span class="badge badge-danger">{{ $latestMembers->count() }} New Members</span>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0" style="display: block;">
                    <ul class="users-list clearfix">
                        @foreach($latestMembers as $user)
                            <li>
                                <img src="{{ asset('adminlte_dashboard/dist/img/avatar4.png') }}" alt="User Image">
                                <a class="users-list-name" href="#">{{ $user->name }}</a>
                                <span class="users-list-date">{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans(\Carbon\Carbon::now()) }}</span>
                            </li>

                        @endforeach

                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center" style="display: block;">
                    <a href="javascript:">View All Users</a>
                </div>
                <!-- /.card-footer -->
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Latest Donators</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>UserID</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>EGP</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($latestDonators as $donator)
                                <tr>
                                    <td><a href="#">{{ $donator->id }}</a></td>
                                    <td>{{ $donator->name }}</td>
                                    <td>
                                        {{ $donator->EGP}} EGP
                                    </td>
                                    <td><span class="">
                                            {{ $donator->price }} USD
                                    </span></td>

                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">

                </div>
                <!-- /.card-footer -->
            </div>
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
                function readNotifications() {

                    $.ajax({

                        url: "{{ route('panel.panel-mark-as-read') }}",
                        type: "post",
                        dataType: "json",
                        success: function (data) {

                            $('.notificaion-count').load(window.location.href + " .notificaion-count")
                            $('.notificaion-content').load(window.location.href + " .notificaion-content")

                        },
                        error: function (data) {

                            $('.notificaion-count').load(window.location.href + " .notificaion-count")
                            $('.notificaion-content').load(window.location.href + " .notificaion-content")

                        }

                    });

                }
            </script>




    @endpush

