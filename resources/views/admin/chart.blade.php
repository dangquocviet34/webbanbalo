<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu đồ với Bộ lọc Ngày</title>
    <!-- Bao gồm Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bao gồm jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bao gồm jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- Bao gồm Raphael -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
    <!-- Bao gồm Morris.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Biểu đồ với Bộ lọc Ngày</h1>
        <!-- Biểu mẫu Bộ lọc phạm vi ngày -->
        <form id="filterForm">
            <div class="form-group">
                <label for="fromDate">Từ Ngày:</label>
                <input type="text" class="form-control" id="fromDate" name="fromDate">
            </div>
            <div class="form-group">
                <label for="toDate">Đến Ngày:</label>
                <input type="text" class="form-control" id="toDate" name="toDate">
            </div>
            <button type="button" class="btn btn-primary" id="filterButton">Lọc</button>
        </form>
        <!-- Thùng chứa biểu đồ -->
        <div id="chart"></div>
    </div>

    <script>
        $(document).ready(function() {
            // Khởi tạo các datepicker
            $("#fromDate, #toDate").datepicker({
                dateFormat: "yy-mm-dd"
            });

            // Khởi tạo biểu đồ với dữ liệu mẫu
            var chartData = [
                { date: '2024-04-01', value: 20 },
                { date: '2024-04-02', value: 10 },
                { date: '2024-04-03', value: 5 },
                { date: '2024-04-04', value: 5 },
                { date: '2024-04-05', value: 20 }
            ];

            var chart = new Morris.Line({
                element: 'chart',
                data: chartData,
                xkey: 'date',
                ykeys: ['value'],
                labels: ['Giá trị']
            });

            // Xử lý sự kiện nhấp chuột vào nút lọc
            $("#filterButton").click(function() {
                var fromDate = $("#fromDate").val();
                var toDate = $("#toDate").val();

                // Lọc dữ liệu biểu đồ dựa trên phạm vi ngày đã chọn
                var filteredData = chartData.filter(function(item) {
                    return item.date >= fromDate && item.date <= toDate;
                });

                // Cập nhật dữ liệu biểu đồ
                chart.setData(filteredData);
            });
        });
    </script>
</body>
</html>