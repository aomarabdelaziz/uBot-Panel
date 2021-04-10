@if($role === 'premium')
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

            <!--Lottery Events -->
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
            <!--End Lottery Events -->






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
                    <span class="badge badge-info right">16</span>
                </p>
            </a>


            <!--Trivia -->
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




    @endcan
@elseif($role === 'admin')

@endif
