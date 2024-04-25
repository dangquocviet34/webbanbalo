
<div class="shopping-cart-list">
    @foreach($cart as $item)
        <div class="product product-widget">
            <div class="product-thumb">
                
            </div>
            <div class="product-body">
                <h3 class="product-price"> {{number_format((float)$item->discount_total,0,",",".")}}đ<span class="qty">x3</span></h3>
                <h2 class="product-name"><a href="#">{{$item->tensp}}</a></h2>
            </div>
            <button class="cancel-btn"><i class="fa fa-trash"></i></button>
        </div>
    @endforeach
    
</div>