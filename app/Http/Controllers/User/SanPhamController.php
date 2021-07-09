<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChiTietSP;
use App\Models\SanPham;
class SanPhamController extends Controller
{
    public function index() {
        // $sanpham = ChiTietSP::All();
        $sanpham = ChiTietSP::where('tinh_trang','0')->get();
        $hinhanhsp = SanPham::all();

        if(isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];

            if($sort_by=='tang-dan') {
                $sanpham = ChiTietSP::where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($sort_by=='giam-dan') {
                $sanpham = ChiTietSP::where('tinh_trang','0')->orderby('gia','DESC')->get();
            }
            elseif($sort_by=='moi-cu') {
                $sanpham = ChiTietSP::where('tinh_trang','0')->orderby('created_at','DESC')->get();
            }
            elseif($sort_by=='cu-moi') {
                $sanpham = ChiTietSP::where('tinh_trang','0')->orderby('created_at','ASC')->get();
            }
            elseif($sort_by=='A-Z') {
                $sanpham = ChiTietSP::where('tinh_trang','0')->orderby('ten_sp','ASC')->get();
            }
            elseif($sort_by=='Z-A') {
                $sanpham = ChiTietSP::where('tinh_trang','0')->orderby('ten_sp','DESC')->get();
            }

        }

        if(isset($_GET['price'])) {
            $price = $_GET['price'];

            if($price=='0') {
                $sanpham = ChiTietSP::where('gia','<',300000)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='2') {
                $sanpham = ChiTietSP::whereBetween('gia',[300000, 500000])->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='3') {
                $sanpham = ChiTietSP::whereBetween('gia',[500000, 700000])->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='4') {
                $sanpham = ChiTietSP::whereBetween('gia',[700000, 1000000])->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='5') {
                $sanpham = ChiTietSP::whereBetween('gia',[1000000, 1200000])->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='6') {
                $sanpham = ChiTietSP::whereBetween('gia',[1200000, 1500000])->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='7') {
                $sanpham = ChiTietSP::whereBetween('gia',[1500000, 2000000])->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='8') {
                $sanpham = ChiTietSP::where('gia','>',2000000)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }

        }

        return view('user.page.san-pham.sanpham',compact('sanpham','hinhanhsp'));
    }
    public function new() {
        $sanpham = ChiTietSP::where('new',1)->get();
        $hinhanhsp = SanPham::all();
        

        if(isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];

            if($sort_by=='tang-dan') {
                $sanpham = ChiTietSP::where('new',1)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($sort_by=='giam-dan') {
                $sanpham = ChiTietSP::where('new',1)->where('tinh_trang','0')->orderby('gia','DESC')->get();
            }
            elseif($sort_by=='moi-cu') {
                $sanpham = ChiTietSP::where('new',1)->where('tinh_trang','0')->orderby('created_at','DESC')->get();
            }
            elseif($sort_by=='cu-moi') {
                $sanpham = ChiTietSP::where('new',1)->where('tinh_trang','0')->orderby('created_at','ASC')->get();
            }
            elseif($sort_by=='A-Z') {
                $sanpham = ChiTietSP::where('new',1)->where('tinh_trang','0')->orderby('ten_sp','ASC')->get();
            }
            elseif($sort_by=='Z-A') {
                $sanpham = ChiTietSP::where('new',1)->where('tinh_trang','0')->orderby('ten_sp','DESC')->get();
            }

        }

        if(isset($_GET['price'])) {
            $price = $_GET['price'];

            if($price=='1') {
                $sanpham = ChiTietSP::where('gia','<',300000)->where('new',1)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='2') {
                $sanpham = ChiTietSP::whereBetween('gia',[300000, 500000])->where('new',1)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='3') {
                $sanpham = ChiTietSP::whereBetween('gia',[500000, 700000])->where('new',1)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='4') {
                $sanpham = ChiTietSP::whereBetween('gia',[700000, 1000000])->where('new',1)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='5') {
                $sanpham = ChiTietSP::whereBetween('gia',[1000000, 1200000])->where('new',1)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='6') {
                $sanpham = ChiTietSP::whereBetween('gia',[1200000, 1500000])->where('new',1)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='7') {
                $sanpham = ChiTietSP::whereBetween('gia',[1500000, 2000000])->where('new',1)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($price=='8') {
                $sanpham = ChiTietSP::where('gia','>',2000000)->where('new',1)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }

        }
  
        return view('user.page.san-pham.sanpham',compact('sanpham','hinhanhsp'));
    }

    public function sale() {
        $sanpham = ChiTietSP::where('giam_gia','<>',0)->get();
        $hinhanhsp = SanPham::all();

        if(isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];

            if($sort_by=='tang-dan') {
                $sanpham = ChiTietSP::where('giam_gia','<>',0)->where('tinh_trang','0')->orderby('gia','ASC')->get();
            }
            elseif($sort_by=='giam-dan') {
                $sanpham = ChiTietSP::where('giam_gia','<>',0)->where('tinh_trang','0')->orderby('gia','DESC')->get();
            }
            elseif($sort_by=='moi-cu') {
                $sanpham = ChiTietSP::where('giam_gia','<>',0)->where('tinh_trang','0')->orderby('created_at','DESC')->get();
            }
            elseif($sort_by=='cu-moi') {
                $sanpham = ChiTietSP::where('giam_gia','<>',0)->where('tinh_trang','0')->orderby('created_at','ASC')->get();
            }
            elseif($sort_by=='A-Z') {
                $sanpham = ChiTietSP::where('giam_gia','<>',0)->where('tinh_trang','0')->orderby('ten_sp','ASC')->get();
            }
            elseif($sort_by=='Z-A') {
                $sanpham = ChiTietSP::where('giam_gia','<>',0)->where('tinh_trang','0')->orderby('ten_sp','DESC')->get();
            }

        }

        if(isset($_GET['price'])) {
            $price = $_GET['price'];
            
            if($price=='1') {
                $sanpham = ChiTietSP::where('gia','<',300000)->where('giam_gia','<>',0)->where('tinh_trang','0')->get();
            }
            elseif($price=='2') {
                $sanpham = ChiTietSP::whereBetween('gia',[300000, 500000])->where('giam_gia','<>',0)->where('tinh_trang','0')->get();
            }
            elseif($price=='3') {
                $sanpham = ChiTietSP::whereBetween('gia',[500000, 700000])->where('giam_gia','<>',0)->where('tinh_trang','0')->get();
            }
            elseif($price=='4') {
                $sanpham = ChiTietSP::whereBetween('gia',[700000, 1000000])->where('giam_gia','<>',0)->where('tinh_trang','0')->get();
            }
            elseif($price=='5') {
                $sanpham = ChiTietSP::whereBetween('gia',[1000000, 1200000])->where('giam_gia','<>',0)->where('tinh_trang','0')->get();
            }
            elseif($price=='6') {
                $sanpham = ChiTietSP::whereBetween('gia',[1200000, 1500000])->where('giam_gia','<>',0)->where('tinh_trang','0')->get();
            }
            elseif($price=='7') {
                $sanpham = ChiTietSP::whereBetween('gia',[1500000, 2000000])->where('giam_gia','<>',0)->where('tinh_trang','0')->get();
            }
            elseif($price=='8') {
                $sanpham = ChiTietSP::where('gia','>',2000000)->where('giam_gia','<>',0)->where('tinh_trang','0')->get();
            }

        }

        return view('user.page.san-pham.sanpham',compact('sanpham','hinhanhsp'));

    }

    public function searchcat()
    {
    
        $cat = \Input::get('cat');
    
        $cat = (int) $cat;
    
        $vacancies = \Vacancy::where('category_id', '=', $cat)->get();
    
        return \View::make('vacancies.empty')->with('vacancies', $vacancies); 
    
    }
}
