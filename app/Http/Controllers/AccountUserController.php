<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AccountUserController extends Controller
{
    function accountpanel(){
        $user = DB::table("users")->whereRaw("id=?",[Auth::user()->id])->first();
        return view("users.accountuser",compact("user"));
    }

    function saveaccountinfo(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'photo' => ['nullable','image']
        ]);
        $id = $request->input('id'); 
        $data["name"] = $request->input("name");
        $data["phone"] = $request->input("phone");
        $data["email"] = $request->input("email");
        $data["address"] = $request->input("address");
        if($request->hasFile("photo"))
        {
            //Tạo tên file bằng cách lấy id của người dùng ghép với phần mở rộng của hình ảnh
            $fileName = Auth::user()->id . '.' . $request->file('photo')->extension(); 
            //File được lưu vào thư mục storage/app/public/profile
            $request->file('photo')->storeAs('public/profile', $fileName);
            $data['photo'] = $fileName;
        }

        DB::table("users")->where("id",$id)->update($data);
        return redirect()->route('account')->with('status', 'Cập nhật thành công');
    }


}

