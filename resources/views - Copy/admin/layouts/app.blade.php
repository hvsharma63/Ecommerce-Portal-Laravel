<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Adminox - Responsive Web App Kit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{URL('resources/assets/images/favicon.ico')}}">

    <!-- C3 charts css -->
    <link href="{{ URL('resources/assets/plugins/c3/c3.min.css')}}" rel="stylesheet" type="text/css"  />

    <!-- App css -->
    <link href="{{URL('resources/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL('resources/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL('resources/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL('resources/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{URL('resources/assets/js/modernizr.min.js')}}"></script>

    <link href="{{URL('resources/assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
    
    <link href="{{URL('resources/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL('resources/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    
    <link href="{{URL('resources/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')}}" rel="stylesheet" />

    <link href="{{URL('resources/assets/plugins/jquery-toastr/jquery.toast.min.css')}}" rel="stylesheet" />    
</head>


<body>
    <div id="wrapper">
        <div class="topbar">
            <div class="topbar-left">
                <a href="index.html" class="logo">
                    <span>
                        <img src="{{URL('resources/assets/images/logo.png')}}" alt="" height="25">
                    </span>
                    <i>
                        <img src="{{URL('resources/assets/images/logo_sm.png')}}" alt="" height="28">
                    </i>
                </a>
            </div>

            <nav class="navbar-custom">
                <ul class="list-inline float-right mb-0">
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-bell noti-icon"></i>
                            <span class="badge badge-pink noti-icon-badge">4</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg" aria-labelledby="Preview">
                            <div class="dropdown-item noti-title">
                                <h5><span class="badge badge-danger float-right">5</span>Notification</h5>
                            </div>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-success"><i class="icon-bubble"></i></div>
                                <p class="notify-details">Robert S. Taylor commented on Admin<small class="text-muted">1 min ago</small></p>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info"><i class="icon-user"></i></div>
                                <p class="notify-details">New user registered.<small class="text-muted">1 min ago</small></p>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-danger"><i class="icon-like"></i></div>
                                <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">1 min ago</small></p>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item notify-all">
                                View All
                            </a>

                        </div>
                    </li>

                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{URL('resources/assets/images/users/avatar-1.jpg')}}" alt="user" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow"><small>Welcome ! HR</small> </h5>
                            </div>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="zmdi zmdi-settings"></i> <span>Settings</span>
                            </a>
                            <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                                <i class="zmdi zmdi-power"></i> <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-light waves-effect">
                            <i class="dripicons-menu"></i>
                        </button>
                    </li>
                    <li class="hide-phone app-search">
                        <form role="search" class="">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Navigation</li>
                        <li>
                            <a href="{{ route('category.show') }}"><i class="fi-paper"></i> <span> Category </span></a>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="fi-air-play"></i><span class="badge badge-success pull-right">2</span> <span> Dashboard </span>
                            </a>
                            <ul class="nav-second-level" aria-expanded=false>
                                <li><a href="index.html">Dashboard 1</a></li>
                                <li><a href="dashboard-2.html">Dashboard 2</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="tickets.html"><i class="fi-help"></i><span class="badge badge-danger pull-right">New</span> <span> Tickets </span></a>
                        </li>
                        <li>
                            <a href="javascript: void(0);"><i class="fi-mail"></i><span> Email </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="email-inbox.html">Inbox</a></li>
                                <li><a href="email-read.html">Read Email</a></li>
                                <li><a href="email-compose.html">Compose Email</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="taskboard.html"><i class="fi-paper"></i> <span> Task Board </span></a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="{{ URL('resources/assets/js/jquery.min.js')}}"></script>
    <script src="{{ URL('resources/assets/js/tether.min.js')}}"></script>

    <script src="{{ URL('resources/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL('resources/assets/js/metisMenu.min.js')}}"></script>
    <script src="{{ URL('resources/assets/js/waves.js')}}"></script>
    <script src="{{ URL('resources/assets/js/jquery.slimscroll.js')}}"></script>

    <!-- Counter js  -->
    <script src="{{ URL('resources/assets/plugins/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{ URL('resources/assets/plugins/counterup/jquery.counterup.min.js')}}"></script>

    <!--C3 Chart-->
    <script type="text/javascript" src="{{ URL('resources/assets/plugins/d3/d3.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL('resources/assets/plugins/c3/c3.min.js')}}"></script>

    <!--Echart Chart-->
    <script src="{{ URL('resources/assets/plugins/echart/echarts-all.js')}}"></script>

    <!-- Dashboard init -->
    <script src="{{ URL('resources/assets/js/jquery.dashboard.js')}}"></script>

    <!-- App js -->
    <script src="{{ URL('resources/assets/js/jquery.core.js')}}"></script>
    <script src="{{ URL('resources/assets/js/jquery.app.js')}}"></script>

    <script src="{{ URL('resources/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL('resources/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{URL('resources/assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>
    <script src="{{URL('resources/assets/plugins/jquery-toastr/jquery.toast.min.js')}}" type="text/javascript"></script>
    <script src="{{URL('resources/assets/js/jquery.toastr.js')}}" type="text/javascript"></script>
    <script src="{{URL('resources/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
    <script src="{{URL('resources/assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
    
    @yield('script')
</body>
</html>
