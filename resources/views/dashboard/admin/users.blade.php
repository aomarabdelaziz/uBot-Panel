@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
@endpush
@section('title', 'Admin | Users')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.panel-home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">users</li>


@endsection

@section('content')
    <div class="row">




        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">All Registered Members</h3>

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
                                <th>ProjectName</th>
                                <th>Status</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allMembers as $member)
                                <tr>
                                    <td><a href="#">{{ $member->id }}</a></td>
                                    <td>{{ $member->name }}</td>
                                    <td>
                                        {{ $member->projects->project_name ?? '' }}
                                    </td>
                                    <td><span class="badge {{ ( $member->email_verified_at != null ? 'badge-success' : 'badge-danger') }}">
                                            {{ $member->email_verified_at != null ? 'Verfied' : 'Not Verfied' }}
                                    </span></td>
                                    <td>
                                        @if($member->email_verified_at == null)
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-info">Action</button>
                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu" style="">
                                                    <a class="dropdown-item" href="{{ route('dashboard-admin.admin-verify-users' , ['id' => $member->id]) }}">Verify</a>
                                                </div>
                                            </div>
                                        @endif

                                    </td>

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
    </script>



@endpush

