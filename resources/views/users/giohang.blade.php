<x-index-layout>
    <x-slot name="title">
        Giỏ hàng    
    </x-slot>

    <div class="section">
        <div class="container">
            <div class="row">
                <!-- BREADCRUMB -->
                <div id="breadcrumb">
                    <div class="container">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Checkout</li>
                        </ul>
                    </div>
                </div>
                <!-- /BREADCRUMB -->
                
                <div class="col-md-12">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-danger">
                            {{session()->get('error')}}
                        </div>
                    @endif

                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">Order Review</h3>
                        </div>
                        
                        @auth
                            @if(count($data)>0)
                            <form action="{{ route('ordercreate') }}" method="POST">
                            <!--<form method='post' action="{{url('/order/create')}}">-->
                                <table class="shopping-cart-table table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th></th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $tongTien = 0;
                                        @endphp
                                        @foreach($cart as $item)
                                           
                                                <tr>
                                                    <td class="thumb"><img src="{{asset('images/'.$item['product_image'])}}" alt="{{$item['product_image']}}"></td>
                                                    <td class="details">
                                                        <a href="#">{{$item['product_name']}}</a>
                                                        <ul>
                                                            <li><span>Size: XL</span></li>
                                                            <li><span>Color: Camelot</span></li>
                                                        </ul>
                                                    </td>
                                                    <td class="price text-center"><strong>{{number_format($item['product_price'],0,',','.')}}đ</strong><br><del class="font-weak"><small>{{number_format($item['product_price'],0,',','.')}}đ</small></del></td>
                                                    <td class="qty text-center"><input class="input" type="number" value="{{$item['product_qty']}}"></td>
                                                    <td class="total text-center"><strong class="primary-color">{{number_format($item['product_price']*$item['product_qty'],0,',','.')}}đ</strong></td>
                                                    <td class="text-right">
                                                        <a href="{{url('/delete_cart/'.$item['session_id'])}}" class="main-btn icon-btn"><i class="fa fa-close"></i></a>
                                                    </td>
                                                </tr>
                                                
                                                @php
                                                    $tongTien += $item['product_price']*$item['product_qty'];
                                                @endphp
                                            
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="empty" colspan="3"></th>
                                            <th>SUBTOTAL</th>
                                            <th colspan="2" class="sub-total">{{number_format($tongTien,0,',','.')}}đ</th>
                                        </tr>
                                        <tr>
                                            <th class="empty" colspan="3"></th>
                                            <th>SHIPING</th>
                                            <td colspan="2">Free Shipping</td>
                                        </tr>
                                        <tr>
                                            <th class="empty" colspan="3"></th>
                                            <th>TOTAL</th>
                                            <th colspan="2" class="total">{{number_format($tongTien,0,',','.')}}đ</th>
                                        </tr>
                                        <tr>
                                            <th class="empty" colspan="3"></th>
                                            <th>Hình thức thanh toán</th>
                                            <th colspan="2">
                                                <div class='d-inline-flex'>
                                                    <select name='hinh_thuc_thanh_toan' class='form-control form-control-sm'>
                                                        <option value='1'>Tiền mặt</option>
                                                        <option value='2'>Chuyển khoản</option>
                                                        <option value='3'>Thanh toán VNPay</option>
                                                    </select>
                                                </div><br>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
									<!-- Cái dòng dưới này để tính tổng của đơn hàng để nó tự hiện giá tiền cần thanh toán-->
								<input type="hidden" name="total_vnpay" value="{{ $tongTien }}">
								<input class="pull-right primary-btn" type="submit" name="redirect" class='btn btn-sm btn-primary mt-1' value='ĐẶT HÀNG'>
                                <!--<input class="pull-right primary-btn" type='submit' class='btn btn-sm btn-primary mt-1' value='ĐẶT HÀNG'>-->
                                {{ csrf_field() }}
                            </form>
                            @else
                                <h3>Vui lòng chọn sản phẩm cần mua</h3>
                            @endif

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
	

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
               

				<form id="checkout-form" class="clearfix">
                    @csrf
                    <!-- Hiển thị tên người dùng nếu đã đăng nhập -->
                   
                    <div class="col-md-6">
						<div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Shiping Methods</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-1" checked>
								<label for="shipping-1">Free Shiping -  $0.00</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-2">
								<label for="shipping-2">Standard - $4.00</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
						</div>

						<!-- <div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Payments Methods</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-1" checked>
								<label for="payments-1">Direct Bank Transfer</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-2">
								<label for="payments-2">Cheque Payment</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-3">
								<label for="payments-3">Paypal System</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
						</div> -->
					</div>
                    
					<div class="col-md-6">
						<div class="billing-details">
                        <h3 class="title">Billing Details</h3>
							
							<div class="form-group">
								<input class="input" type="text" name="name" placeholder="First Name" value="{{ auth()->user()->fullname }} ">
                                <!-- <input id="name" type="text" name="name" value="{{ auth()->user()->name }}" required autofocus autocomplete="name"> -->
							</div>
							
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email" value="{{ auth()->user()->email }}">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address"value="{{ auth()->user()->address }}">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Country">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Telephone" value="{{ auth()->user()->phone }}">
							</div>
                            
                            @endauth

                             <!-- Hiển thị các trường thông tin nếu chưa đăng nhập -->
                            @guest

							
                            <div class="form-group">
                                <h3>Vui lòng đăng nhập trước khi mua hàng!!!</h3>
                            <p>Bạn đã có tài khoản <a class="btn btn-info" href="{{ route('login') }}">Login</a></p>
							<div class="section-title">
								
							</div>
								    <a href="{{route('register')}}"><div class="input-checkbox">
									<input type="checkbox" id="register">
									<label class="font-weak" for="register">Tạo tài khoản mới?</label>
									<div class="caption">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
											<p>
												<input class="input" type="password" name="password" placeholder="Enter Your Password">
									</div>
                                    </a>
								</div>
							</div>
                            @endguest
						</div>
					</div>
                    

					

					
	
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
</x-index-layout>
