<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn từ Shopee</title>
    <style>
        body, .container, .header, .sanpham, .invoice-footer {
            margin: 0;
            padding: 0;
            color: #333;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            background-color: white;
            display: flex;
            align-items: center;
            padding: 20px;
        }
        .header img {
            max-width: 100%;
            height: auto;
            margin-right: 20px;
        }
        .header-content {
            margin-top: 20px;
            flex: 3;
        }
        .header-logo {
            flex: 1;
        }
        .header-content h1 {
            margin: 0;
            margin-bottom: 10px;
            font-size: 24px;
        }
        .header-content p {
            margin: 0;
            font-size: 14px;
            text-align: left; /* căn lề phải */
        }
        .body {
            padding: 20px;
            margin-left: 50px;
            line-height: 1.6;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: white;
            color: black;
        }
        .invoice-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            background-color: white;
            color: #fff;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-logo">
                <img src="{{ url('/images/logo.png') }}" alt="logo">
            </div>
            <div class="header-content">
                <h1>G-SHOP</h1>
                <p>Đồng hành cùng bạn mỗi bước đi - Balô và túi xách cho cuộc sống đầy phong cách.</p>
                <p>Chào mừng bạn đến với dự án website bán hàng của nhóm 5 lớp DH37CDS01! <br>Chúng tôi là một nhóm các sinh viên 
                    đam mê với công nghệ và mong muốn tạo ra một trải nghiệm mua sắm trực tuyến độc đáo và thuận tiện cho người dùng.</p>
            </div>
        </div>
        <div class="body">
            <div class="khachhang">
                @foreach ($dataKH as $item)
                <br><b>Họ tên khách hàng:</b> {{$item-> fullname }}
                <br><b>Số điện thoại:</b> {{$item->phone }}
                <br><b>Thời gian đặt hàng:</b> {{$item->Ngay_dat_hang}}
                <br><b>Địa chỉ giao hàng:</b> {{$item->address }}
                <br><b>Tổng tiền phải thanh toán:</b> {{number_format((float)$item->amount,0,",",".")}} đ
                @endforeach
            <br><b>Hình thức thanh toán:</b> {{0}}
            </div>
           
            <div class="sanpham">
                <h2>Thông tin sản phẩm</h2>
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Màu sắc</th>
                            <th>Size</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datasanpham as $datasanpham)
                        <tr>
                            <td>1</td>
                            <td>{{ $datasanpham->tensp  }}</td>
                            <td>{{ $datasanpham->mausac  }}</td>
                            <td>{{ $datasanpham->sizess  }}</td>
                            <td>{{ $datasanpham->soluong  }}</td>
                            <td>{{number_format((float)$datasanpham->discount_total,0,",",".")}} đ</td>
                            <td>{{number_format((float)$datasanpham->thanh_tien,0,",",".")}} đ</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="invoice-footer">
            <p>&copy; 2024 G-shop. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
