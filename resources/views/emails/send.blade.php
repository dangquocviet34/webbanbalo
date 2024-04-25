<div style="width: 500px; margin: 0 auto; padding: 15px">
    <div>
        <div>
            <img src="asset('/images/logo.png')" alt="logo">
        </div>
       <div style="text-align: center">
        <h2>Xin chào {{ $name }}. Bạn đã đặt hàng thành công !</h2>
        <p>Vui lòng kiểm tra lại thông tin</p>
        </div> 
        <div>
            <p>
                Mẫu số: xxxxxx
                <br>Ký hiệu: 12242</br>
                <br>Số:0249309</br>
            </p>
        </div>
    </div>
    <h3>NGƯỜI ĐẶT HÀNG</h3>
    <table border="1" cellspacing="0" cellpading="10" style="width:100%">
        <tr>
            <th>Name</th>
            <td>{{ $donhang ->user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $donhang->user->email }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $donhang->user->phone }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $donhang->user->address }}</td>
        </tr>
    </table>
    <h3>THÔNG TIN SẢN PHẨM</h3>
    <table border="1" cellspacing="0" cellpading="10" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donhang -> details as $key -> $item)
            <tr>
                <td>{{ $key ++ }}</td>
                <td><img src="url('/images/logo.png')" width="60"></td>
                <td>{{ $item->sanpham->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->price * $item->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
</div>
