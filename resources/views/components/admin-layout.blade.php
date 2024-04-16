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

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">


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
                        <h2>{{ $title }}</h2>
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
                                <li><a href="{{ url('account') }}"><i class="fa fa-user-o"></i>My Account</a></li>
                                <li><a href="{{ url('/') }}"><i class="fa fa-sign-out"></i>Exit Dashboard</a></li>
                                <li><a href="{{ url('logout') }}"><i class="fa fa-unlock-alt"></i> Logout</a></li>
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
                        <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="true">Statistics <i class="fa fa-caret-down"></i></a>
                            <div class="custom-menu">
                                <ul class="list-links">
                                    <li>
                                        <h3 class="list-links-title">Statistics & Reports</h3>
                                    </li>
                                    <li><a href="{{ url('admin/statistics') }}">Statistics</a></li>
                                    <li><a href="{{ url('admin/reports') }}">Reports</a></li>
                                    <li><a href="{{ url('admin/import') }}">Import</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="{{ url('admin/products') }}">Products</a></li>
                        <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="true">Users <i class="fa fa-caret-down"></i></a>

                            <div class="custom-menu">
                                <ul class="list-links">
                                    <li>
                                        <h3 class="list-links-title">User Accounts</h3>
                                    </li>
                                    <li><a href="{{ url('admin/accounts') }}">Administrators</a></li>
                                    <li><a href="{{ url('admin/moderators') }}">Moderators</a></li>
                                    <li><a href="{{ url('admin/customers') }}">Customers</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="true">Promo <i class="fa fa-caret-down"></i></a>

                            <div class="custom-menu">
                                <ul class="list-links">
                                    <li>
                                        <h3 class="list-links-title">Promo & Coupon</h3>
                                    </li>
                                    <li><a href="{{ url('admin/promotions') }}">Promotions</a></li>
                                    <li><a href="{{ url('admin/coupons') }}">Coupons</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="true">Roles <i class="fa fa-caret-down"></i></a>

                            <div class="custom-menu">
                                <ul class="list-links">
                                    <li>
                                        <h3 class="list-links-title">Roles & Permissions</h3>
                                    </li>
                                    <li><a href="{{ url('admin/roles') }}">Roles</a></li>
                                    <li><a href="{{ url('admin/permissions') }}">Permission</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="{{ url('/admin/settings') }}">Settings</a></li>

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
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include jQuery UI -->
    <link rel="stylesheet"
        href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>




    <script type="text/javascript">
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd" // Định dạng ngày
            });
            $("#datepicker2").datepicker({
                dateFormat: "yy-mm-dd" // Định dạng ngày
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var chart = new Morris.Area({
                // ID of the element in which to draw the chart.
                element: 'myfirstchart',
                //option chart
                lineColors: ["#blue", "#red"],
                pointFillColors: ['#fffffff'],
                fillStrokeColors: ['#black'],

                hideHover: "auto",
                parseTime: false,
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [{
                        year: '2008',
                        value: 20
                    },
                    {
                        year: '2009',
                        value: 10
                    },
                    {
                        year: '2010',
                        value: 5
                    },
                    {
                        year: '2011',
                        value: 5
                    },
                    {
                        year: '2012',
                        value: 20
                    }
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'year',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['value'],
                behaveLinkeLine: true,
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Value']
            });




            $('#btn-dashboard-filter').click(function() {
                // alert("oke đã nhận");g
                var _token = $('input[name="_token"]').val();
                var from_date = $('#datepicker').val();
                var to_date = $('#datepicker2').val();
                // alert(from_date);
                // alert(to_date);
                $.ajax({
                    url: "{{ url('/admin/dashboard/filter-by-date') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        from_date: from_date,
                        to_date: to_date,
                        _token: _token
                    },

                    success: function(data) {
                        chart.setData(data);
                    }

                });
            });




        });
    </script>


</body>

</html>
