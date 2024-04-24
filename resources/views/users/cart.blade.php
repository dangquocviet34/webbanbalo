@if(@$newCart !=null)
<p>OKEE</p>
    <div class="shopping-cart-list">
        <div class="product product-widget">
            <div class="product-thumb">
                <img src="{{asset('/img/thumb-product01.jpg')}}" alt="">
            </div>
            <div class="product-body">
                <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
            </div>
            <button class="cancel-btn"><i class="fa fa-trash"></i></button>
        </div>
        
    </div>


    <div class="shopping-cart-btns">
        <button class="main-btn">View Cart</button>
        <button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
    </div>
 @endif  

								