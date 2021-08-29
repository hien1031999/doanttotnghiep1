<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng</title>
    <base href="{{asset('')}}">
    <link href='assetsUser/css/style2.css' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> 
    <script src='assetsUser/js/script2.js'></script>
    <script src='assetsUser/js/script3.js'></script>


    

</head>

@if(count($errors)>0)
 		<div class= "alert alert-danger">
			 <ul>
				 @foreach ($errors->all() as $error)
				 <li> {{$error}} </li>
				 @endforeach
			</ul>
		</div>
@endif
<body data-no-turbolink="">
	<header class="banner">
		<div class="wrap">
			<div class="logo logo--left ">
	
                <h1 class="shop__name">
                    <div class="logo_top col-lg-3 col-md-3">
        
                        <a href="trangchu" class="logo-wrapper ">
                            <img src="//bizweb.dktcdn.net/100/286/794/themes/637857/assets/logo.png?1618737291739" alt="logo ">
                        </a>

                    </div>
                </h1>
	
            </div>
		</div>
	</header>


	<div class="content">
		<!-- <form action="{{route('dat-hang')}}" data-tg-refresh="checkout" id="checkoutForm" method="post" data-define="{
				loadingShippingErrorMessage: 'Không thể load phí vận chuyển. Vui lòng thử lại',
				loadingReductionCodeErrorMessage: 'Có lỗi xảy ra khi áp dụng khuyến mãi. Vui lòng thử lại',
				submitingCheckoutErrorMessage: 'Có lỗi xảy ra khi xử lý. Vui lòng thử lại',
				requireShipping: true,
				requireDistrict: false,
				requireWard: false,
				shouldSaveCheckoutAbandon: true}" action="/checkout/c68a360ec1344491884313dbb3c67508" data-bind-event-submit="handleCheckoutSubmit(event)" data-bind-event-keypress="handleCheckoutKeyPress(event)" data-bind-event-change="handleCheckoutChange(event)">
    
            <input type="hidden" name="_method" value="patch"> -->

            <form action="{{route('dat-hang')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="wrap">
                    <main class="main">
                        <header class="main__header">
                            <div class="logo logo--left ">

                                <h1 class="shop__name">
                                    <div class="logo_top col-lg-3 col-md-3">
            
                                        <a href="trangchu" class="logo-wrapper ">
                                            <img src="//bizweb.dktcdn.net/100/286/794/themes/637857/assets/logo.png?1618737291739" alt="logo ">
                                        </a>

                                    </div>
                                </h1>

                            </div>
                        </header>

                        <div class="main__content">
                            <article class="animate-floating-labels row">
                                <div class="col col--two">
                                    <section class="section">
                                        <div class="section__header">
                                            <div class="layout-flex">
                                                <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                    <i class="fa fa-id-card-o fa-lg section__title--icon hide-on-desktop"></i>

                                                    Thông tin nhận hàng

                                                </h2>


                                                <ul>
                                                    @if(Auth::check())
                                                        <li><a class="text-color">{{Auth::user()->ten}}</a>
                                                        <li><a class="text-color" href="dangxuat" title="Đăng xuất">Đăng Xuất</a>
                                                    @else
                                                        <li><a class="text-color" href="dangnhapdangky" title="Đăng nhập">Đăng nhập hoặc Đăng ký</a>
                                                    @endif
                                                </ul>


                                            </div>
                                        </div>

                                            <div class="section__content">
                                                <div class="fieldset">
                                                    <!-- <div class="field " data-bind-class="{'field--show-floating-label': email}">
                                                        <div class="field__input-wrapper">
                                                            <label for="email" class="field__label">
                                                                Email<span style="color: red">*</span><br>
                                                                <span style="color: red; font-size: 15px"></span>
                                                            </label>
                                                            
                                                            <input @if(Auth::check()) name="email2" @else name="email" @endif  id="email" type="email" class="field__input" required="" @if(Auth::check()) value="{{Auth::user()->email}}" @endif>
                                                            
                                                        </div>

                                                    </div> -->



                                                    <div class="field " data-bind-class="{'field--show-floating-label': billing.name}">
                                                        <div class="field__input-wrapper">
                                                            <label for="billingName" class="field__label">Họ và tên người nhận hàng<span style="color: red">*</label>
                                                            <input name="hoten" id="hoten" type="text" class="field__input" required="" @if(Auth::check()) value="{{Auth::user()->ten}}" @endif>
                                                        </div>

                                                    </div>

                                                    <div class="field " data-bind-class="{'field--show-floating-label': billing.gender}">
                                                        <div class="field__input-wrapper">
                                                            <label for="billingGender" class="field__label">Giới tính<span style="color: red">*</label>
                                                            @if(Auth::check())
                                                                @if(Auth::user()->gioi_tinh=="Nam")
                                                                    <input type="radio" name="gioitinh" value="Nam" id="gioitinh" checked required=""> Nam
                                                                    <input type="radio" name="gioitinh" value="Nữ" id="gioitinh" required=""> Nữ
                                                                @elseif(Auth::user()->gioi_tinh=="Nữ")
                                                                    <input type="radio" name="gioitinh" value="Nam" id="gioitinh" required=""> Nam
                                                                    <input type="radio" name="gioitinh" value="Nữ" id="gioitinh"  checkedrequired=""> Nữ
                                                                @else
                                                                    <input type="radio" name="gioitinh" value="Nam" id="gioitinh" required=""> Nam
                                                                    <input type="radio" name="gioitinh" value="Nữ" id="gioitinh"> Nữ
                                                                @endif
                                                            @else
                                                                <input type="radio" name="gioitinh" value="Nam" id="gioitinh" required=""> Nam
                                                                <input type="radio" name="gioitinh" value="Nữ" id="gioitinh"required=""> Nữ
                                                            @endif

                                                        </div>

                                                    </div>

                                                    <div class="field " data-bind-class="{'field--show-floating-label': billing.phone}">
                                                        <div class="field__input-wrapper">
                                                            <label for="billingPhone" class="field__label">
                                                                Số điện thoại người nhận<span style="color: red">*
                                                            </label>
                                                                <span style="color:red;"></span>
                                                                <span style="color: red; font-size: 15px"></span>
                                                            <input name="sdt" id="sdt" type="tel" class="field__input" required="" maxlength="10" @if(Auth::check()) value="{{Auth::user()->sdt}}" @endif>
                                                        </div>

                                                    </div>
                                                    


                                                    <div class="field " data-bind-class="{'field--show-floating-label': billing.address}">
                                                        <div class="field__input-wrapper">
                                                            <label for="billingAddress" class="field__label">
                                                                Địa chỉ nhận hàng<span style="color: red">*</span > <span style="font-size: 15px">(Đường/Hẻm, Phường/Xã, Quận/Huyện, Tỉnh/TP)</span >
                                                                <span style="color: red"></span ><br>
                                                                <span style="color: red; font-size: 15px"></span>
                                                            </label>
                                                            <textarea name="diachi" id="diachi" type="text" class="field__input" required=""></textarea>
                                                        </div>

                                                    </div>

                                                    
                                                        
                                                    <div class="field " data-bind-class="{'field--show-floating-label': note}">
                                                        <div class="field__input-wrapper">
                                                            <label for="note" class="field__label">
                                                                Ghi chú (tùy chọn)
                                                            </label>
                                                            <textarea name="ghichu" id="ghichu" type="text" class="field__input" ></textarea>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <!-- </form> -->
                                        
                                    </section>

                                </div>
                                <div class="col col--two">
