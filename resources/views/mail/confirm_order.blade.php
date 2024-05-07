<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initical-scale=1.0">
    <title>Xác nhận đơn hàng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="
    sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="background: rgb(218, 221, 222); border-radius: 12px; padding: 15px;">
        <div class="col-md-12">
            <p style="text-align: center;color: #000">Đây là email tự động. Quý khách vui lòng không trả lời email này.</p>
            <div class="row" style="background: rgb(15, 112, 116);padding: 15px">

                <div class="col-md-6" style="text-align: center; color: #fff;font-weight:bold;font-size:30px">
                    <h4 style="margin: 0">CỬA HÀNG DI ĐỘNG HAPPY-SHOP</h4>
                    <h6 style="margin: 0">DỊCH VỤ BÁN HÀNG - BẢO HÀNH - SỬA CHỮA CÁC LOẠI THIẾT BỊ DI ĐỘNG</h6>
                </div>
                
            </div>

            <div class="col-md-6 logo" style="color: #000">
                <p>Xin chào:  <strong style="color: rgb(15, 112, 116);text-decoration:underline">{{ $shipping_array['customer_name'] }}</strong></p>
            </div>

            <div class="col-md-12">
                <p style="color: #000;font-size:17px;">Đơn hàng của quý khách đã được xác nhận:</p>
                <h4 style="color: rgb(15, 112, 116);text-transform:uppercase">Thông tin đơn hàng</h4>
                <p style="color: #000; font-weight: bold">Mã đơn hàng : <strong style="color:#000; font-weight:normal">{{ $code['order_code'] }}</strong></p>
                <p style="color: #000; font-weight: bold">Mã khuyến mãi áp dụng : <strong style="color:#000; font-weight:normal">{{ $code['coupon_code'] }}</strong></p>
                <p style="color: #000; font-weight: bold">Phí ship : <strong style="color:#000; font-weight:normal">{{ $shipping_array['fee'] }}</strong></p>
                <p style="color: #000; font-weight: bold">Dịch vụ : <strong style="color:#000; font-weight:normal">Đặt hàng trực tuyến</strong></p>
                <h4 style="color: rgb(15, 112, 116);text-transform:uppercase">Thông tin người nhận</h4>
                <p style="color: #000; font-weight: bold">Email :
                    @if($shipping_array['shipping_email']=='')
                        <span style="color: #000; font-weight:normal">không có</span>
                    @else
                        <span style="color: #000; font-weight:normal">{{ $shipping_array['shipping_email'] }}</span>
                    @endif
                </p>
                <p style="color: #000; font-weight: bold">Họ và tên người gửi :
                    @if($shipping_array['shipping_name']=='')
                        <span style="color: #000; font-weight:normal">không có</span>
                    @else
                        <span style="color: #000; font-weight:normal">{{ $shipping_array['shipping_name'] }}</span>
                    @endif
                </p>
                <p style="color: #000; font-weight: bold">Địa chỉ nhận hàng :
                    @if($shipping_array['shipping_address']=='')
                        <span style="color: #000; font-weight:normal">không có</span>
                    @else
                        <span style="color: #000; font-weight:normal">{{ $shipping_array['shipping_address'] }}</span>
                    @endif
                </p>
                <p style="color: #000; font-weight: bold">Số điện thoại :
                    @if($shipping_array['shipping_phone']=='')
                        <span style="color: #000; font-weight:normal">không có</span>
                    @else
                        <span style="color: #000; font-weight:normal">{{ $shipping_array['shipping_phone'] }}</span>
                    @endif
                </p>
                <p style="color: #000; font-weight: bold">Ghi chú đơn hàng :
                    @if($shipping_array['shipping_notes']=='')
                        <span style="color: #000; font-weight:normal">không có</span>
                    @else
                        <span style="color: #000; font-weight:normal">{{ $shipping_array['shipping_notes'] }}</span>
                    @endif
                </p>
                <p style="color: #000; font-weight: bold">Hình thức thanh toán : <strong style="color:#000; font-weight:normal">
                    @if($shipping_array['shipping_method']==0)
                        Chuyển khoản ATM
                    @else
                        Tiền mặt
                    @endif
                </strong>
                <p style="color: rgb(161, 26, 49)">Nếu thông tin người nhận không có chúng tôi sẽ liên hệ với người đặt hàng để
                trao đổi thông tin về đơn hàng đã đặt!</p>
                <h4 style="color: rgb(15, 112, 116);text-transform:uppercase">Sản phẩm đã đặt</h4>
                <table class="table table-striped" style="border: 1px">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sub_total = 0;
                        $total = 0;
                        @endphp
                        @foreach($cart_array as $cart)
                            @php
                            $sub_total = $cart['product_qty']*$cart['product_price'];
                            $total+=$sub_total;
                            @endphp
                            <tr>
                                <td>{{ $cart['product_name'] }}</td>
                                <td>{{ number_format($cart['product_price'],0,',','.') }}vnđ</td>
                                <td>{{ $cart['product_qty'] }}</td>
                                <td>{{ number_format($sub_total,0,',','.') }}vnđ</td>
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="4" align="right">Tổng tiền thanh toán khi chưa áp dụng mã: {{ number_format($total,0,',','.') }}vnđ</td>
                            </tr>
                    </tbody>      
                </table>
            </div>
                <p style="color: rgb(15, 112, 116); font-weight:bold">Xem lại lịch sử đơn hàng tại: <a href="#">lịch sử đơn hàng của bạn</a></p>
                <p style="color: rgb(15, 112, 116); font-weight:bold">Mọi chi tiết xin liên hệ website tại: <a target="_blank" href="#">Shop</a>, hoặc liên hệ qua số: 0946372556. Xin cảm ơn quý khách đã đặt hàng.</p>
            </div>

        </div>

    </div>
</body>
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3/3/7/js/bootstrap.min.js" integrity="
sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA712mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}

</html>