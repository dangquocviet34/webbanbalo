<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>{{ $title }}</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">


    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />


    <!-- Bao gồm Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bao gồm jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- Bao gồm Raphael -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
    <!-- Bao gồm Morris.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap4.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.css">




    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">



</head>
<body style="font-size:14px">
    <!-- HEADER -->
    <header>
        <!-- top Header -->
        <div id="top-header">
            <div class="container">
                <div class="pull-left">
                    <span><b>Welcome to G-shop Admin Dashboard!</b></span>
                </div>
            </div>
        </div>
        <!-- /top Header -->

        <!-- header -->
        <div id="header">
            <div class="container">
                <div class="pull-left">
                    <!-- Logo -->
                    <div class="header-logo">
                        <a class="logo" href="{{ url('/admin/dashboard') }}">
                            <img src="{{ url('/images/logo.png') }}" alt="logo">

                        </a>
                    </div>
                    <!-- /Logo -->

                    <!-- Name Header -->
                    <div class="header-admin-dashboard">
                        <h2>{{ $title }}</h2>
                    </div>
                    <!-- /Name Header -->
                </div>
                <div class="pull-right">
                    <ul class="header-btns">
                    @auth
                        <!-- /Account -->
                        <li class="header-account dropdown default-dropdown">
                            <div class="dropdown-toggle" role="button" data-toggle="dropdown-menu" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-user-o"></i>
                                </div>
                                
                                <strong class="text-uppercase">{{ Auth::user()->name }}</strong>
                            </div>
                            <strong><i class="fa fa-diamond"></i><a href="{{ route('account') }}"
                                class="text-uppercase"> Administrator</a></strong>
                            <div class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('/') }}"><i class="fa fa-sign-out"></i>Exit Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ url('logout') }}"><i class="fa fa-unlock-alt"></i> Logout</a></li>
                            </div>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
            <!-- header -->
        </div>
        <!-- container -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <div id="navigation">
        <!-- container -->
        <div class="container">
            <div id="responsive-nav">

                <!-- menu nav -->
                <div class="menu-nav">
                    <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                    <ul class="menu-list">
                        <li><a href="{{ url('/admin/dashboard') }}"><b>Dashboard</b></a></li>
                        <li><a href="{{ url('/admin/statistics') }}"><b>Statistics</b></a></li>
                        <li><a href="{{ url('admin/products') }}"><b>Products</b></a></li>
                        <li><a href="{{ url('admin/promotions') }}"><b>Promotions</b></a></li>
                        <li><a href="{{ url('/admin/accounts') }}"><b>User Accounts</b></a></li>
                        <li><a href="{{ url('/admin/roles') }}"><b>Roles & Permissions</b></a></li>
                        <li><a href="{{ url('/admin/settings') }}"><b>General Settings</b></a></li>
                    </ul>
                </div>
                <!-- menu nav -->
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /NAVIGATION -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->

            <div class="row" >

                {{ $slot }}
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer id="footer" class="section section-grey">
        <!-- container -->
        <div class="container">
            <hr>
            <!-- row -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <!-- footer copyright -->
                    <div class="footer-copyright">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> | <strong> OPEN SOURCE APPLICATION DEVELOPMENT ฅ^•⩊•^ฅ <a
                                href="#" target="_blank">GROUP 5</a> ฅ^•ﻌ•^ฅ </strong>
                    </div>
                    <!-- /footer copyright -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </footer>
    <!-- /FOOTER -->
</html>
