<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Docs</a>
        </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge notificaion-count">{{ auth()->user()->unReadNotifications->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right notificaion-content" style="height:400px; overflow-y: scroll;">
                @forelse(auth()->user()->unReadNotifications as $notification)
                    <a href="#" class="dropdown-item ">
                        <!-- Message Start -->
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    uBot System
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                @if($notification->data['notify_type'] == 'error')
                                    <p class="text-sm">{{ $notification->data['content'] }}</p>
                                    @elseif ($notification->data['notify_type'] == 'success')
                                    <p class="text-sm">{{ $notification->data['content'] }}</p>
                                @endif

                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $notification->created_at->diffForHumans() }}</p>
                                <span class="badge badge-primary" >Mark as read</span>


                            </div>
                        </div>
                        <!-- Message End -->
                    </a>

                    <div class="dropdown-divider"></div>


                @empty
                    <p class="text-sm text-center">No notifications</p>

                @endforelse
                  @if(auth()->user()->unReadNotifications->count() != 0)
                        <form class="d-inline-block dropdown-item dropdown-footer" action="#" method="POST"
                              onclick="event.preventDefault(); readNotifications();">
                            @csrf
                            <button type="submit"  class="dropdown-item dropdown-footer">
                                Mark all as read
                            </button>
                        </form>
                   @endif




            </div>


        </li>
        <!-- Notifications Dropdown Menu -->



        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item ml-auto dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('dashboard-admin.admin-home') }}" class="dropdown-item"> Admin Dashboard </a>
                @endif

                <a href="{{ route('panel.profile-main') }}" class="dropdown-item"> Profile </a>

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
