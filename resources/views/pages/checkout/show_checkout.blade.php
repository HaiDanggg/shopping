@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              {{-- <li><a href="{{URL::to('/')}}">Trang chủ</a></li> --}}
              <li class="active" style="font-size: 20px;color:#188e90; font-weight:bold; padding-top:33px">Thanh toán</li>
            </ol>
        </div>

        <div class="register-req">
            <p>Vui lòng đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Điền thông tin gửi hàng</p>
                        <div class="form-one">
                            <form method="POST">
                                @csrf
                                <input type="text" name="shipping_email" class="shipping_email" placeholder="Email">
                                <input type="text" name="shipping_name" class="shipping_name" placeholder="Họ tên người nhận">
                                <input type="text" name="shipping_address" class="shipping_address" placeholder="Địa chỉ">
                                <input type="text" name="shipping_phone" class="shipping_phone" placeholder="Số điện thoại">
                                <textarea name="shipping_notes" class="shipping_notes"  placeholder="Ghi chú cho đơn hàng của bạn" rows="5"></textarea>
                                
                                @if(Session::get('fee'))
                                    <input type="hidden" name="order_fee" class="order_fee" value="{{ Session::get('fee') }}">
                                @else
                                    <input type="hidden" name="order_fee" class="order_fee" value="100000">
                                @endif

                                @if(Session::get('coupon'))
                                    @foreach(Session::get('coupon') as $key => $cou)
                                    <input type="hidden" name="order_coupon" class="order_coupon" value="{{ $cou['coupon_code'] }}">
                                    @endforeach
                                @else
                                    <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                                @endif
                                
                                
                                <div class="">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
                                        <select name="payment_select" class="form-control input-sm m-bot15 payment_select ">
                                            <option value="0">Qua chuyển khoản</option>
                                            <option value="1">Tiền mặt</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                {{-- <input type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-primary btn-sm send_order"> --}}
                            </form>
                            <form>
                                @csrf
                            
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn thành phố</label>
                                <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                    <option value="">--Chọn tỉnh thành phố--</option>
                                    @foreach ($city as $key => $ci)
                                        <option value="{{ $ci->matp }}">{{ $ci->name_city }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn quận huyện</label>
                                <select name="province" id="province" class="form-control input-sm m-bot15 choose province ">
                                    <option value="">--Chọn quận huyện--</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn xã phường</label>
                                <select name="wards" id="wards" class="form-control input-sm m-bot15 wards ">
                                    <option value="">--Chọn xã phường--</option>
                                    
                                </select>
                            </div>
                            
                            <input style="background-image: linear-gradient(to bottom right,#00588e, #009494);" type="button" value="Tính phí vận chuyển" name="calculate_order" class="btn btn-primary btn-sm calculate_delivery">
                            
                        </form>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-sm-12 clearfix">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <div class="table-responsive cart_info">
            
                        <form action="{{ url('/update-cart') }}" method="POST">
                            @csrf
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu" style="background-image: linear-gradient(to bottom right,#00588e, #009494);">
                                    <td class="image">Hình ảnh sản phẩm</td>
                                    <td class="description">Tên sản phẩm</td>
                                    <td class="price">Giá sản phẩm</td>
                                    <td class="quantity">Số lượng</td>
                                    <td class="total">Thành tiền</td>
                                    {{-- <td></td> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if(Session::get('cart')==true)
                                @php
                                    $total = 0;
                                @endphp
                                @foreach(Session::get('cart') as $key => $cart)
                                    @php
                                        $subtotal = $cart['product_price']*$cart['product_qty'];
                                        $total += $subtotal;
                                    @endphp
                                <tr>
                                    <td class="cart_product">
                                        <img src="{{ asset('public/uploads/product/'.$cart['product_image']) }}" width="50" alt="{{ $cart['product_name'] }}" /></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href=""></a></h4>
                                        <p>{{ $cart['product_name'] }}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{number_format ($cart['product_price'],0,',','.') }}đ</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            
                                                
                                            <input class="cart_quantity" type="number" min="1" name="cart_qty[{{$cart ['session_id'] }}]" value="{{ $cart['product_qty'] }}" >
            
                                            
                                            {{-- <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm"> --}}
                                            {{-- </form> --}}
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">
                                            {{number_format ($subtotal,0,',','.') }}đ
                                        </p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete" href="{{ url('/del-product/'.$cart['session_id']) }}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                
                                @endforeach
                                <tr>
                                    <td><input style="background-image: linear-gradient(to bottom right,#00588e, #009494);" class="btn btn-default check_out" type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="btn btn-default btn-sm"></td>
                                    <td><a style="background-image: linear-gradient(to bottom right,#00588e, #009494);" class="btn btn-default check_out" href="{{url ('/del-all-product') }}">Xóa tất cả</a></td>
                                    <td>
                                        @if(Session::get('coupon'))
                                        <a style="background-image: linear-gradient(to bottom right,#00588e, #009494);" class="btn btn-default check_out" href="{{url ('/unset-coupon') }}">Xóa mã khuyến mãi</a>
                                        @endif
                                    </td>
                                    
                                    <td colspan="2">
                                    <li>Tổng tiền : <span>{{number_format ($total,0,',','.') }}đ</span></li>
                                    @if(Session::get('coupon'))
                                    <li>
                                        
                                        @foreach(Session::get('coupon') as $key => $cou)
                                            @if($cou['coupon_condition']==1)
                                                Mã giảm : {{ $cou['coupon_number'] }}%
                                                <p>
                                                    @php
                                                    $total_coupon = ($total*$cou['coupon_number'])/100;
                                                    // echo '<p><li>Tổng giảm : '.number_format($total_coupon,0,',','.').'đ</li></p>';
                                                    @endphp
                                                </p>
                                                <p>
                                                    @php
                                                        $total_after_coupon = $total-$total_coupon;
                                                    @endphp
                                                    </p>
                                            @elseif($cou['coupon_condition']==2)
                                                Mã giảm : {{ number_format($cou['coupon_number'],0,',','.') }}đ
                                                <p>
                                                    @php
                                                    $total_coupon = $total-$cou['coupon_number'];
                                                    // echo '<p><li>Tổng giảm : '.number_format($total_coupon,0,',','.').'đ</li></p>';
                                                    @endphp
                                                </p>
                                                @php
                                                        $total_after_coupon = $total_coupon;
                                                    @endphp
                                            @endif
                                        @endforeach
                                        
                                    </li>
                                    @endif
                                    {{-- <li>Thuế <span></span></li> --}}
                                    @if(Session::get('fee'))
                                    <li>
                                        <a class="cart_quantity_delete" href="{{ url('/del-fee')}}"><i class="fa fa-times"></i></a>
                                        Phí vận chuyển: <span>{{ number_format(Session::get('fee'),0,',','.') }}đ</span></li>
                                        <?php
                                        $total_after_fee = $total + Session::get('fee');
                                        ?>
                                    @endif
                                    <li>Tổng còn:
                                    @php
                                        if(Session::get('fee') && !Session::get('coupon')){
                                            $total_after = $total_after_fee;
                                            echo number_format($total_after,0,',','.').'đ';
                                        }elseif(!Session::get('fee') && Session::get('coupon')){
                                            $total_after = $total_after_coupon;
                                            echo number_format($total_after,0,',','.').'đ';
                                        }elseif(Session::get('fee') && Session::get('coupon')){
                                            $total_after = $total_after_coupon;
                                            $total_after = $total_after + Session::get('fee');
                                            echo number_format($total_after,0,',','.').'đ';
                                        }elseif(!Session::get('fee') && !Session::get('coupon')){
                                            $total_after = $total;
                                            echo number_format($total_after,0,',','.').'đ';
                                        }
                                        
                                    @endphp
                                    </li>
                                    {{-- <li>Tiền sau giảm giá <span></span></li> --}}
                                    </td>
            
                                    
                                </tr>
                                @else
                                <tr>
                                    <td colspan="5">
                                    <center>
                                    @php
                                    echo 'Vui lòng thêm sản phẩm vào giỏ hàng'
                                    @endphp
                                    </center>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                          </form>  
                          <tr>
                            @if(Session::get('cart'))
                            <td>
                                
                                <form method="POST" action="{{ url('/check-coupon') }}">
                                @csrf
                                <input type="text" class="form-control" name="coupon" placeholder=" Nhập mã giảm giá"> <br>
                                <input type="submit" class="btn btn-default check_coupon" href="" name="check_coupon" value="Kiểm tra mã giảm giá">
                                
                                </form>
                                
                                
                                <input style="font-size: 16px;background-image: linear-gradient(to bottom right,#00588e, #009494);" type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-primary btn-sm send_order">
                                
                                
                            </td>
                          </tr>
                          @endif
                        </table>
                        
                        
                    </div>
                    
                </div>			
            </div>
        </div>
        {{-- <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div> --}}

        
        
    </div>
</section> <!--/#cart_items-->
@endsection