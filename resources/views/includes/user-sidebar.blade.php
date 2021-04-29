@if($role !== 'user')

    @if(str_contains( \Illuminate\Support\Facades\Route::getCurrentRoute()->getName() , 'dashboard-admin'))


        <!--Start Users Events -->
        <div class="nav-header">Users</div>
        <li class="nav-item has-treeview">
            <a href="{{ route('dashboard-admin.admin-users') }}" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                    Users
                </p>
            </a>

        </li>
        <!--End Users Events -->

        <!--Start Projects Events -->
        <div class="nav-header">Projects</div>
        <li class="nav-item has-treeview">
            <a href="{{ route('dashboard-admin.admin-projects') }}" class="nav-link">
                <i class="nav-icon fa fa-project-diagram"></i>
                <p>
                    Projects
                </p>
            </a>

        </li>
        <!--End Projects Events -->
    @else
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

                <!--Lottery Events -->
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-stethoscope"></i>
                            <p>
                                Lottery Events
                                <i class="right fas fa-angle-left"></i>
                                <span class="badge badge-info right">3</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('panel.event-lotterysilk') }}" class="nav-link">
                                    <i class="far fa-circle-none nav-icon"></i>
                                    <p>Lottery Silk</p>
                                </a>


                            </li>
                            <li class="nav-item">
                                <a href="{{ route('panel.event-lotterygold') }}" class="nav-link">
                                    <i class="far fa-circle-none nav-icon"></i>
                                    <p>Lottery Gold</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('panel.event-lotterycoins') }}" class="nav-link">
                                    <i class="far fa-circle-none nav-icon"></i>
                                    <p>Lottery Coins</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!--End Lottery Events -->

                <!--Uniques Events -->
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-stethoscope"></i>
                            <p>
                                Uniques Events
                                <i class="right fas fa-angle-left"></i>
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('panel.event-madness') }}" class="nav-link">
                                    <i class="far fa-circle-none nav-icon"></i>
                                    <p>Madness</p>
                                </a>


                            </li>
                            <li class="nav-item">
                                <a href="{{ route('panel.uniques.index') }}" class="nav-link">
                                    <i class="far fa-circle-none nav-icon"></i>
                                    <p>Uniques</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
                <!--End Uniques Events -->

                <!--PVP Events -->
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-stethoscope"></i>
                            <p>
                                PVP Events
                                <i class="right fas fa-angle-left"></i>
                                <span class="badge badge-info right">3</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('panel.event-lms') }}" class="nav-link">
                                    <i class="far fa-circle-none nav-icon"></i>
                                    <p>LMS</p>
                                </a>


                            </li>
                            <li class="nav-item">
                                <a href="{{ route('panel.event-survival') }}" class="nav-link">
                                    <i class="far fa-circle-none nav-icon"></i>
                                    <p>Survival</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('panel.event-pvp') }}" class="nav-link">
                                    <i class="far fa-circle-none nav-icon"></i>
                                    <p>PVP</p>
                                </a>
                            </li>








                        </ul>
                    </li>
                </ul>
                <!--End PVP Events -->


                <!--Other Events -->
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-stethoscope"></i>
                            <p>
                                Other Events
                                <i class="right fas fa-angle-left"></i>
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('panel.event-drunk') }}" class="nav-link">
                                    <i class="far fa-circle-none nav-icon"></i>
                                    <p>Drunk</p>
                                </a>


                            </li>
                            <li class="nav-item">
                                <a href="{{ route('panel.event-gmkiller') }}" class="nav-link">
                                    <i class="far fa-circle-none nav-icon"></i>
                                    <p>GM Killer</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
                <!--End Other Events -->


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

                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-award"></i>
                    <p>
                        Add Rewards
                        <i class="right fas fa-angle-left"></i>
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>


                <!--Rewards  -->
                <ul class="nav nav-treeview">
                    <li class="nav-item has-treeview">

                        <a href="{{ route('panel.rewards.index') }}" class="nav-link">
                            <i class="nav-icon fa"></i>
                            <p>
                                Normal Events
                            </p>
                        </a>

                    </li>

                    <li class="nav-item has-treeview">

                        <a href="{{ route('panel.top-rewards.index') }}" class="nav-link">
                            <i class="nav-icon fa "></i>
                            <p>
                                Top Reward Events
                            </p>
                        </a>

                    </li>
                </ul>





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

            <div class="nav-header">Events Schedule</div>
            <li class="nav-item has-treeview">


                <a href="{{ route('panel.schedule.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-calendar-alt"></i>
                    <p>
                        Schedule
                    </p>
                </a>













            </li>


            <div class="nav-header">Events Notices</div>
            <li class="nav-item has-treeview">


                <a href="{{ route('panel.notices.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-bell"></i>
                    <p>
                        Notices
                    </p>
                </a>













            </li>



            <div class="nav-header">Discord</div>

            <li class="nav-item has-treeview">

                <a href="#" class="nav-link">
                    <i class="nav-icon fab fa-discord"></i>
                    <p>
                        Discord
                        <i class="right fas fa-angle-left"></i>
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>


                <!--Rewards  -->
                <ul class="nav nav-treeview">
                    <li class="nav-item has-treeview">

                        <a href="{{ route('panel.discord.index') }}" class="nav-link">
                            <i class="nav-icon fa"></i>
                            <p>
                                Discord WeebHook
                            </p>
                        </a>

                    </li>

                    <li class="nav-item has-treeview">

                        <a href="{{ route('panel.top-rewards.index') }}" class="nav-link">
                            <i class="nav-icon fa "></i>
                            <p>
                                Discord Schedule
                            </p>
                        </a>

                    </li>
                </ul>





            </li>



        @endcan
    @endif

@endif
