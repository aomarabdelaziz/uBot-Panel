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
@section('title', 'uBot | Profile')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.panel-home') }}">Panel</a></li>
    <li class="breadcrumb-item active">Profile</li>


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

@endsection

@section('content')
    <div class="row">
      <div class="col-md-3">
          <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle" src="{{ asset('adminlte_dashboard/dist/img/avatar4.png') }}" alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

                  <p class="text-muted text-center">{{ auth()->user()->projects->project_name }}</p>

                  <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                          <b>EGP Balance</b> <a class="float-right">{{ auth()->user()->userBalance->balance }}</a>
                      </li>
                      <li class="list-group-item">
                          <b>Account Type</b> <a class="float-right">{{ ucfirst(auth()->user()->role )  }}</a>
                      </li>
                      <li class="list-group-item">
                          <b>End License</b> <a class="float-right">{{ auth()->user()->projects->end_license }}</a>
                      </li>
                      <li class="list-group-item">
                          <b>Remaining Days</b> <a class="float-right">{{ \Carbon\Carbon::parse(auth()->user()->projects->end_license)->diffInDays(\Carbon\Carbon::now()) }} day</a>
                      </li>
                  </ul>


                  <a href="{{ route('panel.premium-index') }}" style="color:#FFF;" class=" {{ auth()->user()->role === "premium" ? 'd-none' : '' }}  btn btn-primary btn-block">Upgrade to Premium</a>

              </div>
              <!-- /.card-body -->
          </div>
      </div>
      <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">EGP Transfer Balance</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Purchase EGP</a></li>
<!--                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>-->
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">

                            <form class="form-horizontal" method="post" action="{{ route('panel.profile-transfere-balance') }}" >
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Balance</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control @error('egp_amount') is-invalid @enderror" placeholder="Balance" name="egp_amount">
                                        @error('egp_amount')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message  }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Project Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('project_name') is-invalid @enderror" placeholder="Project Name" name="project_name">
                                        @error('project_name')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message  }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Transfer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">

                            <form action="{{ route('panel.invoice-index') }}" method="GET">
                                <div class="row">


                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <select class="select2"  name="package" data-placeholder="Any" style="width: 100%;">
                                                <option selected disabled>Select Package</option>
                                                <option value="400">1 Month / 400EGP</option>
                                                <option value="1200">3 Month / 1200EGP</option>
                                                <option value="2400">6 Month / 2400EGP</option>
                                                <option value="4800">1 Year / 4800EGP</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info">Continue</button>
                                    </div>


                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Project Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
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
