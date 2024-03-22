<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
