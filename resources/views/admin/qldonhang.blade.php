<x-admin-layout >
    <x-slot name='title'>
         Dashboard
    </x-slot>

        <style>
        /* Định dạng font chữ cho tiêu đề (thead) */
        .table thead th {
            font-weight: bold;
            font-size: 16px; /* Size của font chữ */
            /* Các thuộc tính khác nếu cần */
        }

        /* Định dạng font chữ cho nội dung (tbody) */
        .table tbody td {
            font-size: 14px; /* Size của font chữ */
            
            /* Các thuộc tính khác nếu cần */
        }
        /* Định dạng font chữ cho cột trạng thái */
        .table tbody td:nth-child(4) {
            /* Chỉ áp dụng cho cột thứ 4 (cột trạng thái) của bảng */
            color: black; /* Màu chữ mặc định */
            font-weight: bold;
        }

        /* Màu chữ màu vàng nếu trạng thái đang xử lý */
        .table tbody td:nth-child(4)[data-status="Đang xử lý"] {
            color: #FFB90F;
        }
        /* Màu chữ màu xanh nếu trạng thái đã giao hàng */
        .table tbody td:nth-child(4)[data-status="Đã giao hàng"] {
            color: #00CD00;
        }

        /* Màu chữ màu đỏ nếu trạng thái đã hủy */
        .table tbody td:nth-child(4)[data-status="Đã hủy"] {
            color: red;
        }
        
       
    </style>

    
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div style="width:100%"> 
        <h1 style=" margin-bottom: 20px;">Liệt kê đơn hàng</h1>
        <div style="width:100%">
        <a href="{{route('exportDonHang')}}" class="btn btn-outline-success btn-block" style="font-family: Arial, sans-serif; font-size: 18px;" >Xuất file excel</a><br>
        </div style="width:100%">
        <div>
        <table class="table table-striped table-bordered"  id="OrdersTable" style="width:100%">
            <thead>
                
                <th>Số thứ tự</th>
                <th>Ngày đặt hàng </th>
                <th>Giá trị đơn hàng</th>
                <th>Tình trạng đơn hàng</th>
                <th>Chi tiết</th>
                    
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    
                    <td>{{$count = $count+1}}</td>
                    <td>{{$row->Ngay_dat_hang}}</td>
                    <td>{{number_format((float)$row->amount,0,",",".")}} đ</td>
                    <td  data-status="{{$row->Trang_thai}}">{{$row->Trang_thai}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('chitietdonhang', $row->id)}}" class="btn btn-success mr-3">Xem chi tiết</a>
                            
                            <!-- <a href=""><button type="button" class="btn btn-danger">Hủy đơn</button></a> -->
                            @if($row->id_status != 0 && $row->id_status != 2)
                            <form method='post' action = "{{route('huydonhang',$row->id)}}"
                            onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?');">
                            <input type='hidden' value='{{$row->id}}' name='id'>
                            <input type='submit' class='btn btn-danger ml-2' value='Hủy đơn'>
                            {{ csrf_field() }}
                            </form>
                            @endif
                        </div>
                    </td>
                    
                </tr>
                @endforeach

            </tbody>
        </table>
        </div>
    </div>

    <script>
        $(document).ready(function()
        {
            $("#OrdersTable").DataTable(
                {
                    responsive: true,
                    bStateSave: true,
                    autoWidth: true
                }
            );
        });
    </script>
   

   

</x-admin-layout>