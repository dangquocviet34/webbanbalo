<x-index-layout>
  <x-slot name='title'>
    Thể loại
  </x-slot>
  <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
	<div class="row">
	<div class="list-sanpham">
		@foreach ($data as $sanpham)
		<div class="sanpham">
			
		<a href="{{url('/chitiet/'.$sanpham->id_sub)}}">
			<!-- Product Single -->
							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="product product-single">
									<div class="product-thumb">
										<div class="product-label">
											<span>New</span>
											
										</div>
										<a href="{{url('users/chitiet/'.$sanpham->id_sanpham)}}"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button></a>
										<img src="{{asset('images/'.$sanpham->image_sp)}}" alt="">
									</div>
									<div class="product-body">
										<h3 class="product-price">{{number_format((float)$sanpham->price,0,",",".")}}đ <del class="product-old-price">{{number_format((float)$sanpham->price,0,",",".")}}đ </del></h3>
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
											<a href="{{url('/users/cartadd/'.$sanpham->id_sanpham)}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Car</a>
										</div>
									</div>
								</div>
							</div>
				<!-- /Product Single -->
			</a>
		</div>
			@endforeach
		</div>
	</div>

  </x-index-layout>