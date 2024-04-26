<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xác nhận đơn hàng</title>
</head>


<body>
    <div class="container" style="background-color: #5a5858; border-radius: 12px;padding: 15px">
        <div class="col-md-12">
            <p style="text-align: center; color: #fff">Đây là email tự động, quý khách vui lòng không phản hồi 
                emai này !</p>
            <div class="row" style="background-color: rgb(216, 209, 183);padding: 15px">
                <div class="col-md-12" style="font-size: 30px; color: #fff; text-align: center"> G SHOP - CẢM ƠN</div>
                <div class="col-md-12">
                    <p style="font-weight: bold;">Xin chào {{$auth->fullname}} !</p>
                    <p>Cảm ơn bạn đã đặt hàng ở G Shop !</p>
                    <h4>THÔNG TIN ĐƠN HÀNG</h4>
                    <p>Mã đơn hàng: <span style="color: #fff">0123</span></p>
                    <p>Dịch vụ: <span style="color: #fff">ĐẶT HÀNG TRỰC TUYẾN</span></p>
                    -----------------------------------------------------
                    <h4>THÔNG TIN NGƯỜI NHẬN</h4>
                    <p>Họ tên: <span style="color: #fff">{{$auth->fullname}}</span></p>
                    <p>Địa chỉ: <span style="color: #fff">{{$auth->address}}</span></p>
                    <p>Điện thoại liên hệ: <span style="color: #fff">{{$auth->phone}}</span></p>
                    <p>Email: <span style="color: #fff">{{$auth->email}}</span></p>
                    <p>Ghi chú đơn hàng: <span style="color: #fff"> khong </span></p>
                    <p>Hình thức thanh toán: <span style="color: #fff">NULL</span></p>
                    <i>Nếu thông tin cá nhân không chính xác quý khách vui lòng liên hệ 0188088 để được hỗ trợ
                        !</i><br>
                    -----------------------------------------------------
        
                    <h4>CHI TIẾT ĐƠN HÀNG</h4>
                    <table class="table table-bordered  table-striped">
                        <thead>
                            <tr>
                                <th class="product-name" style="width: 150px">Số thứ tự</th>
                                <th class="product-name" style="width: 150px">Sản phẩm</th>
                            
                                <th class="product-color">Màu sắc</th>
                                <th class="product-price">Đơn giá</th>
                                
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-subtotal">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 1;
                            @endphp
                            @foreach($cart as $item)
                                <tr>
                                    <td class="product-name">
                                        {{$stt}}
                                    </td>

                                    <td class="product-name">
                                        <img src="{{$item['product_image']}}" alt="">
                                        <a>{{$item['product_name']}}</a>
                                    </td>
                                    
                                    <td class="product-color">
                                        <a>Hong canh sen</a>
                                    </td>
                                    <td class="product-discount">
                                        <a>{{ $item['product_price']}}</a>
                                    </td>
                                   
                                    <td>
                                        <a>{{$item['product_qty']}}</a>
                                    </td>
                                    <td class="product-subtotal">
                                        <a>{{$totalPrice}}</a>
                                    </td>

                                </tr>
                                @php
                                $stt ++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                    
                    <br>
                    <h4>TỔNG TIỀN: {{$totalAmount}}</h4>
                    -----------------------------------------------------
                    <br>
                    <i>Mọi thắc mắc về đơn hàng quý khách vui lòng liên hệ đến 018008 ! Một lần nữa cảm ơn quý khách
                        đã tin tưởng G-SHOP !</i>
                </div>
            </div>
        </div>
    </div>
</body>



</html>
