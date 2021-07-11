@extends('user.master')
@section('content')

<section class="bread-crumb clearfix">
    <span class="crumb-border"></span>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 a-left">
                <ul class="breadcrumb">					
                    <li class="home">
                        <a itemprop="url" href="trangchu" ><span >Trang chủ</span></a>						
                        <span class="mr_lr"> <i class="fa fa-angle-right"></i> </span>
                    </li>
                    <li><strong ><span >{{$loaisp->ten}}</span></strong></li>
                    

                    @if(Session::get('message'))
                        <div class="alert alert-success" style='text-align: center;'>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>  

<div class="container margin-bottom-15 bg_white">
    <div class="wrp_border_collection">
        <div class="row">
            <section class="main_container collection collection_container col-lg-9 col-md-9 col-sm-12 col-lg-push-3 col-md-push-3">
                <div class="page_title margin-top-5">
                    <h1 class="title_page_h1">

                    <span>{{$loaisp->ten_loai}}</span>
                     </h1>
                </div>
                
                <div class="category-products products">
                    
                <div class="sortPagiBar">
                
                    <div class="srt">
                        <div class="wr_sort col-sm-12">
                            <div class="text-sm-right">
                                <div class="sortPagiBar sortpage text-sm-right">
                                    <div id="sort-by">
                                        <label class="left hidden-xs">Sắp xếp: </label>
                                        <div class="border_sort">
                                            <select name="sort" id="sort">
                                                <option class="valued" value="{{Request::url()}}?sort_by=none">Mặc định</option>
                                                <option value="{{Request::url()}}?sort_by=tang-dan">Giá tăng dần</option>
                                                <option value="{{Request::url()}}?sort_by=giam-dan">Giá giảm dần</option>
                                                <option value="{{Request::url()}}?sort_by=moi-cu">Mới đến cũ</option>
                                                <option value="{{Request::url()}}?sort_by=cu-moi">Cũ đến mới</option>
                                                <option value="{{Request::url()}}?sort_by=A-Z">Từ A->Z</option>
                                                <option value="{{Request::url()}}?sort_by=Z-A">Từ Z->A</option>
                                            </select>        
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

<!-- San pham -->
<section class="products-view products-view-grid collection_reponsive">
    <div class="row">
        @foreach($sp_theoloai as $sp)
            
                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 product-col">
                    <div class="item saler_item">
                                        
                        <div class="product-box">															
                            <div class="product-thumbnail">
                                @if($sp->giam_gia>0)
                                <span class="sale_count">
                                    <span class="bf_">- {{$sp->giam_gia}}% </span>
                                </span>
                                @endif
                                <a href="{{route('chitietsanpham',$sp->id)}}" class="image_link display_flex" data-images="anh_sp/{{$sp->san_pham->hinh_anh}}"  title="{{$sp->ten_sp}}">
                                    <img style="width: 500px; height: 500px;" class="img-responsive lazyload" src="anh_sp/{{$sp->san_pham->hinh_anh}}" data-src="anh_sp/{{$sp->san_pham->hinh_anh}}" alt="{{$sp->ten_sp}}"/>
                                </a>

                                <div class="product-action-grid clearfix">
                                    <form action="/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-9746938" enctype="multipart/form-data">
                                        <div>
                                            <a title="xem nhanh" href="{{route('chitietsanpham',$sp->id)}}" data-handle="{{$sp->ten_sp}}" class="button_wh_40 btn_view right-to quick-view"><i class="fa fa-search"></i>
                                                <span class="tooltips qv"><span>Xem nhanh</span></span>
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="product-info">
            
                                <div class="reviews-product-list grid_reviews">
                                    <div class="bizweb-product-reviews-badge" data-id="9746938"></div>
                                </div>
            
                                <h3 class="product-name"><a class="text2line" href="/giay-converse-star-collar-break" title="{{$sp->ten_sp}}">{{$sp->ten_sp}}</a></h3>

                                @if($sp->giam_gia>0)
                                    <div class="price-box clearfix">			
                                        <span class="price product-price-old">
                                        {{number_format($sp->gia,0,",",".")}} đ		
                                        </span>		
                                        <span class="price product-price">{{number_format($sp->gia*((100-$sp->giam_gia)/100),0,",",".")}} đ</span>
                                    </div>
                                @else
                                    <div class="price-box clearfix">
                                        <span class="price product-price">{{number_format($sp->gia,0,",",".")}} đ</span>
                                    </div>
                                @endif

            
            
                                <div class="action__">
            
                                    <form action="{{route('cart-add',$sp->id)}}" method="GET">
                                        <div>
                                            <input type="hidden"/>
                                            <button class=" cart_button_style btn-cart left-to add_to_cart" title="Thêm vào giỏ hàng">
                                                <span>
                                                    <span class="fa fa-shopping-basket"></span>
                                                </span>
                                                Giỏ hàng
                                            </button>
                                        </div>
                                    </form>

                                </div>

                        </div>
                    </div>			
                </div>  
            </div>
        
    @endforeach
