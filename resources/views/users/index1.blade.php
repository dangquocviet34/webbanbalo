<x-index-layout>
	<x-slot name="title">
		Thể loại
	</x-slot>

	<div class="row">
	<div class="list-sanpham">
		@foreach ($data as $sanpham)
		<div class="sanpham">
			
		<a href="{{url('/chitiet/'.$sanpham->id_sub)}}">
			<!-- Product Single -->
							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="product product-single">
									<form >
										@csrf
										<input type="hidden" value="{{$sanpham->id_sanpham}}" class="cart_product_id_{{$sanpham->id_sanpham}}">
										<input type="hidden" value="{{$sanpham->tensp}}" class="cart_product_name_{{$sanpham->id_sanpham}}">
										<input type="hidden" value="{{$sanpham->image_sp}}" class="cart_product_image_{{$sanpham->id_sanpham}}">
										<input type="hidden" value="{{$sanpham->discount_total}}" class="cart_product_price_{{$sanpham->id_sanpham}}">
										<input type="hidden" value="1" class="cart_product_qty_{{$sanpham->id_sanpham}}">


									
									<div class="product-thumb">
										<div class="product-label">
											<span>New</span>
											
										</div>
										<a href="{{url('users/chitiet/'.$sanpham->id_sanpham)}}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
										<img src="{{asset('images/'.$sanpham->image_sp)}}" alt="">
									</div>
									<div class="product-body">
										<h3 class="product-price">{{number_format((float)$sanpham->discount_total,0,",",".")}}đ <del class="product-old-price">{{number_format((float)$sanpham->price,0,",",".")}}đ </del></h3>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o empty"></i>
										</div>
										<h2 class="product-name"><a href="#">{{$sanpham->tensp}}</a></h2>
										<div class="product-btns">
											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
											<!-- <a href="{{url('/users/cartadd/'.$sanpham->id_sanpham)}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Car</a> -->
											<button type="button" class="primary-btn add-to-cart" data-id_product="{{$sanpham->id_sanpham}}" name="add-to-cart"><i class="fa fa-shopping-cart" ></i> Add to Car </button>
										</div>
									</div>
									</form>
								</div>
							</div>
				<!-- /Product Single -->
			</a>
		</div>
			@endforeach
		</div>
	</div>

  </x-index-layout>