<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>{{$title}}</title>

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
	

	<!-- Sweetalert Css -->
	<link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Import jQuery -->
	
</head>
<style>
	.header-btns-container {
		display: inline-block;
		vertical-align: middle;
	}

	.header-btn {
		display: inline-block;
		margin-right: 10px; /* Điều chỉnh khoảng cách giữa các phần tử nút */
	}
	/* CSS cho dropdown menu */
	.category-nav {
            position: relative;
        }

        .category-header {
            cursor: pointer;
        }

        .category-list {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            list-style: none;
            padding: 0;
        }

        .category-list li {
            padding: 10px;
        }

        .category-list li a {
            text-decoration: none;
            color: #333;
        }

        .category-list li a:hover {
            background-color: #f4f4f4;
        }

        .category-nav:hover .category-list {
            display: block;
        }

</style>

<body>
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span><b>Welcome to G-shop!</b></span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<li><a href="#">Trang chủ</a></li>
						<li><a href="#">Bản tin</a></li>
						<li><a href="#">Hỏi đáp</a></li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">VN <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">English (ENG)</a></li>
								<li><a href="#">Vietnam (VN)</a></li>
								
							</ul>
						</li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">VNĐ <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">USD ($)</a></li>
								<li><a href="#">VNĐ (đ)</a></li>
							</ul>
						</li>
					</ul>
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
						<a class="logo" href="{{route('index')}}">
							<img src="{{ asset('/images/logo.png') }}" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						

						<form>
							<input class="input search-input" type="text" placeholder="Tìm kiếm sản phẩm">
							<select class="input search-categories">
								<option value="0">All Categories</option>
								@php
									$sub_menu = DB::table('sub_menu')->get();
								@endphp
								@foreach($sub_menu as $sub_menu)
									<option value="{{ $sub_menu->id_sub }}">{{ $sub_menu->name_sub }}</option>
								@endforeach
							
							</select>
							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						
						<!-- Account -->
						<div class='col-3 p-0 d-flex justify-content-end'>
							@auth
								<div class="dropdown">
									<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
									{{ Auth::user()->name }}
									</button>
									<div class="dropdown-menu">
									<a class="dropdown-item" href="{{route('account')}}">Quản lý</a>
									<form method="POST" action="{{ route('logout') }}">
										@csrf
										<a class="dropdown-item" onclick="event.preventDefault();
															this.closest('form').submit();">Đăng xuất</a>
									</form>
									</div>
								</div>
							@else 
								<a href="{{ route('login') }}">
									<button class='btn btn-sm btn-primary'>Đăng nhập</button>
								</a>&nbsp;
								<a href="{{ route('register') }}">
									<button class='btn btn-sm btn-success'>Đăng ký</button>
								</a>
							@endauth
                		</div>
						{{--<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">Tài khoản<i class="fa fa-caret-down"></i></strong>
							</div>

							<a href="{{route('login')}}" class="text-uppercase">Đăng nhập</a> / <a href="{{route('register')}}" class="text-uppercase">Đăng ký</a>
							<ul class="custom-menu">
								<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
								<li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>
								<li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
								<li><a href="#"><i class="fa fa-unlock-alt"></i> Login</a></li>
								<li><a href="#"><i class="fa fa-user-plus"></i> Create An Account</a></li>
							</ul> --}}
						</li>
						<!-- /Account -->
						<!--  -->
						

						<!-- Cart -->
						
						
					<li class="header-cart dropdown default-dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" >
							<div class="header-btns-icon">
								<i class="fa fa-shopping-cart"></i>
								<span class="qty" id="cart-number-product">
								@if (session('cart'))
									{{count(session('cart'))}}
								@else
									0
								@endif
								</span>
							</div>
							<strong class="text-uppercase">Giỏ hàng:</strong>
							<br>
							<span>35.20$</span>
						</a>
						
						<div class="custom-menu">
							<div id="shopping-cart1">
								
								

								<div class="shopping-cart-btns">
									<a href="{{asset('/giohang')}}"><button class="main-btn">View Cart</button></a>
									<button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
								</div>
							</div>
						</div>
					</li>
					
						<!-- /Cart -->
						



						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
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
				<!-- category nav -->
				<div class="category-nav">
                <span class="category-header">Categories <i class="fa fa-list"></i></span>
                <ul class="category-list">
                    @php
                        $sub_menu = DB::table('sub_menu')->get();
                    @endphp
                    @foreach($sub_menu as $sub_menu)
                        <li><a href="{{url('/users/theloai/'.$sub_menu->id_sub)}}" aria-expanded="true">{{$sub_menu->name_sub}}  <i class="fa fa-angle-right"></i></a></li>
                    @endforeach
					<li><a href="#" aria-expanded="true">Tất cả  <i class="fa fa-angle-right"></i></a></li>
                </ul>
           	 </div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="#">Home</a></li>
						<li><a href="#">Shop</a></li>
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Women <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="./img/banner05.jpg" alt="">
											<div class="banner-caption text-center">
												<h2 class="white-color">NEW COLLECTION</h2>
												<h3 class="white-color font-weak">HOT DEAL</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Men <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="./img/banner06.jpg" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Women’s</h3>
												</div>
											</a>
											<hr>
										</div>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="./img/banner07.jpg" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Men’s</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="./img/banner08.jpg" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Accessories</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="./img/banner09.jpg" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Bags</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li><a href="#">Sales</a></li>
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Pages <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="index.html">Home</a></li>
								<li><a href="products.html">Products</a></li>
								<li><a href="product-page.html">Product Details</a></li>
								<li><a href="checkout.html">Checkout</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->
	<div class="row">
	{{$slot}}
	</div>
	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img src="./images/logo.png" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>Chào mừng bạn đến với dự án website bán hàng của nhóm 5 lớp DH37CDS01! <br>Chúng tôi là một nhóm các sinh viên 
							đam mê với công nghệ và mong muốn tạo ra một trải nghiệm mua sắm trực tuyến độc đáo và thuận tiện cho người dùng.</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">My Account</h3>
						<ul class="list-links">
							<li><a href="#">My Account</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Compare</a></li>
							<li><a href="#">Checkout</a></li>
							<li><a href="#">Login</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Customer Service</h3>
						<ul class="list-links">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Shiping & Return</a></li>
							<li><a href="#">Shiping Guide</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join Newslatter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/slick.min.js') }}"></script>
	<script src="{{ asset('js/nouislider.min.js') }}"></script>
	<script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>

	<!-- Jquery sweetalert -->
	<script src="{{ asset('js/sweetalert.min.js') }}"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.add-to-cart').click(function(){
				var id= $(this).data('id_product');
				var cart_product_id = $('.cart_product_id_'+ id).val();
				var cart_product_name = $('.cart_product_name_'+ id).val();
				var cart_product_price = $('.cart_product_price_'+ id).val();
				var cart_product_image = $('.cart_product_image_'+ id).val();
				var cart_product_qty = $('.cart_product_qty_'+ id).val();
				var _token = $('input[name="_token"]').val();

				// alert(cart_product_price);
				$.ajax({
					url: '/add-cart-ajax',
					method: "POST",
					data: {cart_product_id:cart_product_id, cart_product_name:cart_product_name, cart_product_image:cart_product_image,
						cart_product_price:cart_product_price, cart_product_qty:cart_product_qty,
						_token:_token},
					success: function(data) {
							// Hiển thị thông báo thành công
							swal("Good job!", "Bạn đã thêm sản phẩm vào giỏ hàng!", "success");

							// Cập nhật số lượng sản phẩm trong giỏ hàng
							$('#cart-number-product').text(data.cart_count);

							// Cập nhật nội dung của phần tử giỏ hàng với nội dung mới từ view blade
							$('#shopping-cart1').html(data.cart_html);
							
						},
						error: function(xhr, status, error) { // Xử lý khi có lỗi xảy ra
               			 console.error('Đã xảy ra lỗi: ' + error);
                // Xử lý lỗi nếu cần
            }
				
				});

		
		});
	});

	</script>
</body>

	

</html>

    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