<!--End 1 sp  -->


<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 product-col">
<!-- <div class="item saler_item"> -->
<div class="product-box">															
<div class="product-thumbnail">

</div>
</div>			
</div>
</div>		
        
</section>		
                
 </div>
</section>
        
        <aside class="dqdt-sidebar sidebar left left-content col-xs-12 col-lg-3 col-md-3 col-sm-12  col-lg-pull-9 col-md-pull-9">
            

<script src="//bizweb.dktcdn.net/100/286/794/themes/637857/assets/search_filter.js?1618737291739" type="text/javascript"></script>
<div class="aside-filter">
<div class="filter-container thismobile">	
    <div class="filter-container__selected-filter" style="display: none;">
        <div class="filter-container__selected-filter-header clearfix">
            <span class="filter-container__selected-filter-header-title"><i class="fa fa-arrow-left hidden-sm-up"></i> Bạn chọn</span>
            <a href="javascript:void(0)" onclick="clearAllFiltered()" class="filter-container__clear-all">Bỏ hết <i class="fa fa-angle-right"></i></a>
        </div>
        <div class="filter-container__selected-filter-list">
            <ul></ul>
        </div>
    </div>
</div>
<div class="aside-title-filter">
    <h2><span>Tìm Theo</span></h2>
</div>



<aside class="aside-item filter-price">
    <div class="aside-title aside-title-fillter">
        <div class="title_module"><h2><span>Khoảng giá</span></h2></div>
    </div>
    <div class="aside-content filter-group">
        <ul name="sort-price" id="sort-price" >

            <li><a href="{{Request::url()}}?price=1">Dưới 300.000 đ</a></li>
            <li><a href="{{Request::url()}}?price=2">Từ 300.000 đ - 500.000 đ</a></li>
            <li><a href="{{Request::url()}}?price=3">Từ 500.000 đ - 700.000 đ</a></li>
            <li><a href="{{Request::url()}}?price=4">Từ 700.000 đ - 1.000.000 đ</a></li>
            <li><a href="{{Request::url()}}?price=5">Từ 1.000.000 đ - 1.200.000 đ</a></li>
            <li><a href="{{Request::url()}}?price=6">Từ 1.200.000 đ - 1.500.000 đ</a></li>
            <li><a href="{{Request::url()}}?price=7">Từ 1.500.000 đ - 2.000.000 đ</a></li>
            <li><a href="{{Request::url()}}?price=8">Lớn hơn 2.000.000 đ</a></li>
                                   
        </ul>
    </div>
</aside>





</div>
	
            <span class="border-das-sider"></span>
        </aside>
        <div id="open-filters" class="open-filters hidden-lg hidden-md">
            <span class="fter">
                <i class="fa fa-filter"></i>
                <span>Lọc</span>
            </span>
        </div>
        
    </div>
</div>
</div>
      
</body>
</html>
@endsection

