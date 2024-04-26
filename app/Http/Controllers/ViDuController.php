<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Auth;

class ViDuController extends Controller
{
    //
    function vidu()
    {
        return view("vidu1");
    }

    function chucnang1(){
      echo "ĐẶNG QUỐC VIỆT";
    }
    function chucnang2 (){
      echo "dsd";
    }
    function chucnang3 (){
      echo "ABC";
    }

    function chucnang5 (){
      echo "ƯERWW";
    }
    //gửi mail xác nhận
    /*public function SendMail(){
      $auth = Auth::guard('cus')->user();
    Mail::send('emails.send', compact('donhang','auth'), function($email) use($auth) {
      $email -> subject('G Shop - XÁC NHẬN ĐƠN HÀNG');
      $email -> to($auth->email, $auth->name);
    });
    }*/
}
