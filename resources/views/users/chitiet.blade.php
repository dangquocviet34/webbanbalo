<x-index-layout>
<x-slot name='title'>
    Chi tiết
  </x-slot>


<link type="text/css" rel="stylesheet" href="css/style.css" />
@foreach($data as $sanpham)
    <div class="text-center">
    <div class="row">
    <div class="product product-details clearfix">
                        <div class="col-md-6">
                            <div id="product-main-view">
                                <div class="product-view">
                                    <img src="{{asset('images/'.$sanpham->image_sp)}}" alt="">
                                    </div>
                                    </div>
                                    </div>
                                
                            
    <div class="col-md-6">
                            <div class="product-body">
                                <div class="product-label">
                                    <span>New</span>
                                    <span class="sale"> </span> 
                                    <!-- Giảm giá -->
                                </div>
                                <h2 class="product-name">{{$sanpham->tensp}}</h2> <!-- tên sản phẩm -->
                                <h3 class="product-price"><!--giá mới --> <del class="product-old-price"><!-- giá cũ --></del></h3>
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
                                <p><strong>Giá</strong> {{$sanpham->price}}</p>
                                <p><strong>Màu sắc</strong> {{$sanpham->mausac}}</p>
                                <p><strong>Nhãn hiệu:</strong> G-SHOP</p>
                                <p><strong>Xuất xứ:</strong> {{$sanpham->xuatxu}}</p>
                                <p>{{$sanpham->content}}</p><br>
                                <div class="product-options">
                                    <ul class="size-option">
                                        <li><span class="text-uppercase">Size:</span></li>
                                        <li class="active"><a href="#">S</a></li>
                                        <li><a href="#">XL</a></li>
                                        <li><a href="#">SL</a></li>
                                    </ul>
                                    
                                </div>

                                <div class="product-btns">
                                    <div class="qty-input">
                                        <span class="text-uppercase">QTY: </span>
                                        <input class="input" type="number">
                                    </div>
                                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                    <div class="pull-right">
                                        <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                                    </div>
                                </div>
                            </div>
        </div>
        </div>
    </div>
    </div>
    </div>

@endforeach
</x-index-layout>
