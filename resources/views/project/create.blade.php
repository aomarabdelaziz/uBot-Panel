<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>uBot | Add new project</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte_dashboard/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">


            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('dashboard.dashboard-home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact</a>
                    </li>

                </ul>


            </div>


        </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Project</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                            <li class="breadcrumb-item active">Project</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content ">
            <div class="container ">

                <div class="row">
                    <div class="col-lg-12">

                        <div class="card card-primary">
                            <div class="card-header ">
                                <h3 class="card-title ">Add Project</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form method="POST" action="{{ route('projects.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputText">Project Name</label>
                                                    <input type="text" class="form-control  @error('project_name') is-invalid @enderror" name="project_name" value="{{ old('project_name') }}" placeholder="Enter your project name">
                                                    @error('project_name')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message  }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">SQL Host</label>
                                                    <input type="text" class="form-control @error('sql_host') is-invalid @enderror" name="sql_host" value="{{ old('sql_host') }}" placeholder="127.0.0.1,15779">
                                                    @error('sql_host')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message  }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputText">SQL Username</label>
                                                    <input type="text" class="form-control @error('sql_username') is-invalid @enderror" name="sql_username" value="{{ old('sql_username') }}" placeholder="sa">

                                                    @error('sql_username')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message  }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputText">SQL Password</label>
                                                    <input type="text" class="form-control @error('sql_password') is-invalid @enderror" name="sql_password"  value="{{ old('sql_password') }}" placeholder="Your SQL Password">
                                                    @error('sql_password')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message  }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputText">Account DB</label>
                                                    <input type="text" class="form-control  @error('db_account') is-invalid @enderror" name="db_account" value="{{ old('db_account') }}" placeholder="SRO_VT_ACCOUNT">
                                                    @error('db_account')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message  }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputText">Shard DB</label>
                                                    <input type="text" class="form-control @error('db_account') is-invalid @enderror" name="db_shard" value="{{ old('db_shard') }}"  placeholder="SRO_VT_SHARD">
                                                    @error('db_shard')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message  }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputText">ShardLog DB</label>
                                                    <input type="text" class="form-control  @error('db_shardlog') is-invalid @enderror" name="db_shardlog" value="{{ old('db_shardlog') }}"   placeholder="SRO_VT_SHARDLOG">
                                                    @error('db_shardlog')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message  }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputText">Server Host</label>
                                                    <input type="text" class="form-control @error('server_host') is-invalid @enderror" name="server_host"  value="{{ old('server_host') }}" placeholder="1270.0.0.1">
                                                    @error('server_host')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message  }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputText">Account ID</label>
                                                    <input type="text" class="form-control @error('server_accountid') is-invalid @enderror" name="server_accountid"  value="{{ old('server_accountid') }}" placeholder="autoevent">
                                                    @error('server_accountid')
                                                    <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message  }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>



                                                <div class="form-group">
                                                    <label for="exampleInputText">Account Charname</label>
                                                    <input type="text" class="form-control" name="server_charname" value="{{ old('server_charname' , 'AutoEvent') }}" placeholder="autoevent" disabled>

                                                </div>


                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputText">Server Port</label>
                                                    <input type="text" class="form-control @error('server_port') is-invalid @enderror" name="server_port" value="{{ old('server_port') }}"  placeholder="15779">
                                                    @error('server_port')
                                                    <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message  }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputText">Account Password</label>
                                                    <input type="text" class="form-control @error('server_accountpw') is-invalid @enderror" name="server_accountpw"  value="{{ old('server_accountpw') }}"  placeholder="Your account password">
                                                    @error('server_accountpw')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message  }}</strong>
                                                     </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputText">Captcha</label>
                                                    <input type="text" class="form-control " name="server_captcha"  value="{{ old('server_charname' , '') }}" placeholder="Your server captcha" >

                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->




</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

<script src="{{ asset('adminlte_dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte_dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte_dashboard/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
