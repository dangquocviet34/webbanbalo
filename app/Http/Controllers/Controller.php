<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;




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

    

    //Giỏ hàng
    // public function cartadd(Request $request)
    // {
    //     // Kiểm tra dữ liệu gửi từ form
    //     $request->validate([
    //         'id_sanpham' => 'required|numeric',
    //         'num' => 'required|numeric',
    //     ]);
    
    //     $id_sp = $request->id_sanpham;
    //     $num = $request->num;
    //     $total = 0;
    //     $cart = [];
    
    //     if(session()->has('cart')) {
    //         $cart = session()->get('cart');
    //         if(isset($cart[$id_sp])) {
    //             $cart[$id_sp] += $num;
    //         } else {
    //             $cart[$id_sp] = $num;
    //         }
    //     } else {
    //         $cart[$id_sp] = $num;
    //     }
    
    //     session()->put('cart', $cart);
    //     dd($cart);
    //     // return count($cart);
    // }
    
//Nháp
        //     public function AddCart(Request $request, $id_sp)
        // {
        //     $product = DB::table('sanpham')->where('id_sanpham', $id_sp)->first();
        //     if($product!=null){
        //         $oldCart= Session('Cart') ? Session('Cart') : null;
        //         $newCart = new Cart($oldCart);
        //         $newCart ->AddCart($product, $id_sp);
        //         dd($newCart);

        //         $request->session()->put('Cart', $newCart);
        //         return view("index");
                
        //     }
           
        // }
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

        

 }