<!-- 
                                    <section class="section">
                                        <div class="section__header">
                                            <div class="layout-flex">
                                                <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                    <i class="fa fa-truck fa-lg section__title--icon hide-on-desktop"></i>
                                                    Vận chuyển
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="section__content" data-tg-refresh="refreshShipping" id="shippingMethodList" data-define="{isAddressSelecting: true, shippingMethods: []}">
                                            <div class="alert alert--loader spinner spinner--active hide" data-bind-show="isLoadingShippingMethod">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                                    <use href="#spinner"></use>
                                                </svg>
                                            </div>


                                            <div class="alert alert-retry alert--danger hide" data-bind-event-click="handleShippingMethodErrorRetry()" data-bind-show="!isLoadingShippingMethod &amp;&amp; !isAddressSelecting &amp;&amp; isLoadingShippingError">
                                                <span data-bind="loadingShippingErrorMessage">Không thể load phí vận chuyển. Vui lòng thử lại</span> <i class="fa fa-refresh"></i>
                                            </div>


                                            <div class="alert alert--info" data-bind-show="!isLoadingShippingMethod &amp;&amp; isAddressSelecting">
                                                Vui lòng nhập thông tin giao hàng
                                            </div>
                                        </div>
                                    </section> -->

                                    <section class="section">
                                        <div class="section__header">
                                            <div class="layout-flex">
                                                <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                    <i class="fa fa-credit-card fa-lg section__title--icon hide-on-desktop"></i>
                                                    Thanh toán
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="section__content">

                                            <div class="content-box">

                                                <div class="content-box__row">
                                                    <div class="radio-wrapper">
                                                        <div class="radio__input">
                                                            <input name="paymentMethod" value="COD" type="radio" class="input-radio" data-bind="paymentMethod" checked="">
                                                        </div>
                                                        <label for="paymentMethod-293126" class="radio__label">
                                                            <span class="radio__label__primary">Thanh toán khi giao hàng (COD)</span>
                                                            <span class="radio__label__accessory">
                                                                <span class="radio__label__icon">
                                                                    <i class="payment-icon payment-icon--4"></i>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>

                                                    <div class="content-box__row__desc" data-bind-show="paymentMethod == 293126">
                                                        <p>COD</p>

                                                    </div>

                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <br>
                                        <span style="font-size:19px;font-weight:bold;">Hoặc thanh toán online với</span><br>
                                        <div class="col-md-12">
                                            <!-- @php
                                            $vnd_to_usd =  Session('cart')->tongTien/22790;
                                            @endphp
                                            <div style="padding-top: 10px;" id="paypal-button"></div>
                                            <input type="hidden" id="vndtousd" value="{{round($vnd_to_usd,2)}}">     -->
                                            <div id="paypal-button-container"></div>
                                        </div>
                                    </section>
                                </div>
                            </article>

                            <!-- <div class="field__input-btn-wrapper field__input-btn-wrapper--vertical hide-on-desktop">
                                <button type="submit" class="btn btn-checkout spinner" data-bind-class="{'spinner--active': isSubmitingCheckout}" data-bind-disabled="isSubmitingCheckout || isLoadingReductionCode">
                                    <span class="spinner-label">ĐẶT HÀNG</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                        <use href="#spinner"></use>
                                    </svg>
                                </button>

                                <a href="giohang" class="previous-link">
                                    <i class="previous-link__arrow">❮</i>
                                    <span class="previous-link__content">Quay về giỏ hàng</span>
                                </a>

                            </div>

                            <div id="common-alert" data-tg-refresh="refreshError">


                                <div class="alert alert--danger hide-on-desktop hide" data-bind-show="!isSubmitingCheckout &amp;&amp; isSubmitingCheckoutError" data-bind="submitingCheckoutErrorMessage">Có lỗi xảy ra khi xử lý. Vui lòng thử lại</div>
                            </div> -->
                        </div>
                    </main>


                    @if(Session::has('cart'))
                        
                            <aside class="sidebar">
                                <div class="sidebar__header">
                                    <h2 class="sidebar__title">
                                        Tổng số lượng ({{Session('cart')->tongSL}} sản phẩm)
                                    </h2>
                                </div>
                                <div class="sidebar__content">
                                    <div id="order-summary" class="order-summary order-summary--is-collapsed">
                                        <div class="order-summary__sections">
                                            <div class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
                                                <table class="product-table">
                                                    <!-- <caption class="visually-hidden">Chi tiết đơn hàng</caption>
                                                    <thead class="product-table__header">
                                                        <tr>
                                                            <th>
                                                                <span class="visually-hidden">Ảnh sản phẩm</span>
                                                            </th>
                                                            <th>
                                                                <span class="visually-hidden">Mô tả</span>
                                                            </th>
                                                            <th>
                                                                <span class="visually-hidden">Sổ lượng</span>
                                                            </th>
                                                            <th>
                                                                <span class="visually-hidden">Đơn giá</span>
                                                            </th>
                                                        </tr>
                                                    </thead> -->
                                                    <tbody>
                                                        @foreach($product_cart as $product)
                                                            
                                                                <tr class="product">
                                                                    <td class="product__image">
                                                                        <div class="product-thumbnail">
                                                                            <div class="product-thumbnail__wrapper" data-tg-static="">

                                                                                <img src="anh_sp/{{$product['hinh_anh']}}" alt="" class="product-thumbnail__image">

                                                                            </div>
                                                                            <span class="product-thumbnail__quantity">{{$product['so_luong']}}</span>
                                                                        </div>
                                                                    </td>
                                                                    <th class="product__description">
                                                                        <span class="product__description__name">
                                                                            {{$product['item']['ten_sp']}}
                                                                        </span>

                                                                        <span class="product__description__property">
                                                                            {{$product['item']['mau_sac']}}
                                                                        </span>


                                                                    </th>
                                                                    @if($product['item']['giam_gia']>0)
                                                                        <td class="product__price">
                                                                            {{number_format($product['so_luong']*($product['item']['gia']*((100-$product['item']['giam_gia'])/100)),0,",",".")}} đ
                                                                        </td>
                                                                    @else
                                                                        <td class="product__price">
                                                                            {{number_format($product['so_luong']*$product['item']['gia'],0,",",".")}} đ
                                                                        </td>
                                                                    @endif
                                                                </tr>
                                                            
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <!-- <div class="order-summary__section order-summary__section--discount-code" data-tg-refresh="refreshDiscount" id="discountCode">
                                                <h3 class="visually-hidden">Mã khuyến mại</h3>
                                                <div class="edit_checkout animate-floating-labels">
                                                    <div class="fieldset">
                                                        <div class="field  ">
                                                            <div class="field__input-btn-wrapper">
                                                                <div class="field__input-wrapper">
                                                                    <label for="reductionCode" class="field__label">Nhập mã giảm giá</label>
                                                                    <input name="reductionCode" id="reductionCode" type="text" class="field__input" autocomplete="off" data-bind-disabled="isLoadingReductionCode" data-bind-event-keypress="handleReductionCodeKeyPress(event)" data-define="{reductionCode: null}" data-bind="reductionCode">
                                                                </div>
                                                                <button class="field__input-btn btn spinner btn--disabled" type="button" data-bind-disabled="isLoadingReductionCode || !reductionCode" data-bind-class="{'spinner--active': isLoadingReductionCode, 'btn--disabled': !reductionCode}" data-bind-event-click="applyReductionCode()" disabled="">
                                                                    <span class="spinner-label">Áp dụng</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                                                        <use href="#spinner"></use>
                                                                    </svg>
                                                                </button>
                                                            </div>

                                                            <p class="field__message field__message--error field__message--error-always-show hide" data-bind-show="!isLoadingReductionCode &amp;&amp; isLoadingReductionCodeError" data-bind="loadingReductionCodeErrorMessage">Có lỗi xảy ra khi áp dụng khuyến mãi. Vui lòng thử lại</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="order-summary__section order-summary__section--total-lines order-summary--collapse-element" data-define="{subTotalPriceText: '950.000₫'}" data-tg-refresh="refreshOrderTotalPrice" id="orderSummary">
                                                <table class="total-line-table">
                                                    <!-- <caption class="visually-hidden">Tổng giá trị</caption>
                                                        <thead>
                                                            <tr>
                                                                <td><span class="visually-hidden">Mô tả</span></td>
                                                                <td><span class="visually-hidden">Giá tiền</span></td>
                                                            </tr>
                                                        </thead> -->
                                                        <tbody class="total-line-table__tbody">
                                                            <tr class="total-line total-line--subtotal">
                                                                <th class="total-line__name">
                                                                    Tạm tính
                                                                </th>
                                                                <td class="total-line__price">{{number_format(Session('cart')->tongTien,0,",",".")}} đ</td>
                                                            </tr>

                                                            <!-- <tr class="total-line total-line--shipping-fee">
                                                                <th class="total-line__name">
                                                                    Phí vận chuyển
                                                                </th>
                                                                <td class="total-line__price" data-bind="getTextShippingPrice()">-</td>
                                                            </tr> -->

                                                        </tbody>
                                                        <tfoot class="total-line-table__footer">
                                                            <tr class="total-line payment-due">
                                                                <th class="total-line__name">
                                                                    <span class="payment-due__label-total">
                                                                        Tổng cộng
                                                                    </span>
                                                                </th>
                                                                <td class="total-line__price">
                                                                    <span class="payment-due__price">{{number_format(Session('cart')->tongTien,0,",",".")}} đ</span>
                                                                </td>
                                                            </tr>
                                                        </tfoot>

                                                </table>
                                            </div>
                                            <div class="order-summary__nav field__input-btn-wrapper hide-on-mobile layout-flex--row-reverse">
                                                <button type="submit" class="btn btn-checkout spinner" data-bind-class="{'spinner--active': isSubmitingCheckout}" data-bind-disabled="isSubmitingCheckout || isLoadingReductionCode">
                                                    <span class="spinner-label">ĐẶT HÀNG</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                                        <use href="#spinner"></use>
                                                    </svg>
                                                </button>


                                                <a href="giohang" class="previous-link">
                                                    <i class="previous-link__arrow">❮</i>
                                                    <span class="previous-link__content">Quay về giỏ hàng</span>
                                                </a>

                                            </div>

                                            <!-- <div id="common-alert-sidebar" data-tg-refresh="refreshError">
                                                <div class="alert alert--danger hide-on-mobile hide" data-bind-show="!isSubmitingCheckout &amp;&amp; isSubmitingCheckoutError" data-bind="submitingCheckoutErrorMessage">Có lỗi xảy ra khi xử lý. Vui lòng thử lại</div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </aside>
                    @endif
                </div>
            </form>

        </form>
		<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
			<symbol id="spinner">
				<svg viewBox="0 0 30 30">
					<circle stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-dasharray="85%" cx="50%" cy="50%" r="40%">
						<animateTransform attributeName="transform" type="rotate" from="0 15 15" to="360 15 15" dur="0.7s" repeatCount="indefinite"></animateTransform>
					</circle>
				</svg>
			</symbol>
		</svg>
	</div>

