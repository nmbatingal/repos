<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">
                <!-- Logo icon -->
                <b>
                    <!-- <i class="wi wi-sunset"></i> -->
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="{{ asset('assets/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span>
                    <!-- dark Logo text -->
                    <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" /> -->
                    <!-- Light Logo text -->    
                    <!-- <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /> -->
                    <strong>RDIC>>></strong>
                </span>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler d-none waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                @if (!Request::is('/') && !Route::is('register') && !Route::is('login'))
                    <li class="nav-item" style="display: none">
                        <form id="searchForm" class="app-search d-none d-md-block d-lg-block" action="{{ url('search') }}" method="get">
                            <div class="input-group">
                                <input 
                                    type="text" 
                                    class="form-control form-control-lg" 
                                    placeholder="Search..."
                                    name="q"
                                    value="{{ request('q') }}"
                                    required 
                                >
                              <div class="input-group-append">
                                <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </li>
                @endif
            </ul>
            @if (Route::has('login'))
                <div class="top-right links">
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Login -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown u-pro bg-red">
                            <a class="nav-link waves-effect waves-dark toplink" data-toggle="modal" data-target="#modalLogin" aria-haspopup="true" aria-expanded="false">Researches</a>
                        </li> -->
                        <li class="nav-item dropdown u-pro bg-red">
                            <a href="{{ route('browse.index') }}" class="nav-link waves-effect waves-dark toplink">
                                Research Articles
                            </a>
                        </li>

                        @if (Auth::check())
                            <!-- ============================================================== -->
                            <!-- User profile and search -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav my-lg-0">
                                <!-- ============================================================== -->
                                <!-- User Profile -->
                                <!-- ============================================================== -->
                                <li class="nav-item dropdown u-pro">
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user" class=""> <span class="hidden-md-down">{{ Auth::user()->firstname }} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- text-->
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                        <!-- text-->
                                        <a href="{{ route('research.index') }}" class="dropdown-item"><i class="ti-email"></i> My Researches</a>
                                        <!-- text-->
                                        <div class="dropdown-divider"></div>
                                        <!-- text-->
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                                        <!-- text-->
                                        <div class="dropdown-divider"></div>
                                        <!-- text-->
                                        <a href="{{ route('logout') }}" class="dropdown-item text-danger" onclick="event.preventDefault(); 
                                            document.getElementById('logout-form').submit();"> <i class="fa fa-power-off"></i> Logout</a>
                                        <!-- text-->
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                                <!-- ============================================================== -->
                                <!-- End User Profile -->
                                <!-- ============================================================== -->
                            </ul>
                        @else
                            @if (!Route::is('register') )
                                <li class="nav-item dropdown u-pro bg-red">
                                    <a class="nav-link waves-effect waves-dark toplink" href="{{ route('register') }}" aria-haspopup="true" aria-expanded="false">Register</a>
                                </li>
                            @endif
                            @if (!Route::is('login') )
                            <li class="nav-item dropdown u-pro bg-red">
                                <a class="nav-link waves-effect waves-dark toplink" data-toggle="modal" data-target="#modalLogin" aria-haspopup="true" aria-expanded="false">Sign in</a>
                            </li>
                            @endif
                        @endif
                    </ul>
                </div>
            @endif
        </div>
    </nav>
</header>