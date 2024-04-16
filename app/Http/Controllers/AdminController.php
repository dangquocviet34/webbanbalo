<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view("admin.dashboard");
    }
    public function filter_by_date(Request $request){
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        //update giá đơn hàng
        DB::update("UPDATE donhang AS DH
                                JOIN (
                                    SELECT DH.id, 
                                        SUM(
                                            CASE 
                                                WHEN DH.Ngay_dat_hang BETWEEN DC.start_date AND DC.end_date 
                                                THEN CT.chitiet_soluong * SP.price * (1 - (DC.discount_value / 100))
                                                ELSE CT.chitiet_soluong * SP.price
                                            END
                                        ) AS new_total
                                    FROM donhang AS DH 
                                    JOIN chitietdonhang AS CT ON DH.id = CT.id_donhang
                                    JOIN sanpham AS SP ON SP.id_sanpham = CT.id_sp
                                    LEFT JOIN discount AS DC ON DC.id_sanpham = SP.id_sanpham 
                                    GROUP BY DH.id
                                ) AS CalculatedAmount ON DH.id = CalculatedAmount.id
                                SET DH.amount = CalculatedAmount.new_total;");

            //update số lượng trong 1 đơn hàng
            DB::update("UPDATE donhang AS DH
                                        JOIN (
                                            SELECT id_donhang, SUM(chitiet_soluong) AS total_quantity
                                            FROM chitietdonhang
                                            GROUP BY id_donhang
                                        ) AS TotalQuantity ON DH.id = TotalQuantity.id_donhang
                                        SET DH.slspdh = TotalQuantity.total_quantity;");
            //update địa chỉ 
            DB::update("UPDATE donhang as DH
                                JOIN (SELECT DH.id as iddonhang, U.address as address FROM donhang as DH LEFT JOIN `user` as u
                                ON DH.id_user = U.id) as T1 ON T1.iddonhang = DH.id
                                SET DH.address = T1.address");
                                                

        $get = DB::select("SELECT * FROM donhang"); //chỗ này lọc lấy đơn nè

        foreach($get as $key => $val){
            $chart_data = array(

            );
        }
        echo $data = json_encode($chart_data);
    }


    

    public function products()
    {
        return view('admin.products');
    }

    public function accounts()
    {
        return view('admin.accounts');
    }

    public function roles()
    {
        return view('admin.roles');
    }
}
