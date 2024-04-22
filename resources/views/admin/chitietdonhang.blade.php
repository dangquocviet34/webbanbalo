<x-admin-layout>
    <x-slot name='title'>
         Chi tiết đơn hàng
    </x-slot>
    <style>
        .chitietdonhang{
            font-size:large;
            
        }
    </style>

    <div class="chitietdonhang"  style="width:100%">
        <div  style="width:100%; padding-top: 30px;padding-left: 20px;padding-right: 20px; background-color: #F5FFFA;" >
            <div style="height:50px; background-color:#E0EEE0;  display: flex;  justify-content: center; align-items: center;"><h1>THÔNG TIN KHÁCH HÀNG</h1></div>
            @foreach ($dataKH as $dataKH)
            <table class="table table-bordered" style="width:100%; background-color:white">
                <tr>
                    <td><b>Họ tên khách hàng:</b></td>
                    <td>{{$dataKH->fullname}}</td>
                </tr>
                <tr>
                    <td><b>Số điện thoại:</b></td>
                    <td>{{$dataKH->phone}}</td>
                </tr>
                <tr>
                    <td><b>Ngày đặt hàng:</b></td>
                    <td>{{$dataKH->Ngay_dat_hang}}</td>
                </tr>
                <tr>
                    <td><b>Địa điểm giao hàng:</b></td>
                    <td>{{$dataKH->address}}</td>
                </tr>
                <tr>
                    <td><b>Tổng thu:</b></td>
                    <td>{{number_format((float)$dataKH->amount,0,",",".")}} đ</td>
                </tr>
                <tr>
                    <td><b>Hình thức thanh toán:</b></td>
                    <td><!-- Thêm thông tin về hình thức thanh toán nếu có --></td>
                </tr>
            </table>
            @endforeach

        </div>
        <div class="sanpham" style="width:100%; padding-top: 30px;padding-left: 20px;padding-right: 20px; background-color: #F5FFFA;">
            <div style="height:50px; background-color:#E0EEE0;  display: flex;  justify-content: center; align-items: center;"><h1>LIỆT KÊ SẢN PHẨM</h1></div>
            <div style="background-color:aliceblue;">
                <table class="table table-bordered" style="width:100%; background-color:white">
                <thead>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Màu sắc</th>
                    <th>Size</th>
                    <th>Số lượng</th>
                </thead>
                <tbody>
                    @foreach ($datasanpham as $datasanpham)
                    <tr>
                        <td>1</td>
                        <td>{{ $datasanpham->tensp  }}</td>
                        <td>{{ $datasanpham->mausac  }}</td>
                        <td>{{ $datasanpham->sizess  }}</td>
                        <td>{{ $datasanpham->soluong  }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        
        <div class="text-right" style="padding-top:30px ;"> 
            <a href="{{route('qldonhang')}}" class="btn btn-outline-danger btn-lg mr-3" style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: bold;">Trở về</a>
            <a href="{{route('exportPDF',$id)}}" class="btn btn-outline-success btn-lg mf-2 mr-2" style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: bold;">Xuất hóa đơn</a>
        </div>
       
    </div>


</x-admin-layout>