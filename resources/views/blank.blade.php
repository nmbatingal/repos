<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
</head>
<body class="horizontal-nav skin-megna fixed-layout">
    <div id="app">
    	<!-- ============================================================== -->
	    <!-- Preloader - style you can find in spinners.css -->
	    <!-- ============================================================== -->
	    <div class="preloader">
	        <div class="loader">
	            <div class="loader__figure"></div>
	            <p class="loader__label">Elite admin</p>
	        </div>
	    </div>
	    <!-- ============================================================== -->
	    <!-- Main wrapper - style you can find in pages.scss -->
	    <!-- ============================================================== -->
	    <div id="main-wrapper">
	        <!-- ============================================================== -->
	        <!-- Topbar header - style you can find in pages.scss -->
	        <!-- ============================================================== -->
	        <header class="topbar">
	            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
	                <div class="navbar-collapse">
	                    <!-- ============================================================== -->
	                    <!-- toggle and nav items -->
	                    <!-- ============================================================== -->
	                    <ul class="navbar-nav mr-auto">
	                        <!-- This is  -->
	                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
	                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
	                    </ul>
	                    @if (Route::has('login'))
			                <div class="top-right links">
			                    @if (Auth::check())
			                        <!-- ============================================================== -->
				                    <!-- User profile and search -->
				                    <!-- ============================================================== -->
				                    <ul class="navbar-nav my-lg-0">
				                        <!-- ============================================================== -->
				                        <!-- User Profile -->
				                        <!-- ============================================================== -->
				                        <li class="nav-item dropdown u-pro">
				                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user" class=""> <span class="hidden-md-down">Mark Kurosaki &nbsp;<i class="fa fa-angle-down"></i></span> </a>
				                            <div class="dropdown-menu dropdown-menu-right">
				                                <!-- text-->
				                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
				                                <!-- text-->
				                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
				                                <!-- text-->
				                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
				                                <!-- text-->
				                                <div class="dropdown-divider"></div>
				                                <!-- text-->
				                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
				                                <!-- text-->
				                                <div class="dropdown-divider"></div>
				                                <!-- text-->
				                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); 
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
			                        <!-- ============================================================== -->
				                    <!-- User profile and search -->
				                    <!-- ============================================================== -->
				                    <ul class="navbar-nav my-lg-0">
				                        <!-- ============================================================== -->
				                        <!-- Login -->
				                        <!-- ============================================================== -->
				                        <li class="nav-item dropdown u-pro bg-red">
				                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="{{ url('/login') }}" aria-haspopup="true" aria-expanded="false">LOGIN</a>
				                        </li>
				                    </ul>
			                    @endif
			                </div>
			            @endif
	                </div>
	            </nav>
	        </header>
	        <!-- ============================================================== -->
	        <!-- End Topbar header -->
	        <!-- ============================================================== -->
	        <!-- ============================================================== -->
	        <!-- Page wrapper  -->
	        <!-- ============================================================== -->
	        <div class="page-wrapper">
	            <!-- ============================================================== -->
	            <!-- Container fluid  -->
	            <!-- ============================================================== -->
	            <div class="container-fluid">
	                <!-- ============================================================== -->
	                <!-- Bread crumb and right sidebar toggle -->
	                <!-- ============================================================== -->
	                <div class="row page-titles">
	                    <div class="col-md-5 align-self-center">
	                        <h4 class="text-themecolor"></h4>
	                    </div>
	                    <div class="col-md-7 align-self-center text-right">
	                        <div class="d-flex justify-content-end align-items-center">
	                        </div>
	                    </div>
	                </div>
	                <!-- ============================================================== -->
	                <!-- End Bread crumb and right sidebar toggle -->
	                <!-- ============================================================== -->
	                <!-- ============================================================== -->
	                <!-- Start Page Content -->
	                <!-- ============================================================== -->
	                <div class="row">
	                    <div class="col-md-6 offset-md-3">
	                        <div class="card">
	                            <div class="card-body">
	                                This is some text within a card block.
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- ============================================================== -->
	                <!-- End PAge Content -->
	                <!-- ============================================================== -->
	                <!-- ============================================================== -->
	                <!-- Right sidebar -->
	                <!-- ============================================================== -->
	                <!-- .right-sidebar -->
	                <div class="right-sidebar">
	                    <div class="slimscrollright">
	                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
	                        <div class="r-panel-body">
	                            <ul id="themecolors" class="m-t-20">
	                                <li><b>With Light sidebar</b></li>
	                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
	                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
	                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
	                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
	                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
	                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme working">6</a></li>
	                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
	                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
	                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
	                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
	                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
	                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
	                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
	                            </ul>
	                            <ul class="m-t-20 chatonline">
	                                <li><b>Chat option</b></li>
	                                <li>
	                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
	                                </li>
	                                <li>
	                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
	                                </li>
	                                <li>
	                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
	                                </li>
	                                <li>
	                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
	                                </li>
	                                <li>
	                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
	                                </li>
	                                <li>
	                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
	                                </li>
	                                <li>
	                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
	                                </li>
	                                <li>
	                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>
	                </div>
	                <!-- ============================================================== -->
	                <!-- End Right sidebar -->
	                <!-- ============================================================== -->
	            </div>
	            <!-- ============================================================== -->
	            <!-- End Container fluid  -->
	            <!-- ============================================================== -->
	        </div>
	        <!-- ============================================================== -->
	        <!-- End Page wrapper  -->
	        <!-- ============================================================== -->
	        <!-- ============================================================== -->
	        <!-- footer -->
	        <!-- ============================================================== -->
	        <footer class="footer">
	            © 2018 Eliteadmin by themedesigner.in
	        </footer>
	        <!-- ============================================================== -->
	        <!-- End footer -->
	        <!-- ============================================================== -->
	    </div>
	    <!-- ============================================================== -->
	    <!-- End Wrapper -->
	    <!-- ============================================================== -->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/node_modules/popper/popper.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('assets/node_modules/sparkline/jquery.sparkline.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
</body>
</html>