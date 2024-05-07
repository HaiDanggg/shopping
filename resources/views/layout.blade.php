<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{-- SEO --}}
    <meta name="description" content="{{$meta_desc}}">
	<meta name="keywords" content="{{$meta_keywords}}"/>
	<meta name="robots" content="INDEX,FOLLLOW"/>
	<link rel="canonical" href="{{$url_canonical}}"/>
	<meta name="author" content="">
	<link rel="icon" type="image/x-icon" href="" />

	{{-- <meta property="og:image" content="{{ $image_og }}" /> --}}
	{{-- <meta property="og:site_name" content="http://localhost/shopping/" />
	<meta property="og:description" content="{{ $meta_desc }}" />
	<meta property="og:title" content="{{ $meta_title }}" />
	<meta property="og:url" content="{{ $url_canonical }}" />
	<meta property="og:type" content="website" /> --}}
	{{-- //SEO --}}
    <title>{{$meta_title}}</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Bootstrap JS -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="{{asset('public/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css') }}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css') }}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css') }}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/sweetalert.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ ('public/frontend/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ ('public/frontend/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ ('public/frontend/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ ('public/frontend/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ ('public/frontend/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						{{-- <div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div> --}}
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							{{-- <ul class="nav navbar-nav"> --}}
								{{-- <li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li> --}}
								{{-- <a href="#"><i class="fa fa-facebook"></i></a> &ensp;
								<a href="#"><i class="fa fa-twitter"></i></a> &ensp;
								<a href="#"><i class="fa fa-linkedin"></i></a> &ensp;
								<a href="#"><i class="fa fa-dribbble"></i></a> &ensp;
								<a href="#"><i class="fa fa-google-plus"></i></a> &ensp; --}}
							{{-- </ul> --}}
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left" style="padding-right: 50px">
							{{-- <a href=""><img src="{{ ('public/frontend/images/logoo.png') }}" alt="" width="100px"/></a> --}}
							<h2><img src="{{asset ('public/frontend/images/logo2.png') }}" alt="" width="200px"/></h2>
							
							{{-- <h2 style="color: #ffffff"><span style="color:#ffffff; font-size:45px ">Happy</span>-Shop</h2> --}}
						</div>
						<div class="btn-group pull-right">
							{{-- <div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div> --}}
							
							{{-- <div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div> --}}
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							{{-- <ul class="nav navbar-nav"> --}}
								{{-- <li style="list-style: none"> --}}
									<a href="#"><i class="fa fa-star"></i> Yêu thích</a> &emsp;
								{{-- </li> --}}
								<?php
									$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									if($customer_id != NULL && $shipping_id == NULL){
								?>
								{{-- <li style="list-style: none"> --}}
									<a href="{{ URL::to('/checkout') }}"><i class="fa fa-crosshairs"></i> Thanh toán</a> &emsp;
								{{-- </li> --}}
								<?php
									}elseif($customer_id != NULL && $shipping_id != NULL){
								?>

								{{-- <li style="list-style: none"> --}}
									<a href="{{ URL::to('/payment') }}"><i class="fa fa-crosshairs"></i> Thanh toán</a> &emsp;
								{{-- </li> --}}
								<?php
									}else{
								?>
								{{-- <li style="list-style: none"> --}}
									<a href="{{ URL::to('/dang-nhap') }}"><i class="fa fa-crosshairs"></i> Thanh toán</a> &emsp;
								{{-- </li> --}}
								<?php
									}
								?>

								{{-- <li style="list-style: none"> --}}
									{{-- <a href="{{ URL::to('/show-cart') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a> &emsp; --}}
									<a href="{{ URL::to('/gio-hang') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a> &emsp;
								
								{{-- </li> --}}
								<?php
									$customer_id = Session::get('customer_id');
									if($customer_id != NULL){
								?>
								{{-- <li style="list-style: none"> --}}
									
									<img width="5%" src="{{ Session::get('customer_picture') }} "><a style="color: #ffffff">{{ Session::get('customer_name') }}</a> &emsp;
									<a href="{{ URL::to('/logout-checkout') }}"><i class="fa fa-sign-out"></i> Đăng xuất</a> 
								{{-- </li> --}}
								&emsp;
								<?php
									}else{
								?>
								{{-- <li style="list-style: none"> --}}
									<a href="{{ URL::to('/dang-nhap') }}"><i class="fa fa-sign-in"></i> Đăng nhập</a> &emsp;
								{{-- </li> --}}
								<?php
									}
								?>
								
							{{-- </ul> --}}
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div style="padding-top: 8px" class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a style="color: #ffffff" href="{{URL::to('/trang-chu') }}" class="active">Trang chủ</a></li>
								{{-- <li class="dropdown"><a style="color: #ffffff" href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<ul role="menu" class="sub-menu">
											@foreach($cate_product as $key => $sanpham )
												<li><a href="{{ URL::to('/chi-tiet-san-pham/'.$sanpham->cate_post_slug) }}">{{ $sanpham->product_id }}</a></li>
											@endforeach
											
											
										</ul>
                                        
                                    </ul>
                                </li>  --}}
								<li><a style="color: #ffffff" href="{{ URL::to('/san-pham-khuyen-mai') }}">Khuyến mãi</a></li>
								<li class="dropdown"><a style="color: #ffffff" href="">Tin tức<i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
                                        @foreach($category_post as $key => $danhmucbaiviet )
											<li><a href="{{ URL::to('/danh-muc-bai-viet/'.$danhmucbaiviet->cate_post_slug) }}">{{ $danhmucbaiviet->cate_post_name }}</a></li>
										@endforeach
                                    </ul>
                                </li> 
								{{-- <li><a href="{{ URL::to('/show-cart') }}">Giỏ hàng</a></li> --}}
								<li><a style="color: #ffffff" href="{{ URL::to('/gio-hang') }}">Giỏ hàng</a></li>
								<li><a style="color: #ffffff" href="{{ URL::to('/lien-he') }}">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<form action="{{ URL::to('/tim-kiem') }}" method="POST">
							{{ csrf_field() }}
						<div class="search_box pull-right">
							<input type="text" style="border-radius: 5px" name="keywords_submit" placeholder="Tìm kiếm sản phẩm"/>
							<input type="submit" style="margin-top: 0;color:beige;background-image: linear-gradient(to bottom right,#00588e, #009494);border-radius:5px" name="search_items" class="btn btn-primary btn-sm" value="Tìm kiếm">
						</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider" style="background-image: linear-gradient(to bottom right,#4ADEDE, #1CA7EC)"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							@php
								$i=0;
							
							@endphp
							@foreach($slider as $key => $slide)
							@php
								$i++;
							
							@endphp
							<div class="item {{ $i==1 ? 'active' :  '' }}">
								<div class="col-sm-12">
									<img style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;" 
									alt="{{ $slide -> slider_desc }}" src="{{asset('public/uploads/slider/'.$slide -> slider_image)  }}" class="girl img-responsive" width="100%">
								</div>
							</div>
							@endforeach
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					<div class="main-marquee" style="margin-top:1%;background-color: #e38d2a;">
						<marquee class="marquee-content" behavior="" direction="left" scrollamount="5">
							Samsung đang mang đến người dùng trải nghiệm hoàn thiện, chuẩn mực nhất, tập trung vào các giá trị cốt lõi, thiết thực và bền vững. Hơn hết, Galaxy S23 series nói chung hay Galaxy S23 Ultra nói riêng vẫn có những cái tiến đáng giá nhất, thể hiện vị trí dẫn đầu và tiên phong trong phân khúc smartphone flagship hiện nay.
						</marquee>
					</div>
				</div>
				{{-- <div class="wrapper-site-main">
					
						<div class="container">
						<div class="col-md-12">
							<div id="slider-carousel" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
									<li data-target="#slider-carousel" data-slide-to="1"></li>
									<li data-target="#slider-carousel" data-slide-to="2"></li>
								</ol>
								
								<div class="carousel-inner">
									<div class="item active">
										<img src="{{asset ('public/frontend/images/pic1.png') }}" class="girl img-responsive" width="100%"  alt="" />
									</div>
									<div class="item">
										<img src="{{asset ('public/frontend/images/pic2.png') }}" class="girl img-responsive" width="100%"  alt="" />
									</div>
									
									<div class="item">
										<img src="{{asset ('public/frontend/images/pic3.png') }}" class="girl img-responsive" width="100%"  alt="" />
									</div>
								</div>
								
								<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								</a>
								<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
								
								
								<div class="main-marquee">
									<marquee class="marquee-content" behavior="" direction="left" scrollamount="5">
										Google chính thức xác nhận sự ra mắt của Pixel Watch, chạy Wear OS 3.0 xịn sò, dự kiến sẽ cạnh tranh với Apple Watch |
										Cách cập nhật Android 12 cho Vsmart cực kỳ đơn giản, giúp bạn trải nghiệm được nhiều tính năng mới mẻ nhất |
										Danh sách smartphone được lên đời Android 12: Từ Samsung, OPPO đến Xiaomi và nhiều hãng khác, thiết bị của bạn có tên không?
									</marquee>
								</div>
							</div>
						</div>
					</div> --}}
				</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar" >
						<h2>Danh mục sản phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach ($category as $key => $cate)
							<div class="panel panel-default">
								<div class="panel-heading">
									
									<h4 class="panel-title"><a href="{{URL::to ('/danh-muc-san-pham/'.$cate->category_id) }}">{{ $cate->category_name }}</a></h4>
									{{-- <h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#{{ $cate->slug_category_product }}">
										<span class="badge pull-right"><i class="fa fa-plus"></i></span>
										{{ $cate->category_name }}</a></h4> --}}
								</div>
								{{-- <div id="{{ $cate->slug_category_product }}" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Nike </a></li>
											<li><a href="#">Under Armour </a></li>
											<li><a href="#">Adidas </a></li>
											<li><a href="#">Puma</a></li>
											<li><a href="#">ASICS </a></li>
										</ul>
									</div>
								</div> --}}
							</div>
							@endforeach
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thương hiệu sản phẩm</h2>
							
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach ($brand as $key => $brand)
									<li><a href="{{URL::to ('/thuong-hieu-san-pham/'.$brand->brand_id) }}"> <span class="pull-right"></span>{{ $brand->brand_name }}</a></li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
						
						{{-- <div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range--> --}}
						
						{{-- <div class="shipping text-center"><!--shipping-->
							<img src="{{ ('public/frontend/images/shipping.jpg') }}" alt="" />
						</div><!--/shipping--> --}}
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					@yield('content')
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><img src="{{asset ('public/frontend/images/logo2.png') }}" alt="" width="200px"/></h2>
							<p>Cung cấp các thiết bị di động chính hãng trên toàn quốc</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset ('public/frontend/images/apple.png') }}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Apple</p>
								{{-- <h2>24 DEC 2014</h2> --}}
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset ('public/frontend/images/samsung.png') }}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>SamSung</p>
								{{-- <h2>24 DEC 2014</h2> --}}
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset ('public/frontend/images/oppo.png') }}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Oppo</p>
								{{-- <h2>24 DEC 2014</h2> --}}
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset ('public/frontend/images/xiaomi.png') }}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Xiaomi</p>
								{{-- <h2>24 DEC 2014</h2> --}}
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{ ('public/frontend/images/map.png') }}" alt="" />
							<p>Top SmartPhone in the World</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{asset('public/frontend/js/jquery.js') }}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{asset('public/frontend/js/price-range.js') }}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{asset('public/frontend/js/main.js') }}"></script>
	<script src="{{asset('public/frontend/js/sweetalert.min.js') }}"></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
	
	<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0" nonce="JZTRf1Ev"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#sort').on('change',function(){
			var url = $(this).val();
			if(url){
				window.location = url;
			}
			return false;
		});
	});
