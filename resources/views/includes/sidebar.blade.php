<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
<!--    <a href="index3.html" class="brand-link">
        <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>-->

    <!-- Sidebar -->

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a href="#" class="d-block mb-1">{{$userName}}</a>
                <a href="" style="color:#FFF;" class="btn btn-success btn-sm">Upgrade to premium</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->

                @can('access-event')
                <div class="nav-header">Main Settings</div>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('panel.sql-settings') }}" class="nav-link">
                                <i class="fas fa-database nav-icon"></i>
                                <p>SQL</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('panel.server-settings') }}" class="nav-link">
                                <i class="fas fa-server nav-icon"></i>
                                <p>Server</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <div class="nav-header">Events</div>
                <li class="nav-item has-treeview">


                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-ellipsis-v"></i>
                        <p>
                            Events
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">16</span>
                        </p>
                    </a>




                    <!--Trivia -->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('panel.event-trivia') }}" class="nav-link">
                                <i class="fa fa-stethoscope nav-icon"></i>
                                <p>Trivia</p>
                            </a>
                        </li>
                    </ul>
                    <!--End Trivia -->


                    <!--Lucky Events -->
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-stethoscope"></i>
                                <p>
                                    Lucky Events
                                    <i class="right fas fa-angle-left"></i>
                                    <span class="badge badge-info right">6</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('panel.event-luckystore') }}" class="nav-link">
                                        <i class="far fa-circle-none nav-icon"></i>
                                        <p>Lucky Store</p>
                                    </a>


                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('panel.event-lpn') }}" class="nav-link">
                                        <i class="far fa-circle-none nav-icon"></i>
                                        <p>Lucky Party Number</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('panel.event-lpm') }}" class="nav-link">
                                        <i class="far fa-circle-none nav-icon"></i>
                                        <p>Lucky Party Member</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('panel.event-lc') }}" class="nav-link">
                                        <i class="far fa-circle-none nav-icon"></i>
                                        <p>Lucky Critical</p>
                                    </a>
                                </li>





                            </ul>
                        </li>
                    </ul>
                    <!--End Lucky Events -->

                    <!--Search Events -->
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-stethoscope"></i>
                                <p>
                                    Search Events
                                    <i class="right fas fa-angle-left"></i>
                                    <span class="badge badge-info right">3</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('panel.event-trivia') }}" class="nav-link">
                                        <i class="far fa-circle-none nav-icon"></i>
                                        <p>Hide And Seek</p>
                                    </a>


                                </li>
                                <li class="nav-item">
                                    <a href="pages/charts/inline.html" class="nav-link">
                                        <i class="far fa-circle-none nav-icon"></i>
                                        <p>Search And Destroy</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/charts/inline.html" class="nav-link">
                                        <i class="far fa-circle-none nav-icon"></i>
                                        <p>Stall</p>
                                    </a>
                                </li>





                            </ul>
                        </li>
                    </ul>
                    <!--End Search Events -->






                </li>

                <div class="nav-header">Warps</div>
                <li class="nav-item has-treeview">


                    <a href="{{ route('panel.warps.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-tractor"></i>
                        <p>
                            Warps
                        </p>
                    </a>













                </li>
                @endcan







            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
