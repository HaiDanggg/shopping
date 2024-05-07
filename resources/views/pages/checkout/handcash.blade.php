@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        
        <div class="review-payment">
            <h2>Cảm ơn bạn đã đặt hàng, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất!</h2>
            <h2>Vui lòng nhấn hoàn thành để xác nhận đơn hàng</h2>
            <form method="GET" action="{{ URL::to('/send-mail-order') }}">
                {{ csrf_field() }}
                <input type="submit" value="Hoàn thành" name="send_mail_order" class="btn btn-primary btn-sm">
            </form>
        </div>
                
    </div>
</section> <!--/#cart_items-->
@endsection