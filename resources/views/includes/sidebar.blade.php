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
                <a href="{{ route('panel.panel-home') }}" class="d-block mb-1">{{$userProjectName}}</a>
                <a href="" style="color:#FFF;" class="btn btn-success btn-sm">Upgrade to premium</a>
            </div>

        </div>
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item">
                        <div class="search-title">
                            <b class="text-light"></b>N<b class="text-light"></b>o<b class="text-light"></b> <b class="text-light"></b>e<b class="text-light"></b>l<b class="text-light"></b>e<b class="text-light"></b>m<b class="text-light"></b>e<b class="text-light"></b>n<b class="text-light"></b>t<b class="text-light"></b> <b class="text-light"></b>f<b class="text-light"></b>o<b class="text-light"></b>u<b class="text-light"></b>n<b class="text-light"></b>d<b class="text-light"></b>!<b class="text-light"></b>
                        </div>
                        <div class="search-path">

                        </div>
                    </a></div></div>
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
                                    <a href="{{ route('panel.event-hidenseek') }}" class="nav-link">
                                        <i class="far fa-circle-none nav-icon"></i>
                                        <p>Hide And Seek</p>
                                    </a>


                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('panel.event-searchndestroy') }}" class="nav-link">
                                        <i class="far fa-circle-none nav-icon"></i>
                                        <p>Search And Destroy</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('panel.event-stall') }}" class="nav-link">
                                        <i class="far fa-circle-none nav-icon"></i>
                                        <p>Stall</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('panel.search-warps-hints.index') }}" class="nav-link">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Add Warps & Hints</p>
                                    </a>
                                </li>





                            </ul>
                        </li>
                    </ul>
                    <!--End Search Events -->






                </li>

                    <!--Start Warps Events -->
                    <div class="nav-header">Warps</div>
                    <li class="nav-item has-treeview">
                        <a href="{{ route('panel.warps.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-filter"></i>
                            <p>
                                Warps
                            </p>
                        </a>

                    </li>
                    <!--End Waps Events -->

                    <!--Start Rewards Events -->
                    <div class="nav-header">Rewards</div>
                    <li class="nav-item has-treeview">


                        <a href="{{ route('panel.rewards.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-award"></i>
                            <p>
                                Add Rewards
                            </p>
                        </a>


                    </li>
                    <li class="nav-item has-treeview">


                        <a href="{{ route('panel.track-rewards.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-print"></i>
                            <p>
                                Track Rewards
                            </p>
                        </a>













                    </li>
                    <!--End Rewards Events -->




                @endcan







            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
