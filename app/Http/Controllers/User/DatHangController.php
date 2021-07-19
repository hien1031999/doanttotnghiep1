<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhachHang;
use App\Models\HoaDon;
use App\Models\GioHang;
use App\Models\ChiTietHoaDon;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\User\datetime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DatHangController extends Controller
{
    public function index(){
        return view('user.page.dat-hang.dathang');
    }

    public function datHang(Request $req) {
        $this->validate($req,
            [   
                'email'=>'unique:khach_hang,email',
                'phone'=>'min:10',
                'diachi'=>'min:10',
                
            ],
            [
                'email.unique'=>'Email đã tồn tại, hãy ĐĂNG NHẬP để đặt hàng hoặc nhập 1 Email khác!',
                'phone.min'=>'Số điện thoại không đúng định dạng!',
                'diachi.min'=>'Địa chỉ nhận hàng phải rõ ràng!',
            ]
            );
        $giohang = Session::get('cart');
        if (Auth::check()) {     
            $hoadon = new HoaDon;
            $hoadon->khach_hang_id = Auth::user()->id;
            $hoadon->ngay_dat = date('Y-m-d');
            $hoadon->tong_tien = $giohang->tongTien;
            $hoadon->dia_chi_nhan = $req->diachi;
            $hoadon->ghi_chu = $req->ghichu;
            $hoadon->save();

            foreach($giohang->items as $key => $value) {
                $chitiethoadon = new ChiTietHoaDon;
                $chitiethoadon->hoa_don_id = $hoadon->id;
                $chitiethoadon->san_pham_id = $key;
                $chitiethoadon->so_luong = $value['so_luong'];
                $chitiethoadon->don_gia = ($value['gia']/$value['so_luong']);
                $chitiethoadon->thanh_tien = ($value['gia']/$value['so_luong'])*$value['so_luong'];
                $chitiethoadon->save();
            }
            Session::forget('cart');
            return redirect()->route('trangchu')->with('message','Đặt hàng thành công !');
        }
        else
        {
            $khachhang = new KhachHang;
            $khachhang->email = $req->email;
            $khachhang->password = Hash::make('0123456789');
            $khachhang->vai_tro_id = 1;
            $khachhang->ten = $req->hoten;
            $khachhang->sdt = $req->phone;
            $khachhang->gioi_tinh = $req->gioitinh;
            $khachhang->save();

            $hoadon = new HoaDon;
            $hoadon->khach_hang_id = $khachhang->id;
            $hoadon->ngay_dat = date('Y-m-d');
            $hoadon->tong_tien = $giohang->tongTien;
            $hoadon->dia_chi_nhan = $req->diachi;
            $hoadon->ghi_chu = $req->ghichu;
            $hoadon->save();

            foreach($giohang->items as $key => $value) {
                $chitiethoadon = new ChiTietHoaDon;
                $chitiethoadon->hoa_don_id = $hoadon->id;
                $chitiethoadon->san_pham_id = $key;
                $chitiethoadon->so_luong = $value['so_luong'];
                $chitiethoadon->don_gia = ($value['gia']/$value['so_luong']);
                $chitiethoadon->thanh_tien = ($value['gia']/$value['so_luong'])*$value['so_luong'];
                $chitiethoadon->save();
            }
            Session::forget('cart');
            // $mes = 'Đặt hàng thành công! Chúng tôi tự tạo tài khoản cho bạn là: Email = '+$req->email+' Password = 0123456789';
            return redirect()->route('trangchu')->with('message','Đặt hàng thành công !');
        }


    }
}
