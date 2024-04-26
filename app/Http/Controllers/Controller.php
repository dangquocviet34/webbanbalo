<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use Variable;

use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;
use Svg\Tag\Rect;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        
        
        $banner = DB::table('banner')->get();

        $discount = DB::select("SELECT SP.*, DC.*, ROUND((SP.price * (100-DC.discount_value)) / 100) AS discount_total 
                            FROM sanpham AS SP	JOIN discount AS DC ON SP.id_sanpham = DC.id_sanpham
                            WHERE  DC.start_date <= CURRENT_DATE() AND DC.end_date >= CURRENT_DATE()
                            ORDER BY DC.discount_value DESC");


        $grouped_discounts = collect($discount)->groupBy('discount_value');

        $balo_Vi =  DB::select("SELECT * FROM `sanpham` WHERE parent_name_menu = 'balo -ví'");

        $sptuixach =  DB::select("SELECT * FROM `sanpham` WHERE parent_name_menu = 'túi xách'");
                        
        
        return view("users.trangchu", compact("banner","discount", "grouped_discounts", "balo_Vi","sptuixach"));
    }
    public function index1($id_sub)
        {
            $data = DB::select("SELECT * FROM sanpham AS SP JOIN sub_menu as S 
            ON SP.id_sub = S.id_sub
            WHERE S.id_sub = ?", [$id_sub]);        
            return view("users.index1", compact("data"));
        }
        public function chitiet($id_sp)
        {
            $data = DB::select("SELECT SP.*, DC.*, ROUND(
                CASE
                    WHEN DC.start_date <= CURRENT_DATE() AND DC.end_date
                    THEN SP.price * (100-DC.discount_value)/ 100
                    ELSE SP.price
                END ) AS discount_total 
        FROM sanpham AS SP	LEFT JOIN discount AS DC ON SP.id_sanpham = DC.id_sanphaM
          WHERE SP.id_sanpham = ?",[$id_sp]);
           
            return view("users.chitiet", compact("data"));        
            }

    

    
        public function addCart(Request $request, $id_sp)
        {
            // Kiểm tra session 'cart' trước khi sử dụng
            $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;

            $product = DB::table('sanpham')->where('id_sanpham', $id_sp)->first();

            // Kiểm tra xem truy vấn có trả về sản phẩm không
            if ($product != null) {
                $newCart = new Cart($oldCart);
                $newCart->addCart($product, $id_sp);

                // Cập nhật session 'cart'
                $request->session()->put("cart", $newCart);

                // Render lại view giỏ hàng và trả về HTML
                $cartView = view('users.cart', compact("newCart"))->render();
                

                // Trả về JSON chứa HTML của giỏ hàng
                return response()->json(['cart_html' => $cartView]);
            } else {
                // Xử lý trường hợp không tìm thấy sản phẩm
                return response()->json(['error' => 'Product not found'], 404);
            }
        }

        //Xử lý session giỏ hàng
        public function add_cart_ajax(Request $request){
            $data = $request->all();
            $session_id = substr(md5(microtime()), rand(0,26),5);
            $cart = session()->get('cart');
            
            // Kiểm tra nếu giỏ hàng không rỗng
            if($cart){
                $is_available = false;
                
                // Duyệt qua các sản phẩm trong giỏ hàng
                foreach($cart as $key => $item){
                    // Nếu sản phẩm đã tồn tại trong giỏ hàng
                    if($item['product_id'] == $data['cart_product_id']){
                        // Tăng số lượng sản phẩm lên 1
                        $cart[$key]['product_qty'] += 1;
                        $is_available = true;
                        break;
                    }
                }
                
                // Nếu sản phẩm chưa tồn tại trong giỏ hàng
                if(!$is_available){
                    $cart[] = [
                        'session_id' => $session_id,
                        'product_name' => $data['cart_product_name'],
                        'product_id' => $data['cart_product_id'],
                        'product_image' => $data['cart_product_image'],
                        'product_qty' => $data['cart_product_qty'],
                        'product_price' => $data['cart_product_price'],
                    ];
                }
            }else{
                // Nếu giỏ hàng rỗng
                $cart[] = [
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                ];
            }
            
            // Cập nhật giỏ hàng trong session
            session()->put('cart', $cart);
            
            // Trả về số lượng sản phẩm trong giỏ hàng sau khi xử lý
            return response()->json(['cart_count' => count($cart)]);
        }

        
        //save cart
        public function save_cart_ajax(Request $request){


        }

        //Giỏ hàng
        public function giohang(){
            $cart = session()->get('cart', []); // Lấy thông tin giỏ hàng từ session, nếu không có thì gán một mảng rỗng
    
            $data = [];
            $quantity = [];
            
            $list_product = "";
            foreach ($cart as $item) {
                $quantity[$item['product_id']] = $item['product_qty'];
                $list_product .= $item['product_id'] . ", ";
            }
            $list_product = rtrim($list_product, ", "); // Loại bỏ dấu phẩy cuối cùng
        
            // Lấy thông tin chi tiết của các sản phẩm trong giỏ hàng từ cơ sở dữ liệu
            $data = DB::table("sanpham")->whereIn('id_sanpham', explode(',', $list_product))->get();
            
          
            // dd($cart, $data, $quantity);
            
            return view("users.giohang", compact("quantity", "data", "cart"));
        }


        //Xóa giỏ hàng
        public function delete_cart($session_id){
            $cart = session::get('cart');

            if($cart==true){
                foreach($cart as $key => $val){
                    if($val['session_id']==$session_id){
                        unset($cart[$key]);
                    }
                }
                session::put('cart', $cart);
                return redirect()->back()->with('message','Xóa thành công');
            }
            else{
                return redirect()->back()->with('message','Xóa thất bại');
            }
        }

        //Xác nhận mua hàng
        public function ordercreate(Request $request){
    
            // Lấy session "cart"
            $cart = session()->get('cart');
            $hinh_thuc_thanh_toan= $request->hinh_thuc_thanh_toan;
            
        
            // Kiểm tra xem $cart có tồn tại và có phải là mảng không
            if (!empty($cart) && is_array($cart)) {
                $chitietdonhang = [];
                
                // Khởi tạo biến tổng số lượng và tổng giá
                $totalQuantity = 0;
                $totalAmount = 0;
                
                // Bắt đầu một giao dịch database
                DB::beginTransaction();
                
                try {
                    $order = [
                        "Ngay_dat_hang" => DB::raw("now()"),
                        "status" => 2,
                        "id_user" => Auth::user()->id
                    ];
                    
                    // Thêm thông tin đơn hàng vào bảng đơn hàng
                    $id_don_hang = DB::table("donhang")->insertGetId($order);
        
                    foreach ($cart as $item) {
                        // Tính tổng giá tiền cho mỗi sản phẩm
                        $totalPrice = $item['product_qty'] * $item['product_price'];
        
                        // Thêm thông tin chi tiết đơn hàng của mỗi sản phẩm vào mảng
                        $chitietdonhang[] = [
                            'chitiet_soluong' => $item['product_qty'],
                            'chitiet_tonggia' => $totalPrice,
                            'id_sp' => $item['product_id'],
                            'id_donhang' => $id_don_hang,
                        ];
        
                        // Cập nhật tổng số lượng sản phẩm và tổng giá
                        $totalQuantity += $item['product_qty'];
                        $totalAmount += $totalPrice;
                    }
        
                    // Cập nhật số lượng và tổng giá vào bảng don_hang
                    DB::table('donhang')
                        ->where('id', $id_don_hang)
                        ->update([
                            'slspdh' => $totalQuantity,
                            'amount' => $totalAmount
                        ]);
        
                    // Thêm thông tin chi tiết đơn hàng vào bảng chi tiết đơn hàng
                    DB::table('chitietdonhang')->insert($chitietdonhang);
        
                    // Commit giao dịch nếu mọi thứ diễn ra thành công
                    DB::commit();
                    //Gửi mail xác nhận
                     // Dữ liệu bạn muốn truyền vào view
                    $auth = auth()->user();
                    Mail::send('users.send_mail',compact ('cart','auth'), function($message) use ($auth){
                        $message->subject('ĐẶT HÀNG THÀNH CÔNG');
                        $message->to($auth->email,$auth->name); //Tiêu đề của mail
                    });
                
                    // Xóa session "cart" sau khi đã cập nhật vào cơ sở dữ liệu
                    session()->forget('cart');
        
                    // Redirect hoặc trả về view tùy vào logic của ứng dụng
                } catch (\Exception $e) {
                    // Nếu có lỗi xảy ra, rollback giao dịch và xử lý lỗi
                    DB::rollback();
                    // In ra thông báo lỗi hoặc xử lý lỗi theo nhu cầu của bạn
                    dd($e->getMessage());
                }
            } else {
                // Xử lý khi $cart không tồn tại hoặc không phải là mảng
                dd("Session 'cart' không tồn tại hoặc không phải là một mảng.");
            }
            if($hinh_thuc_thanh_toan==3){
               
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
                        session()->forget('cart');
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
                        
                    
                session()->forget('cart');       // vui lòng tham khảo thêm tại code demo
                
            }
            
            return redirect()->route('giohang')->with('success', 'Đặt hàng thành công!');
        
            
           // $name = 'Hằng';
            //$to_email = "vth16803@gmail.com"; //send to this mail
            //$data = array("name"=>"mail từ tài khoản khách hàng","body"=>"mail gửi xác nhận đặt hàng thành công"); //body của send_mail.blade.php
            //return redirect('/')->with('message','');

        
        }

        
       


            
 }

        

 
