<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- include css files --}}
        @include('includes.css')
        @stack('css')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Navbar -->
            @include('includes.nav')
            <!-- /.navbar -->

            {{-- include main sidebar container --}}
            @include('includes.sidebar', ['role' => auth()->user()->role])

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Content Header and breadcrumb -->
                @include('partials.breadcrumb')
                <!-- /.content-header and breadcrumb -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        @if(!is_null($remLic))
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-info"></i> Hey {{ auth()->user()->name }} </h5>
                                Remaining {{ $remLic }} that, your membership will be cancelled
                            </div>
                        @endif
                        @yield('content')
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            {{-- include footer --}}
            @include('includes.footer')

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        {{-- include javascript files --}}
        @include('includes.js')
        @stack('js')
    </body>
</html>
