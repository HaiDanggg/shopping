@extends('layout')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product" style="padding-top: 50px">
            <img src="{{URL::to ('/public/uploads/product/'.$value->product_image) }}" alt="" />
            <h3 style="border-radius: 10px 0 0 0;background-image: linear-gradient(to bottom right,#D46C4E, #F9AD6A);">NEW</h3>
        </div>
        {{-- <div id="similar-product" class="carousel slide" data-ride="carousel">
            
              <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                      <a href=""><img src="{{URL::to ('/public/frontend/images/similar1.jpg') }}" alt=""></a>
                      <a href=""><img src="{{URL::to ('/public/frontend/images/similar2.jpg') }}" alt=""></a>
                      <a href=""><img src="{{URL::to ('/public/frontend/images/similar3.jpg') }}" alt=""></a>
                    </div>
                </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
        </div> --}}

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$value->product_name}}</h2>
            <p>Mã ID: {{$value->product_id}}</p>
            {{-- <img src="images/product-details/rating.png" alt="" /> --}}
            
            <form action="{{ URL::to('/save-cart') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="" value="{{ $value->product_id }}" class="cart_product_id_{{ $value->product_id }}">
                        <input type="hidden" name="" value="{{ $value->product_name }}" class="cart_product_name_{{ $value->product_id }}">
                        <input type="hidden" name="" value="{{ $value->product_image }}" class="cart_product_image_{{ $value->product_id }}">
                        <input type="hidden" name="" value="{{ $value->product_quantity }}" class="cart_product_quantity_{{ $value->product_id }}">
                        <input type="hidden" name="" value="{{ $value->product_price }}" class="cart_product_price_{{ $value->product_id }}">
                        <input type="hidden" name="" value="1" class="cart_product_qty_{{ $value->product_id }}">
            <span>
                <span>{{number_format($value->product_price).' VNĐ'}}</span>
                <br>
                <label>Số lượng:</label>
                <input name="qty" type="number" min="1" value="1" />
                <input name="productid_hidden" type="hidden" value="{{ $value->product_id }}" />
                <br><br>
                {{-- <button type="submit" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                    Thêm giỏ hàng
                </button> --}}
                <button type="button" class="btn btn-default add-to-cart" name="add-to-cart" data-id_product="{{ $value->product_id }}">Thêm giỏ hàng</button>
            </span>
            </form>
            <p><b>Tình trạng:</b> Còn hàng</p>
            <p><b>Điều kiện:</b> Mới 100%</p>
            <p><b>Thương hiệu:</b> {{ $value->brand_name }}</p>
            <p><b>Danh mục:</b> {{ $value->category_name }}</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Chi tiết</a></li>
            <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details" >
            <p>{!! $value->product_desc !!}</p>
        </div>
        
        <div class="tab-pane fade" id="companyprofile" >
            <p>{!! $value->product_content !!}</p>
        </div>
        
        <div class="tab-pane fade" id="reviews" >
            <div class="col-sm-12">
                {{-- <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p> --}}
                
                {{-- <form action="#"> --}}
                    {{-- <span>
                        <input type="text" placeholder="Your Name"/>
                        <input type="email" placeholder="Email Address"/>
                    </span>
                    <textarea name="" ></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" /> --}}
                    <form method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input required type="email" class="form-control" id="email" name="email">
                            
                        </div>
                        <div class="form-group">
                            <label for="name">Tên:</label>
                            <input required type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="cm">Bình luận:</label>
                            <textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-default"> Đăng tải
                            </button>

                        </div>
                        {{-- <button type="button" class="btn btn-default pull-right">
                        Đăng tải
                    </button> --}}
                    </form>
                    
                {{-- </form> --}}
            </div>
        </div>
        
    </div>
</div><!--/category-tab-->
@endforeach
<div class="row list-product">
<div class="col-md12 comment-list">
    <div class="col-md-12 comment">
        @foreach($comments as $comment)
        <ul>
            <li class="com-title">
                {{ $comment->com_name }}
                <br>
                <span>{{ date('d-m-Y',strtotime($comment->created_at)) }}</span>
                {{-- <span>{{ date('d-m-Y H:i',strtotime($comment->created_at)) }}</span> --}}
            </li>
            <li class="com-details">
                {{ $comment->com_content }}
            </li>
        </ul>
        @endforeach
    </div>

</div>
</div>

<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Sản phẩm liên quan</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach($related as $key => $lienquan)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to ('public/uploads/product/'.$lienquan->product_image) }}" alt="" />
                                <h2>{{number_format($lienquan->product_price).' VNĐ' }}</h2>
                                <p>{{ $lienquan->product_name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>			
    </div>
</div><!--/recommended_items-->
@endsection