<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
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


</head>

<body>
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
                        <h2>{{$title}}</h2>
                    </div>
                    <!-- /Name Header -->
                </div>
                <div class="pull-right">
                    <ul class="header-btns">
                        <!-- /Account -->
                        <li class="header-account dropdown default-dropdown">
                            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-user-o"></i>
                                </div>
                                <strong class="text-uppercase">Võ Thị Bảo Xuyên </strong>
                            </div>
                            <strong><i class="fa fa-diamond"></i></strong> <a href="#"
                                class="text-uppercase">Administrator</a>
                            <ul class="custom-menu">
                                <li><a href="{{url('account')}}"><i class="fa fa-user-o"></i>My Account</a></li>
                                <li><a href="{{url('logout')}}"><i class="fa fa-unlock-alt"></i> Logout</a></li>
                                <li><a href="#"><i class="fa fa-user-plus"></i> Create An Account</a></li>
                            </ul>
                        </li>


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
                        <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <<li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('admin/products') }}">Products</a></li>
                            <li><a href="{{ url('admin/accounts') }}">User Accounts</a></li>
                            <li><a href="{{ url('admin/roles') }}">Roles & Permissions</a></li>
                            <li><a href="{{ url('logout') }}">Logout</a></li>

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
            <div class="row">
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
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> | <strong> OPEN SOURCE APPLICATION DEVELOPMENT </strong> by <strong> <a
                                href="#" target="_blank">GROUP 5</a> </strong> <i class="fa fa-heart-o"
                            aria-hidden="true"></i>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <!-- /footer copyright -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{ url('/js/jquery.min.js') }}"></script>
    <script src="{{ url('/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/js/slick.min.js') }}"></script>
    <script src="{{ url('/js/nouislider.min.js') }}"></script>
    <script src="{{ url('/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ url('/js/main.js') }}"></script>

</body>

</html>