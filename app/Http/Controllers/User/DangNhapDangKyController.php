<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\KhachHang;

class DangNhapDangKyController extends Controller
{
    //
    public function index(){
        return view('user.dangnhapdangky');
    }
    public function __construct()
    {
    }

    public function dangky(Request $request) {

        $validator = Validator::make($request->all(), [
            'txtemail'=>'required|email|unique:khach_hang,email',
                'txtpassword'=>'required|min:6|',
                'txtname'=>'required',
                'txtphone'=>'required|min:10|',
                'txtrepassword'=>'required|same:txtpassword'
        ],
        [
            'txtemail.required'=>'Vui lòng nhập email!',
                'txtemail.email'=>'Không đúng định dạng email!',
                'txtemail.unique'=>'Email đã tồn tại!',

                'txtpassword.required'=>'Vui lòng nhập mật khẩu!',
                'txtpassword.min'=>'Mật khẩu ít nhất 6 ký tự!',
                
                'txtname.required'=>'Vui lòng nhập họ tên!',

                'txtphone.required'=>'Vui lòng nhập số điện thoại!',
                'txtphone.min'=>'Số điện thoại không đúng định dạng!',

                'txtrepassword.required'=>'Vui lòng nhập nhập lại mật khẩu!',
                'txtrepassword.same'=>'Mật khẩu không trùng khớp!',
        ]);
        if($validator->fails()) {
            return back()->with('toast_error',$validator->messages()->all()[0])->withInput();
        }


        $user = new khachhang;
        $user->ten = $request->txtname;
        $user->email = $request->txtemail;
        $user->sdt = $request->txtphone;
        $user->password = Hash::make($request->txtpassword);
        $user->vai_tro_id = 1;
        $user->save();
        alert()->success('Đăng ký thành công!');
        return back();
    }


    public function kiemTraDangNhap(Request $request){

        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20',
        ],
        [
            'email.required'=>'Vui lòng nhập Email',
            'email.email'=>'Email không đúng định dạng!',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự!',
            'password.max'=>'Mật khẩu không quá 20 ký tự!'
        ]);
        
        if($validator->fails()) {
            return back()->with('toast_error',$validator->messages()->all()[0])->withInput();
        }
        
        
        $credentials = [
            'email'         => $request->email,
            'password'      => $request->password
        ];

        if(Auth::attempt($credentials)) {
            alert()->success('Đăng nhập thành công!');
            return redirect()->route('trangchu');
        } else{
            alert()->error('Email hoặc Pasword chưa chính xác!');
            return back();
        }
    }

    public function dangxuat() {
        Auth::logout();
        alert()->success('Đăng xuất thành công!');
        return back();
    }

  
}