@include('sweetalert::alert')

{{-- Demo paypal --}}
    <script
        src="https://www.paypal.com/sdk/js?client-id=AR2AcmUID6cjIY2ymK6wWQe2yWSY--6BQu3cWkzt2HyGgRo_KcjPtNVA03Dm_LTr2Zm9QpsMYp-nTPom">
        // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
    </script>
    <script>
        paypal.Buttons({
            // Chỉnh css của nút pay pal
            style: {
                layout: 'horizontal',
                color: 'gold',
                shape: 'pill',
                label: 'paypal',
            },


            // Hàm khởi tạo thanh toán của paypal
            createOrder: function(data, actions) {
                
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                currency_code: 'USD',
                                value: "{{ round(Session::get('cart')->tongTien / 22790, 2) }}", // Lấy tổng thành tiền của hóa đơn để thanh toán thông qua session và chia cho 23.000 VNĐ để chuyên.

                            }
                        }]
                    });
                

            },

            //Hàm chạy sau khi chấp nhận thành toán của pay pal
            onApprove: function(data, actions) {

                // Authorize the transaction
                actions.order.authorize().then(function(authorization) {

                    // Get the authorization id
                    var authorizationID = authorization.purchase_units[0]
                        .payments.authorizations[0].id

                    // Call your server to validate and capture the transaction
                    return fetch('/paypal-transaction-complete', {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            orderID: data.orderID,
                            authorizationID: authorizationID
                        })

                    });
                });




                // This function captures the funds from the transaction.
                // Hàm xử lý kết quả sau khi thanh toán thành công
                return actions.order.capture().then(function(details) {

                    //Biến trạng thái của thanh toán paypal.

                    var paypal_ten = $('#hoten').val();
                    var paypal_sdt = $('#sdt').val();
                    var paypal_gioitinh = $('#gioitinh').val();
                    // var paypal_email = $('#email').val();
                    var paypal_diachi = $('#diachi').val();
                    var paypal_ghichu = $('#ghichu').val();

                    //Tạo form cho phương thức get sau khi thanh toán thành công.
                    var formReturnHome = document.createElement('form');
                    formReturnHome.method = 'GET';
                    formReturnHome.action = "{{ route('dathangpaythanhcong') }}";
                    document.body.appendChild(formReturnHome);

                    //PHương thức ajax gửi form mua hàng sau khi khách hàng chấp thuận thanh toán.
                    $.ajax({
                        url: "/dat-hang-paypal",
                        method: "POST", 
                        data: {
                            hoten: paypal_ten,
                            sdt: paypal_sdt,
                            gioitinh: paypal_gioitinh,
                            diachi: paypal_diachi,
                            // email: paypal_email,
                            ghichu: paypal_ghichu,
                            _token: $("input[name='_token']").val(),
                            
                        },
                        success: function(data) {
                            //Hiện confirm box thông báo đã thành toán thành công và chuyển sang trang chủ sau khi nhấp 'OK'.
                            formReturnHome.submit();
                        },
                        errors: function(data) {
                            alertify.error("Lỗi Tải Trang thanh toans");
                        }
                    });





                });

            }



        }).render('#paypal-button-container');
        //This function displays Smart Payment Buttons on your web page.
    </script>
</body>
</html>