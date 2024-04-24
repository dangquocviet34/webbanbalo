<x-index-layout>
<x-slot name='title'>
    Chi tiết
  </x-slot>


  <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
@foreach($data as $sanpham)
    <div class="text-center">
    <div >
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
                                        <input class="input" type="number"  id='product-number' size='5' min="1" value="1">
                                    </div>
                                    <button class="primary-btn add-to-cart" data-id="{{$sanpham->id_sanpham}}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>

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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
$(document).ready(function(){
    $(".add-to-cart").click(function(){
        var id_sp = $(this).data("id"); // Lấy id_sanpham từ thuộc tính dữ liệu của nút
        var num = $("#product-number").val()
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{route('cartadd')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id_sp": id_sp,
                "num": num
            },
            beforeSend: function(){
            },
            success: function(data){
                $("#cart-number-product").html(data);
            },
            error: function (xhr, status, error){
            },
            complete: function(xhr, status){
            }
        });
    });
});
</script>

</x-index-layout>
