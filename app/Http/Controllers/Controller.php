<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

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
}
