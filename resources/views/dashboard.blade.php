<x-admin-layout>
    <x-slot name='title'>
        Dashboard
    </x-slot>


    <div class="container-fluid">
        <style type="text/css">
            p.title_thongke{
                text-align: center;
                font-size: 50px;
                font-weight: bold;
            }

        </style>

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
            <div class="col-md-12">

                <div id="myfirstchart" style="height: 250px;"></div>
            </div>




    </div>

    <!-- xử lý chart -->

<script type="text/javascript">

    $(document).ready(function(){
        var chart = new Morris.Bar({
            // ID của phần tử để vẽ biểu đồ.
            element: 'myfirstchart',
            // Tuỳ chọn cho biểu đồ
            lineColors:["#blue","#red", "#black","gray"],
            pointFillColors:['#fffffff'],
            fillStrokeColors:['#000000'],
            hideHover: "auto",
            parseTime: false,
            // Thuộc tính của dữ liệu biểu đồ
            xkey: 'period',
            ykeys: ['order', 'revenue', 'quantily'],
            behaveLikeLine: true,
            // Nhãn cho các trục y -- sẽ được hiển thị khi bạn rê chuột qua biểu đồ
            labels: ['Tổng đơn hàng','Doanh thu', 'Số lượng sản phẩm']
        });

        $('#btn-dashboard-filter').click(function(){
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // var _token = $('meta[name="csrf-token"]').attr('content');
            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();



            $.ajax({
                url: "{{ url('/admin/dashboard/filter-by-date') }}",
                method: "POST",
                dataType: "json",
                data: { from_date: from_date, to_date: to_date, _token: csrfToken },
                success: function(data) {
                    chart.setData(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

    });
</script>

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


</x-admin-layout>

