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
                        "status" => 0,
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
            return redirect()->route('giohang')->with('success', 'Đặt hàng thành công!');
            
        
        }

        
       


            
 }

        

 
