<x-index-layout>
	<x-slot name="title">
		Trang chủ
	</x-slot>

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
			<!-- @php
				$discount = DB::select("SELECT SP.*, DC.*, ROUND((SP.price * (100-DC.discount_value)) / 100) AS discount_total 
										FROM sanpham AS SP	JOIN discount AS DC ON SP.id_sanpham = DC.id_sanpham
										WHERE  DC.start_date <= CURRENT_DATE() AND DC.end_date >= CURRENT_DATE()
										ORDER BY DC.discount_value DESC");

			@endphp
			@php
				$grouped_discounts = collect($discount)->groupBy('discount_value');
			@endphp -->
					
			
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
							
			
							@foreach ($group as $discount)
							<div id="product-slick-1" class="product-slick">
							
								<!-- Product Single -->
								<div class="product product-single" >
									<div class="product-thumb">
										<div class="product-label">
											<span>New</span>
											<span class="sale">- ({{$discount->discount_value}}) %</span>
										</div>
										
										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
										<img src="{{asset('images/'.$discount->image_sp)}}" alt="{{$discount->parent_name_sub}}" >
									</div>
									<div class="product-body">
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
											<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
										</div>
									</div>
								</div>
								
								</div>
							@endforeach
							
						</div>
					</div>
					<!-- /Product Slick -->
				
				@endforeach
				</div>
				
				<!-- /row -->


				<!-- row -->
				<div class="row">
					<!-- section title GIẢM GIÁ THẤP-->
					<div class="col-md-12">
						<div class="section-title">
							<h2 class="title">Deals Of The Day 3262</h2>
							<div class="pull-right">
								<div class="product-slick-dots-2 custom-dots">
								</div>
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
												<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
											</div>
										</div>
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
					<!-- banner Túi XÁCH-->
					<!-- <div class="col-md-3 col-sm-6 col-xs-6">
						<div class="banner banner-2">
							<img src="./img/banner15.jpg" alt="">
							<div class="banner-caption">
								<h2 class="white-color">NEW<br>COLLECTION</h2>
								<button class="primary-btn">Shop Now</button>
							</div>
						</div>
					</div> -->
					<!-- /banner -->

					<!-- @php 
						$sptuixach =  DB::select("SELECT * FROM `sanpham` WHERE parent_name_menu = 'túi xách'")
					@endphp -->


					@foreach ($sptuixach as $tuixach)
						<!-- Product Single -->
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="product product-single">
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
										<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</div>
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