</script>
<script>
	$(document).ready(function(){
		$('.send_order').click(function(){
			swal({
				title: "Xác nhận đơn hàng",
				text: "Đồng ý đặt hàng?",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Đặt hàng",
				cancelButtonText: "Đóng",
				closeOnConfirm: false,
				closeOnConfirm: false
			},
			function(isConfirm) {
				if (isConfirm) {
					var shipping_email = $('.shipping_email').val();
					var shipping_name = $('.shipping_name').val();
					var shipping_address = $('.shipping_address').val();
					var shipping_phone = $('.shipping_phone').val();
					var shipping_notes = $('.shipping_notes').val();
					var shipping_method = $('.payment_select').val();
					var order_fee = $('.order_fee').val();
					var order_coupon = $('.order_coupon').val();
					var _token = $('input[name="_token"]').val();
					
					$.ajax({
						url: '{{ url('/confirm-order') }}',
						method: 'POST',
						data:{shipping_email:shipping_email,shipping_name:shipping_name,
							shipping_address:shipping_address,shipping_phone:shipping_phone,
							shipping_notes:shipping_notes,order_fee:order_fee,order_coupon:order_coupon,
							shipping_method:shipping_method,_token:_token},
						success:function(){
							swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công!", "success");
						}
					});
					window.setTimeout(function(){
						location.reload();
					},3000);
				} else {
					swal("Đóng", "Đơn hàng chưa được gửi, vui lòng hoàn tất đơn hàng!", "error");
				}
			});
			// var shipping_email = $('.shipping_email').val();
			// var shipping_name = $('.shipping_name').val();
			// var shipping_address = $('.shipping_address').val();
			// var shipping_phone = $('.shipping_phone').val();
			// var shipping_notes = $('.shipping_notes').val();
			// var shipping_method = $('.payment_select').val();
			// var order_fee = $('.order_fee').val();
			// var order_coupon = $('.order_coupon').val();
			// var _token = $('input[name="_token"]').val();
			
			// $.ajax({
			// 	url: '{{ url('/confirm-order') }}',
			// 	method: 'POST',
			// 	data:{shipping_email:shipping_email,shipping_name:shipping_name,
			// 		shipping_address:shipping_address,shipping_phone:shipping_phone,
			// 		shipping_notes:shipping_notes,order_fee:order_fee,order_coupon:order_coupon,
			// 		shipping_method:shipping_method,_token:_token},
			// 	success:function(){
			// 		alert('Đặt hàng thành công')
			// 	}
			// });
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.add-to-cart').click(function(){
			var id = $(this).data('id_product');
			var cart_product_id = $('.cart_product_id_' + id).val();
			var cart_product_name = $('.cart_product_name_' + id).val();
			var cart_product_image = $('.cart_product_image_' + id).val();
			var cart_product_quantity = $('.cart_product_quantity_' + id).val();
			var cart_product_price = $('.cart_product_price_' + id).val();
			var cart_product_qty = $('.cart_product_qty_' + id).val();
			var _token = $('input[name="_token"]').val();
				
				$.ajax({
					url: '{{ url('/add-cart-ajax') }}',
					method: 'POST',
					data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,
						cart_product_image:cart_product_image,cart_product_price:cart_product_price,
						cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
					success:function(data){
						swal({
							title: "Đã thêm sản phẩm vào giỏ hàng",
							text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",

							showCancelButton: true,
							cancelButtonText: "Xem tiếp",
							confirmButtonClass: "btn-success",
							confirmButtonText: "Xem giỏ hàng",
							closeOnConfirm: false
						},
						function(){
							window.location.href = "{{ url('/gio-hang') }}";
						});
					}
				});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.choose').on('change',function(){
			var action = $(this).attr('id');
			var ma_id = $(this).val();
			var _token = $('input[name="_token"]').val();
			var result = '';

			if(action=='city'){
				result = 'province';
			}else{
				result = 'wards';
			}
			$.ajax({
				url : '{{url('/select-delivery-home')}}',
				method: 'POST',
				data:{action:action,ma_id:ma_id,_token:_token},
				success:function(data){
					$('#'+result).html(data);
				}
			});
		});
	});
	
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.calculate_delivery').click(function(){
			var matp = $('.city').val();
			var maqh = $('.province').val();
			var xaid = $('.wards').val();
			var _token = $('input[name="_token"]').val();
			if(matp == '' && maqh == '' && xaid == ''){
				alert('Vui lòng chọn địa chỉ vận chuyển');
			}else{
				$.ajax({
				url : '{{url('/calculate-fee')}}',
				method: 'POST',
				data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
				success:function(data){
					location.reload();
				}
			});
			}
			
		});
	});
</script>
<script type="text/javascript">
	$(document).ready( function() {
		$( "#slider-range" ).slider({
			orientation: "horizontal",
			range: true,

			min:500000,
			max:50000000,
			steps:500000,
			values: [ 10000000, 30000000 ],
			slide: function( event, ui ) {
			$( "#amount" ).val( "đ" + ui.values[ 0 ] + " - đ" + ui.values[ 1 ] );
			$( "#start_price" ).val(ui.values[ 0 ] );
			$( "#end_price" ).val(ui.values[ 1 ] );
			}
		});
		
		$( "#amount" ).val( "đ" + $( "#slider-range" ).slider( "values", 0 ) +
			" - đ" + $( "#slider-range" ).slider( "values", 1 ) );
	} );
</script>

</body>
</html>