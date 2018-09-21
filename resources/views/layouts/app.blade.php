<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Elite Admin Template - Landing Page</title>
    <!-- This page CSS -->
    <link href="../assets/node_modules/owl.carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/node_modules/owl.carousel/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="dist3/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div id="main-wrapper">
        <div class="container-fluid">
            <div class="navbar-fixed p-0">
                <!-- <div class="fix-width"> -->
                <div>
                    <!-- Start Header -->
                    <div class="header">
                        <nav class="navbar navbar-expand-md navbar-light p-30">
                            <a class="navbar-brand" href="#">
                                <img src="dist/images/elite-admin-logo.png" alt="logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="JavaScript: void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Elite Demos</a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="http://eliteadmin.themedesigner.in/demos/bt4/inverse/index.html" target="_blank">Eliteadmin Inverse</a>
                                            <a class="dropdown-item" href="http://eliteadmin.themedesigner.in/demos/bt4/cryptocurrency/index.html" target="_blank">Eliteadmin Cryptocurrency</a>
                                            <a class="dropdown-item" href="http://eliteadmin.themedesigner.in/demos/bt4/material/index3.html" target="_blank">Eliteadmin Material Design</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#myfeatures">Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../documentation/documentation.html" target="_blank">Documentation</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- End Header -->
                </div>
            </div>

            <div class="page-wrapper p-t-0" >
                <!-- SEARCH ENGINE -->
                <div class="row text-white" style="background-color: #474d5d;">

                    <div class="offset-md-1 col-md-11">
                        <div class="p-30">
                            <form role="form" action="{{ url('search') }}" method="GET" class="form-horizontal row m-t-0 p-0">
                                <div class="col-12">
                                    <div class="form-group row m-b-10">
                                        <div class="offset-md-1 col-md-10 m-b-0">
                                            <h4>Search for reasearch articles and open access content by typing keywords in the search box.</h4>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1 offset-md-1">
                                            <input type="text" name="keywords" class="form-control" placeholder="Keywords">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="text" name="author" class="form-control" placeholder="Author name">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="title" class="form-control" placeholder="Research title">
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-control p-0" name="domain" id="domain" placeholder="Domain">
                                                <option value="">All Domain</option>
                                                @if(!empty($fields))
                                                    @foreach( $fields as $value )
                                                        <option class="font-bold" value="{{ $value->category_field }}" data-subject="{{ $value->id .',0' }}">{{ $value->category_field }}</option>
                                                        @foreach( $value->categoryDomains as $domain )
                                                            <option value="{{ $domain->category_domain }}" data-subject="{{ $value->id .','. $domain->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $domain->category_domain }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-control p-0" name="subdomain" id="subdomain" disabled>
                                                <option value="">All Subdomain</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-info btn-block"><i class="fa fa-search"></i> search</button>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="javascript:void(0)">Advanced search</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="light-blue-bg">
                            <div class="fix-width text-center">
                                <small class="text-primary">ALMOST COVERED EVERYTHING</small>
                                <h2 class="text-title">What Real Buyers have to <br/>Say about EliteAdmin</h2>
                                <p class="testimonial-text">I purchased this web kit hoping to <b class="text-title">spend more time coding database interactions rather than interface.</b> All of my expectations have been met so far. <b class="text-title">This is a fantastic kit with everything I’ve needed.</b> I love the <b class="text-title">modal window inputs</b> and <b class="text-title">various calendar and time pickers.</b><b class="text-title"> I used to do all this with seperate jquery and java scripts, but now it’s all built in.</b> I’m working on <b class="text-title">two client projects using this kit and they love it.</b> </p>
                                <div class="username"><span>E</span><b>inshawaii<br/><small class="text-primary"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></small></b></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="fix-width top-features">
                            <div id="owl-demo2" class="owl-carousel owl-theme">
                                <div class="item">
                                    <small class="text-primary">AND COUNTING</small>
                                    <h3>2000+ Quality Designed Pages Included</h3>
                                    <p>We have included 100+ Different Pages to each demo. Includes Data Tables, Form Pages, Charts, Widgets etc.</p>
                                </div>
                                <div class="item">
                                    <small class="text-primary">AND COUNTING</small>
                                    <h3>13 Unique Dashboard Demos Included</h3>
                                    <p>We have included 13 Unique Dashboard Variations at the moment and We are going to add new demos soon. You will love all Dashboards.</p>
                                </div>
                                <div class="item">
                                    <small class="text-primary">BEAUTIFUL NAVBARS</small>
                                    <h3>7 Styles for Navigation with Mega Menu</h3>
                                    <p>We have added 7 different styles for Header and Navigations. Added Horizontal and Vertical, both types of Navigation & Mega Menu.</p>
                                </div>
                                <div class="item">
                                    <small class="text-primary">SHOPING DASHBOARD</small>
                                    <h3>eCommerce Dashboard Included</h3>
                                    <p>Yes, We have also added eCommerce Dashboard option. It also has relevant sections, like List of Products, Total Earnings and & Status.</p>
                                </div>
                                <div class="item">
                                    <small class="text-primary">JUST ADDED</small>
                                    <h3>Lots of Chart Options Added in Package</h3>
                                    <p>We have covered almost each possible Graphs / Charts in our Elite Admin - Responsive Web App Kit. Its easy to implement in your project.</p>
                                </div>
                                <div class="item">
                                    <small class="text-primary">JUST ADDED</small>
                                    <h3>Data table Export - csv, Excel, Pdf, copy</h3>
                                    <p>With Elite Admin - Responsive Web App Kit, you will get option for export data from data table. You can save your data in excel, pdf, csv format.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="footer p-t-20">
                    <!-- <div class="fix-width"> -->
                    <div class="p-20">
                        <div class="row">

                            <div class="offset-md-1 col-md-3 col-sm-6"><img src="dist/images/footer-logo.png" />
                                <p class="m-t-30">
                                    <font class="text-white">Eliteadmin</font> is premium quality admin dashboard template with flat design. It is fully responsive admin dashboard template built with Bootstrap Framework, HTML5 & CSS3, Media query. </p>
                            </div>

                            <div class="offset-md-3 col-md-3 col-sm-6">
                                <ul class="footer-link list-icons">
                                    <li><a href="http://eliteadmin.themedesigner.in/demos/bt4/inverse/inbox.html"><i class="ti-angle-right text-megna"></i> Inbox Layout</a></li>
                                    <li><a href="http://eliteadmin.themedesigner.in/demos/bt4/inverse/treeview.html"><i class="ti-angle-right text-megna"></i> Tree View Options</a></li>
                                    <li><a href="http://eliteadmin.themedesigner.in/demos/bt4/inverse/carousel.html"><i class="ti-angle-right text-megna"></i> Carousel Slider Option</a></li>
                                    <li><a href="http://eliteadmin.themedesigner.in/demos/bt4/inverse/gallery.html"><i class="ti-angle-right text-megna"></i> Gallery Option</a></li>
                                    <li><a href="http://eliteadmin.themedesigner.in/demos/bt4/inverse/starter-page.html"><i class="ti-angle-right text-megna"></i> Starter Pages</a></li>
                                </ul>
                            </div>

                            <div class="clearfix"></div>

                            <div class="offset-md-1 col-md-10 sub-footer">
                                <span>Copyright 2018. All Rights Reserved by <a class="text-white primary-link" href="https://themeforest.net/item/elite-admin-responsive-web-app-kit-/16750820?ref=suniljoshi" target="_blank">Elite Admin</a></span>
                                <span class="pull-right">Design & Developed by <a class="text-white primary-link" href="http://themedesigner.in" target="_blank">Theme Designer</a></span>
                            </div>

                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</body>
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="../assets/node_modules/popper/popper.min.js"></script>
<script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/node_modules/owl.carousel/owl.carousel.js"></script>
<!-- jQuery for typing -->
<script src="../assets/node_modules/typed.js-master/dist/typed.min.js"></script>
<script src="dist3/js/custom.js"></script>
<script type="text/javascript">
    $('a.primary-link').hover(
       function(){ $(this).addClass('text-primary') },
       function(){ $(this).removeClass('text-primary') }
    );
</script>
</html>