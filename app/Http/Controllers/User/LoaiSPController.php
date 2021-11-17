<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChiTietSP;
use App\Models\LoaiSP;
use App\Models\SanPham;

class LoaiSPController extends Controller
{
    public function index($type) {
        $loaisp = LoaiSP::where('id',$type)->first();
        $sp_theoloai = ChiTietSP::where('loai_sp_id',$type)->where('tinh_trang','0')->get();

        if(isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];

            if($sort_by=='tang-dan') {
                $sp_theoloai = ChiTietSP::where('loai_sp_id',$type)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($sort_by=='giam-dan') {
                $sp_theoloai = ChiTietSP::where('loai_sp_id',$type)->where('tinh_trang','0')->orderby('gia','DESC')->get();
            }
            elseif($sort_by=='moi-cu') {
                $sp_theoloai = ChiTietSP::where('loai_sp_id',$type)->where('tinh_trang','0')->orderby('created_at','DESC')->get();
            }
            elseif($sort_by=='cu-moi') {
                $sp_theoloai = ChiTietSP::where('loai_sp_id',$type)->where('tinh_trang','0')->orderby('created_at','ASC')->get();
            }
            elseif($sort_by=='A-Z') {
                $sp_theoloai = ChiTietSP::where('loai_sp_id',$type)->where('tinh_trang','0')->orderby('ten_sp','ASC')->get();
            }
            elseif($sort_by=='Z-A') {
                $sp_theoloai = ChiTietSP::where('loai_sp_id',$type)->where('tinh_trang','0')->orderby('ten_sp','DESC')->get();
            }

        }

        if(isset($_GET['price'])) {
            $price = $_GET['price'];

            if($price=='1') {
                $sp_theoloai = ChiTietSP::where('gia','<',300000)->where('loai_sp_id',$type)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='2') {
                $sp_theoloai = ChiTietSP::whereBetween('gia',[300000, 500000])->where('loai_sp_id',$type)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='3') {
                $sp_theoloai = ChiTietSP::whereBetween('gia',[500000, 700000])->where('loai_sp_id',$type)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='4') {
                $sp_theoloai = ChiTietSP::whereBetween('gia',[700000, 1000000])->where('loai_sp_id',$type)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='5') {
                $sp_theoloai = ChiTietSP::whereBetween('gia',[1000000, 1200000])->where('loai_sp_id',$type)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='6') {
                $sp_theoloai = ChiTietSP::whereBetween('gia',[1200000, 1500000])->where('loai_sp_id',$type)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='7') {
                $sp_theoloai = ChiTietSP::whereBetween('gia',[1500000, 2000000])->where('loai_sp_id',$type)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='8') {
                $sp_theoloai = ChiTietSP::where('gia','>',2000000)->where('loai_sp_id',$type)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }

        }

        if(isset($_GET['color'])) {
            $color = $_GET['color'];

            if($color=='black') {
                $sp_theoloai = ChiTietSP::where('mau_sac','Black')->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($color=='white') {
                $sp_theoloai = ChiTietSP::where('mau_sac','White')->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($color=='red') {
                $sp_theoloai = ChiTietSP::where('mau_sac','Red')->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($color=='navy') {
                $sp_theoloai = ChiTietSP::where('mau_sac','Navy')->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($color=='graphite') {
                $sp_theoloai = ChiTietSP::where('mau_sac','Graphite')->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($color=='pink') {
                $sp_theoloai = ChiTietSP::where('mau_sac','Pink')->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($color=='blue') {
                $sp_theoloai = ChiTietSP::where('mau_sac','Blue')->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($color=='green') {
                $sp_theoloai = ChiTietSP::where('mau_sac','Green')->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($color=='yellow') {
                $sp_theoloai = ChiTietSP::where('mau_sac','Yellow')->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }

        }

        if(isset($_GET['ngan'])) {
            $nganlap = $_GET['ngan'];

            if($nganlap=='14') {
                $sp_theoloai = ChiTietSP::where('ngan_lap','14')->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($nganlap=='15,6') {
                $sp_theoloai = ChiTietSP::where('ngan_lap','15.6')->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($nganlap=='17,3') {
                $sp_theoloai = ChiTietSP::where('ngan_lap','17.3')->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            
        }
        
        return view('user.page.loai-san-pham.loai_sp',compact('sp_theoloai','loaisp'));
    }
}
