<x-admin-layout >
    <x-slot name='title'>
        Statistics & Reports
    </x-slot>

    <div class="container-fluid">
        <style type="text/css">
            p.title_thongke{
                text-align: center;
                font-size: 50px;
                font-weight: bold;
            }
            
        </style>
        <div style="width:100%; padding-bottom:100px">
            <p class="title_thongke">Thống kê đơn hàng doanh số</p>
            <form autocomplete="off">
                @csrf 
                <div class="col-md-2">
                    <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
                    <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
                </div>
                <div class="col-md-2">
                    <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
                </div>
                
                <div class="col-md-2">
                    <p >
                        Lọc theo:
                        <select class="dashboard-filter form-control" name="" id="">
                            <option value="7ngay">7 ngày qua</option>
                            <option value="thangtruoc">tháng trước</option>
                            <option value="thangnay">tháng này</option>
                            <option value="365ngayqua">365 ngày qua</option>

                        </select>
                    </p>
                </div>
            </form>
            </div>
   


        


<script>
    $(document).ready(function() {
        // Hàm để cập nhật giá trị của trường datepicker với ngày mặc định (30 ngày trước)
        function setDefaultDateRange() {
            var toDate = new Date();
            var fromDate = new Date(toDate.getTime() - 30 * 24 * 60 * 60 * 1000); // Trừ 30 ngày

            // Định dạng ngày để đưa vào trường datepicker
            var formattedFromDate = formatDate(fromDate);
            var formattedToDate = formatDate(toDate);

            // Cập nhật giá trị của trường datepicker
            $('#datepicker').val(formattedFromDate);
            $('#datepicker2').val(formattedToDate);
        }

        // Gọi hàm để cập nhật ngày mặc định cho trường datepicker khi trang được tải lần đầu tiên
        setDefaultDateRange();
      // Xử lý sự kiện khi thay đổi option trong dropdown "Lọc theo"
      $('.dashboard-filter').change(function() {
            var selectedOption = $(this).val();
            if (selectedOption === '') {
                // Nếu không có option được chọn, cập nhật lại trường datepicker với ngày mặc định
                setDefaultDateRange();
            } else {
                // Nếu có option được chọn, cập nhật trường datepicker tương ứng
                updateDatePicker(selectedOption);
            }
        });

        // Hàm để cập nhật giá trị của trường datepicker với ngày mặc định
        function setDefaultDateRange() {
            var toDate = new Date();
            var fromDate = new Date(toDate.getTime() - 30 * 24 * 60 * 60 * 1000); // Trừ 1 ngày

            // Định dạng ngày để đưa vào trường datepicker
            var formattedFromDate = formatDate(fromDate);
            var formattedToDate = formatDate(toDate);

            // Cập nhật giá trị của trường datepicker
            $('#datepicker').val(formattedFromDate);
            $('#datepicker2').val(formattedToDate);
        }

        // Hàm để cập nhật giá trị của trường datepicker với ngày tương ứng với option được chọn
        function updateDatePicker(option) {
            var toDate = new Date();
            var fromDate;

            switch (option) {
                case '7ngay':
                    fromDate = new Date(toDate.getTime() - 7 * 24 * 60 * 60 * 1000); // Trừ 7 ngày
                    break;
                case 'thangtruoc':
                    fromDate = new Date(toDate.getFullYear(), toDate.getMonth() - 1, toDate.getDate()); // Tháng trước
                    break;
                case 'thangnay':
                    fromDate = new Date(toDate.getFullYear(), toDate.getMonth(), 1); // Tháng này
                    break;
                case '365ngayqua':
                    fromDate = new Date(toDate.getTime() - 365 * 24 * 60 * 60 * 1000); // Trừ 365 ngày
                    break;
                default:
                    // Xử lý cho các trường hợp còn lại
                    break;
            }

            // Định dạng ngày để đưa vào trường datepicker
            var formattedFromDate = formatDate(fromDate);
            var formattedToDate = formatDate(toDate);

            // Cập nhật giá trị của trường datepicker
            $('#datepicker').val(formattedFromDate);
            $('#datepicker2').val(formattedToDate);
        }

        // Hàm để định dạng ngày
        function formatDate(date) {
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();

            // Định dạng ngày thành chuỗi "YYYY-MM-DD"
            return year + '-' + (month < 10 ? '0' + month : month) + '-' + (day < 10 ? '0' + day : day);
        }
    });
        // Kiểm tra xem jQuery UI đã khởi tạo thành công chưa
        if ($.ui) {
            // Khởi tạo Datepicker
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd"
            });
            $("#datepicker2").datepicker({
                dateFormat: "yy-mm-dd"
            });
        } else {
            console.error("jQuery UI is not initialized properly.");
        }
    ;
</script>
    
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

