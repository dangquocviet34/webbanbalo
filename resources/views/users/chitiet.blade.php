<x-index-layout>
<x-slot name='title'>
    Chi tiết
  </x-slot>


  <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
  @foreach($data as $sanpham)
  <!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
            <form >
                @csrf
                <input type="hidden" value="{{$sanpham->id_sanpham}}" class="cart_product_id_{{$sanpham->id_sanpham}}">
                <input type="hidden" value="{{$sanpham->tensp}}" class="cart_product_name_{{$sanpham->id_sanpham}}">
                <input type="hidden" value="{{$sanpham->image_sp}}" class="cart_product_image_{{$sanpham->id_sanpham}}">
                <input type="hidden" value="{{$sanpham->discount_total}}" class="cart_product_price_{{$sanpham->id_sanpham}}">
                <input type="hidden" value="1" class="cart_product_qty_{{$sanpham->id_sanpham}}">

				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<img src="{{asset('images/'.$sanpham->image_sp)}}" alt="">
							</div>
                            <div class="product-view">
								<img src="{{asset('images/'.$sanpham->image_sp)}}" alt="">
							</div>
                            <div class="product-view">
								<img src="{{asset('images/'.$sanpham->image_sp)}}" alt="">
							</div>
							
						</div>
						<div id="product-view">
							<div class="product-view">
								<img src="{{asset('images/'.$sanpham->image_sp)}}" alt="">
							</div>
                            <div class="product-view">
								<img src="{{asset('images/'.$sanpham->image_sp)}}" alt="">
							</div>
                            <div class="product-view">
								<img src="{{asset('images/'.$sanpham->image_sp)}}" alt="">
							</div>
							
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<div class="product-label">
								<span>New</span>
                                @php 
                                  if($sanpham->discount_value!=NULL)
                                    $discount = intval($sanpham->discount_value);
                                 else
                                    $discount = 0;

                                @endphp
                                
								<span class="sale">-{{$discount}}%</span>
							</div>
							<h2 class="product-name">{{$sanpham->tensp}}</h2>
							<h3 class="product-price">{{number_format((float)$sanpham->discount_total,0,",",".")}}đ <del class="product-old-price">{{number_format((float)$sanpham->price,0,",",".")}}đ </del></h3>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<a href="#">3 Review(s) / Add Review</a>
							</div>
							<p><strong>Availability:</strong> In Stock</p>
							<p><strong>Xuất xứ:</strong> {{$sanpham->xuatxu}}</p>
							<p>{{$sanpham->content}}</p>
                          
							<div class="product-options">
                                @php
                                 $datasize =  explode(',', $sanpham->sizess);


                                @endphp
								<ul class="size-option">
									<li><span class="text-uppercase">Size:</span></li>
                                    @foreach($datasize as $datasize)
                                        <li><a href="#">{{$datasize}}</a></li>

                                    @endforeach
									
								</ul>
								<ul class="color-option">
									<li><span class="text-uppercase">Color: <b>{{$sanpham->mausac}}</b></span></li>
									
								</ul>
							</div>

							<div class="product-btns">
								<div class="qty-input">
									<span class="text-uppercase">QTY: </span>
									<input class="input" type="number" value="1">
								</div>
								<button type="button" class="primary-btn add-to-cart" data-id_product="{{$sanpham->id_sanpham}}" name="add-to-cart"><i class="fa fa-shopping-cart" ></i> Add to Car </button>
									
								<div class="pull-right">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab1">Details</a></li>
								<li><a data-toggle="tab" href="#tab2">Reviews (3)</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<p>{{$sanpham->content}}</p>
								</div>
								<div id="tab2" class="tab-pane fade in">

									<div class="row">
										<div class="col-md-6">
											<div class="product-reviews">
												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<ul class="reviews-pages">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="col-md-6">
											<h4 class="text-uppercase">Write Your Review</h4>
											<p>Your email address will not be published.</p>
											<form class="review-form">
												<div class="form-group">
													<input class="input" type="text" placeholder="Your Name" />
												</div>
												<div class="form-group">
													<input class="input" type="email" placeholder="Email Address" />
												</div>
												<div class="form-group">
													<textarea class="input" placeholder="Your review"></textarea>
												</div>
												<div class="form-group">
													<div class="input-rating">
														<strong class="text-uppercase">Your Rating: </strong>
														<div class="stars">
															<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
															<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
															<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
															<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
															<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
														</div>
													</div>
												</div>
												<button class="primary-btn">Submit</button>
											</form>
										</div>
									</div>



								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
                </form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endforeach


</x-index-layout>
