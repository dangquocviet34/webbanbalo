<x-index-layout>
	<x-slot name="title">
		Trang chủ
	</x-slot>
	

	
	<style>
		.product-slick {
    margin-bottom: 30px; /* Add some bottom margin to create space between product rows */
}

.product {
    margin-bottom: 30px; /* Add some bottom margin to create space between products */
}

.product-thumb {
    position: relative;
}

.product-label {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 1;
}

.product-label span {
    display: block;
    padding: 5px 10px;
    background-color: #ff0000; /* Choose your desired background color */
    color: #fff;
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase;
}

.product-price {
    font-size: 18px;
    font-weight: bold;
    margin-top: 10px;
}

.product-old-price {
    color: #999; /* Color for old price */
    text-decoration: line-through;
    margin-left: 5px;
}

.product-rating {
    margin-bottom: 10px;
}

.product-name {
    font-size: 16px;
    margin-bottom: 10px;
}

.product-btns {
    margin-top: 10px;
}

.primary-btn {
    background-color: #ff0000; /* Choose your desired background color */
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 14px;
    text-transform: uppercase;
    font-weight: bold;
}

.primary-btn:hover {
    background-color: #cc0000; /* Choose a darker shade for hover effect */
}
.product.product-single {
    height: 100%; /* Đảm bảo các div có chiều cao bằng nhau */
    display: flex; /* Sử dụng flexbox để căn giữa nội dung */
    flex-direction: column; /* Định hình nội dung theo chiều dọc */
    justify-content: space-between; /* Canh giữa nội dung dọc */
}
.product-body {
    height: 100%; /* Đảm bảo các div có chiều cao bằng nhau */
    display: flex; /* Sử dụng flexbox để căn giữa nội dung */
    flex-direction: column; /* Định hình nội dung theo chiều dọc */
    justify-content: space-between; /* Canh giữa nội dung dọc */
}



	</style>

	<div class="trangchu">
		<!-- HOME -->
		<div id="home">
			<!-- container -->
			<div class="container">
				<!-- home wrap -->
				<div class="home-wrap">
					<!-- home slick -->
					<div id="home-slick">
						<!-- banner -->
						<!-- @php
							$banner = DB::table('banner')->get();
						@endphp -->
						@foreach($banner as $row)
							
							<!-- banner -->
							<div class="banner banner-1">
								<img src="{{asset('images/banner/'.$row->link_banner)}}" alt="">
								<div class="banner-caption">
									
									<button class="primary-btn">MUA NGAY</button>
								</div>
							</div>
						<!-- /banner -->
						@endforeach
					
					</div>
					<!-- /home slick -->
				</div>
				<!-- /home wrap -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOME -->

		


		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				@foreach ($grouped_discounts as $discount_value => $group)
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Deals Of The Day ({{$discount_value}} %)</h2>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="./img/banner14.jpg" alt="">
						<div class="banner-caption">
							<h2 class="white-color">NEW<br>COLLECTION</h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-1" class="product-slick">
							@foreach ($group as $discount)
							<!-- Product Single -->
							<div class="product product-single" style="height:30%">
							<form >
										@csrf
										<input type="hidden" value="{{$discount->id_sanpham}}" class="cart_product_id_{{$discount->id_sanpham}}">
										<input type="hidden" value="{{$discount->tensp}}" class="cart_product_name_{{$discount->id_sanpham}}">
										<input type="hidden" value="{{$discount->image_sp}}" class="cart_product_image_{{$discount->id_sanpham}}">
										<input type="hidden" value="{{$discount->discount_total}}" class="cart_product_price_{{$discount->id_sanpham}}">
										<input type="hidden" value="1" class="cart_product_qty_{{$discount->id_sanpham}}">

								<div class="product-thumb">
									<div class="product-label">
										<span>New</span>
										<span class="sale">- ({{$discount->discount_value}}) %</span>
									</div>
									<ul class="product-countdown">
										<li><span>00 H</span></li>
										<li><span>00 M</span></li>
										<li><span>00 S</span></li>
									</ul>
									<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
									<img src="{{asset('images/'.$discount->image_sp)}}" alt="{{$discount->parent_name_sub}}" >
								</div>
								<div class="product-body" >
									<h3 class="product-price">{{number_format((float)$discount->discount_total,0,",",".")}}đ <del class="product-old-price">{{number_format((float)$discount->price,0,",",".")}}đ</del></h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
									<h2 class="product-name"><a href="#">{{$discount->tensp}}</a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<button type="button" class="primary-btn add-to-cart" data-id_product="{{$discount->id_sanpham}}" name="add-to-cart"><i class="fa fa-shopping-cart" ></i> Add to Car </button>
										</div>
									</div>
									</form>
							</div>
							@endforeach
							<!-- /Product Single -->

						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			@endforeach
			
						
				
				
				<!-- Giảm giá -->
				
				<!-- row -->
				<div class="row">
					<!-- section title GIẢM GIÁ THẤP-->
					<div class="col-md-12">
						<div class="section-title">
							<h2 class="title">Deals Of The Day 3262</h2>
							<div class="pull-right">
								<div class="product-slick-dots-2 custom-dots"></div>
							</div>
						</div>
					</div>
					<!-- section title -->

					
					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single product-hot">
							<div class="product-thumb">
								<div class="product-label">
									<span class="sale"><img src="./img/banner15.jpg" alt="" width="100%">
									<br><center><h2>Túi xách</h2></center></span>
									
								</div>
								
								
								
							</div>
							<div class="product-body">
								<h3 class="product-price"> <del class="product-old-price"></del></h3>
								
								<h2 class="product-name"><a href="#"></a></h2>
								
							</div>
						</div>
					</div>
					<!-- /Product Single -->

					<!-- Product Slick -->
					<div class="col-md-9 col-sm-6 col-xs-6">
						<div class="row">
							<div id="product-slick-2" class="product-slick">
								<!-- @php 
									$balo_Vi =  DB::select("SELECT * FROM `sanpham` WHERE parent_name_menu = 'balo -ví'")
								@endphp -->


								@foreach ($balo_Vi as $row)
									<!-- Product Single -->
									<div class="product product-single">
									<form >
										@csrf
										<input type="hidden" value="{{$row->id_sanpham}}" class="cart_product_id_{{$row->id_sanpham}}">
										<input type="hidden" value="{{$row->tensp}}" class="cart_product_name_{{$row->id_sanpham}}">
										<input type="hidden" value="{{$row->image_sp}}" class="cart_product_image_{{$row->id_sanpham}}">
										<input type="hidden" value="{{$row->discount_total}}" class="cart_product_price_{{$row->id_sanpham}}">
										<input type="hidden" value="1" class="cart_product_qty_{{$row->id_sanpham}}">

										<div class="product-thumb">
											<div class="product-label">
												<span>New</span>
												<span class="sale"></span>
											</div>
											<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
											<img src="{{asset('images/'.$row->image_sp)}}" alt="">
										</div>
										<div class="product-body">
											<h3 class="product-price">{{number_format((float)$row->price,0,",",".")}}đ <del class="product-old-price">{{number_format((float)$row->price,0,",",".")}}đ </del></h3>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o empty"></i>
											</div>
											<h2 class="product-name"><a href="#">{{$row->tensp}}</a></h2>
											<div class="product-btns">
												<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
												<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
												<button type="button" class="primary-btn add-to-cart" data-id_product="{{$row->id_sanpham}}" name="add-to-cart"><i class="fa fa-shopping-cart" ></i> Add to Car </button>
										</div>
									</div>
									</form>
									</div>
									<!-- /Product Single -->
								@endforeach

							</div>
							
						</div>
					</div>
					<!-- /Product Slick -->
				</div>
				<!-- /row -->
				

			
				
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->



		<!-- section -->
		<div class="section section-grey">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- banner -->
					<div class="col-md-8">
						<div class="banner banner-1">
							<img src="./img/banner13.jpg" alt="">
							<div class="banner-caption text-center">
								<h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
								<button class="primary-btn">Shop Now</button>
							</div>
						</div>
					</div>
					<!-- /banner -->

					<!-- banner -->
					<div class="col-md-4 col-sm-6">
						<a class="banner banner-1" href="#">
							<img src="./img/banner11.jpg" alt="">
							<div class="banner-caption text-center">
								<h2 class="white-color">NEW COLLECTION</h2>
							</div>
						</a>
					</div>
					<!-- /banner -->

					<!-- banner -->
					<div class="col-md-4 col-sm-6">
						<a class="banner banner-1" href="#">
							<img src="./img/banner12.jpg" alt="">
							<div class="banner-caption text-center">
								<h2 class="white-color">NEW COLLECTION</h2>
							</div>
						</a>
					</div>
					<!-- /banner -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->


		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h2 class="title">Latest Products</h2>
						</div>
					</div>
					<!-- section title -->

					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
								<img src="./img/product01.jpg" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /Product Single -->

					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<div class="product-label">
									<span>New</span>
									<span class="sale">-20%</span>
								</div>
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
								<img src="./img/product02.jpg" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /Product Single -->

					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<div class="product-label">
									<span>New</span>
									<span class="sale">-20%</span>
								</div>
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
								<img src="./img/product03.jpg" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /Product Single -->

					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<div class="product-label">
									<span>New</span>
								</div>
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
								<img src="./img/product04.jpg" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /Product Single -->
				</div>
				<!-- /row -->


				<div class="row">
					


					@foreach ($sptuixach as $tuixach)
						<!-- Product Single -->
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="product product-single">
							<form >
										@csrf
										<input type="hidden" value="{{$tuixach->id_sanpham}}" class="cart_product_id_{{$tuixach->id_sanpham}}">
										<input type="hidden" value="{{$tuixach->tensp}}" class="cart_product_name_{{$tuixach->id_sanpham}}">
										<input type="hidden" value="{{$tuixach->image_sp}}" class="cart_product_image_{{$tuixach->id_sanpham}}">
										<input type="hidden" value="{{$tuixach->discount_total}}" class="cart_product_price_{{$tuixach->id_sanpham}}">
										<input type="hidden" value="1" class="cart_product_qty_{{$tuixach->id_sanpham}}">


								<div class="product-thumb">
									<div class="product-label">
										<span>New</span>
										
									</div>
									<a href=""><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button></a>
									<img src="{{asset('images/'.$tuixach->image_sp)}}" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">{{number_format((float)$tuixach->price,0,",",".")}}đ <del class="product-old-price">{{number_format((float)$tuixach->price,0,",",".")}}đ </del></h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
									<h2 class="product-name"><a href="#">{{$tuixach->tensp}}</a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<button type="button" class="primary-btn add-to-cart" data-id_product="{{$tuixach->id_sanpham}}" name="add-to-cart"><i class="fa fa-shopping-cart" ></i> Add to Car </button>
										</div>
									</div>
									</form>
							</div>
						</div>
						<!-- /Product Single -->

					@endforeach
					


					
				</div>
				<!-- /row -->

				<
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
	</div>
	
</x-index-layout>