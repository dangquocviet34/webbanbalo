<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Barryvdh\DomPDF\Facade\Pdf;
use App\DonHang; // Import model DonHang
use App\ChiTietDonHang; // Import model ChiTietDonHang
use App\SanPham; // Import model SanPham
use App\Discount;
use App\Models\DonHang as ModelsDonHang;

class AdminController extends Controller
{
    public function dashboard()
    {
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
            JOIN (SELECT DH.id as iddonhang, U.address as address FROM donhang as DH LEFT JOIN `users` as u
            ON DH.id_user = U.id) as T1 ON T1.iddonhang = DH.id
            SET DH.address = T1.address");
        
        //update discount total
        DB::update("
                UPDATE sanpham AS SP
                LEFT JOIN discount AS DC ON SP.id_sanpham = DC.id_sanpham
                SET SP.discount_total = ROUND(
                    CASE 
                        WHEN DC.start_date <= CURRENT_DATE() AND DC.end_date THEN SP.price * (100 - DC.discount_value) / 100 
                        ELSE SP.price 
                    END
                )
                WHERE DC.start_date <= CURRENT_DATE() AND DC.end_date IS NOT NULL
            ");


        //update chitiet_tonggia
        DB::update("UPDATE sanpham AS SP
        JOIN chitietdonhang AS CT ON SP.id_sanpham = CT.id_sp
        SET CT.chitiet_tonggia = CT.chitiet_soluong * SP.discount_total");

        return view("admin.dashboard");
    }


    public function statistics()
    {
        return view("admin.statistics");
    }
     //Lọc đơn hàng theo ngày
     public function filter_by_date(Request $request){
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
    
        $get = DB::select("SELECT DATE(Ngay_dat_hang) as order_date, SUM(amount) as total_revenue, SUM(slspdh) as soluong, COUNT(id) as total_order FROM `donhang`
            WHERE Ngay_dat_hang BETWEEN ? AND ?
                 AND donhang.status <> ?
            GROUP BY date(Ngay_dat_hang)
            ORDER BY date(Ngay_dat_hang) ASC",[$from_date, $to_date,0]);
    
        $chart_data = [];
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'revenue'=> $val->total_revenue,
                'quantily'=> $val->soluong,
            );
        }
        
        // return dd($get);
        return response()->json($chart_data);
    }
   

    //Thống kê đơn hàng
    public function qldonhang(){
        $data = DB::select("SELECT * FROM donhang as DH JOIN trangthaidonhang as TT ON DH.status = TT.id_status ORDER BY DH.Ngay_dat_hang DESC");
        $count = 0;
        // dd($data);
        return view('admin.qldonhang', compact("data","count"));
    }
    //Hủy đơn hàng
    public function huydonhang(Request $request){
        $id = $request->id;
        //xử lý cập nhật lại status đơn hàng
        DB::update("UPDATE donhang as DH SET DH.status = 0 WHERE DH.id = ?",[$id]);

        return redirect()->route('qldonhang')->with('status','Hủy đơn hàng thành công');
       
    }
    //xuất file excel đơn hàng
    public function exportDonHang()
    {
        $donhang = DB::select("SELECT DH.id, DH.Ngay_dat_hang, DH.amount, DH.slspdh, TT.Trang_thai
                                        FROM donhang AS DH
                                        JOIN trangthaidonhang AS TT ON DH.status = TT.id_status
                                        ORDER BY DH.Ngay_dat_hang DESC ");

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Ngày đặt hàng');
        $sheet->setCellValue('C1', 'Giá trị đơn hàng');
        $sheet->setCellValue('D1', 'Số lượng sản phẩm');
        $sheet->setCellValue('E1', 'Tình trạng');

        $row = 2;
        foreach ($donhang as $dh) {
            $sheet->setCellValue('A' . $row, $dh->id);
            $sheet->setCellValue('B' . $row, $dh->Ngay_dat_hang);
            $sheet->setCellValue('C' . $row, $dh->amount);
            $sheet->setCellValue('D' . $row, $dh->slspdh);
            $sheet->setCellValue('E' . $row, $dh->Trang_thai);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Soluongdonhang_' . date('YmdHis') . '.xlsx';
        $writer->save($fileName);

        return response()->download($fileName)->deleteFileAfterSend(true);
    }
    //Xuất hóa đơn
    public function exportPDF(Request $request)
    {
        $id = $request->id;

        $dataKH = DB::select("SELECT KH.id, KH.fullname, KH.phone, KH.address, DH.Ngay_dat_hang, DH.amount, DH.id FROM donhang AS DH JOIN `users` as KH 
        ON DH.id_user = KH.id
        WHERE DH.id = ?",[$id]);
    
       
       
         $datasanpham = DB::select("SELECT DH.id, DH.amount,P.tensp, P.mausac, P.sizess,  P.discount_total, 
        CT.chitiet_tonggia as thanh_tien, CT.chitiet_soluong as soluong
        FROM donhang as Dh 
        JOIN chitietdonhang as CT ON DH.id = CT.id_donhang 
        JOIN sanpham as P ON CT.id_sp = P.id_sanpham 
        WHERE DH.id = ?
        GROUP BY DH.id, DH.amount,P.tensp, P.mausac, P.sizess,  CT.chitiet_tonggia,P.discount_total,  CT.chitiet_soluong", [$id]);


        $pdf = PDF::loadView('pdf.hoadon', compact("dataKH","datasanpham"));
       
        return $pdf->download('hoadon.pdf');
        // return view("pdf.hoadon", compact("dataKH","datasanpham"));

    }

    public function chitietdonhang(Request $request){
        $id = $request->id;

        $dataKH = DB::select("SELECT KH.id, KH.fullname, KH.phone, KH.address, DH.Ngay_dat_hang, DH.amount, DH.id FROM donhang AS DH JOIN `users` as KH 
        ON DH.id_user = KH.id
        WHERE DH.id = ?",[$id]);

        $datasanpham = DB::select("SELECT DH.id, DH.amount,P.tensp, P.mausac, P.sizess, P.image_sp,  
        CT.chitiet_tonggia as thanh_tien, CT.chitiet_soluong as soluong
        FROM donhang as Dh 
        JOIN chitietdonhang as CT ON DH.id = CT.id_donhang 
        JOIN sanpham as P ON CT.id_sp = P.id_sanpham 
        WHERE DH.id = ?
        GROUP BY DH.id, DH.amount,P.tensp, P.mausac, P.sizess, P.image_sp,  CT.chitiet_tonggia, CT.chitiet_soluong", [$id]);



        // dd($id, $dataKH, $datasanpham);
        return view("admin.chitietdonhang", compact("dataKH","datasanpham","id"));


    }

    public function products()
    {
        return view('admin.products');
    }

    public function promotions()
    {
        return view('admin.promotions');
    }

    public function accounts()
    {
        $users = DB::table('users')->join('roles', 'users.role_id', '=', 'roles.id')->select('users.*', 'roles.description')->orderBy('users.role_id')->get();
        return view('admin.accounts', ['users' => $users]);
    }

    public function roles()
    {
        $roles = DB::select('SELECT roles.description, COUNT(users.role_id) AS count_role_id FROM users INNER JOIN roles WHERE roles.id = users.role_id GROUP BY users.role_id;');
        return view('admin.roles', ['roles' => $roles]);
    }

    public function permissions(Request $request)
    {
        $data = $request->all();
        $permissions = DB::select('SELECT type FROM rules WHERE id in (SELECT id FROM permissions WHERE role_id = 1)');
        return view('admin.permissions', ['permissions' => $permissions]);
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
