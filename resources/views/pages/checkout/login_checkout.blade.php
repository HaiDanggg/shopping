@extends('layout')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row" style="background-image: linear-gradient(to bottom right,#4ADEDE, #1CA7EC); margin-right:30%;padding-bottom:3%; padding-top:1%; border-top-left-radius: 20px;border-top-right-radius: 20px;border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;; padding-left:5%;">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng nhập tài khoản</h2>
                    <form action="{{ URL::to('/login-customer') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="email_account" placeholder="Tài khoản" />
                        <input type="password" name="password_account" placeholder="Password" />
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Ghi nhớ đăng nhập
                        </span>
                        <button style="background-image: linear-gradient(to bottom right,#00588e, #009494);" type="submit" class="btn btn-default">Đăng nhập</button>
                    </form>
                    <style type="text/css">
                        ul.list-login{
                            margin: 10px;
                            padding: 0;
                        }
                        ul.list-login li{
                            display: inline;
                            margin: 5px;
                        }
                    </style>
                    <ul class="list-login">
                        <li>
                            <a href="{{ url('login-customer-google') }}"><img width="20%" alt="Đăng nhập bằng tài khoản google" src="{{ asset('public/frontend/images/gg.svg') }}"></a>
                        </li>
                    </ul>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1" style="margin-right: 20px;">
                <h2 class="or" style="background-image: linear-gradient(to bottom right,#00588e, #009494);">Hoặc</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Đăng ký</h2>
                    <form action="{{ URL::to('/add-customer') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="customer_name" placeholder="Họ tên"/>
                        <input type="email" name="customer_email" placeholder="Địa chỉ Email"/>
                        <input type="password" name="customer_password" placeholder="Mật khẩu"/>
                        <input type="text" name="customer_phone" placeholder="Số điện thoại"/>
                        <button style="background-image: linear-gradient(to bottom right,#00588e, #009494);" type="submit" class="btn btn-default">Đăng ký</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection