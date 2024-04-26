<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Mail;
session_start();

class UserController extends Controller
{
    public function vnpay_payment(Request $request){
        $data = $request->all(); /*Hai dòng này để random mã đơn hàng (id_donhang).*/
        $id_donhang = rand(00,9999);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000";
        $vnp_TmnCode = "50XTCI0S";//Mã website tại VNPAY 
        $vnp_HashSecret = "JPRDDRZUOBSMADIZISTSTAAYRWVKJWTX"; //Chuỗi bí mật
        
        $vnp_TxnRef = $id_donhang; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $data['total_vnpay'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
           
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        
        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        //Khi thành công sẽ trả về 1 đường dẫn và ssau đó lưu thông tin thành công về
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            //Ở thanh toán lúc đặt hàng ở button thêm 'name ="redirect"' để tính toán những dữ liệu trên và sau đó trả về đường dẫn
            if (isset($_POST['redirect'])) { //Nếu tồn tại $_POST['redirect'] thì trả về sandbox $vnp_Url (dòng 10)
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData); //Nếu ko có 'name = "redirect"' trả về tất cả dl khi thanh toán success kiểu json
            }
            // vui lòng tham khảo thêm tại code demo
    }

    // Hàm send mail
    public function send_mail(){
        $name = 'Hằng';
        $to_email = "vth16803@gmail.com"; //send to this mail
        $data = array("name"=>"mail từ tài khoản khách hàng","body"=>"mail gửi xác nhận đặt hàng thành công"); //body của send_mail.blade.php
        Mail::send('emails.send',compact ('name'), function($message) use ($to_email,$name){
            $message->to($to_email,$name)->subject('ĐẶT HÀNG THÀNH CÔNG'); //Tiêu đề của mail
           // $message->from($to_email); Gửi từ mail này

        });
        return redirect('/')->with('message','');
    }
}
?>
