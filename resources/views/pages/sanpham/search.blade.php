@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Kết quả tìm kiếm</h2>
    @foreach($search_product as $key =>$product)
    <a href="{{URL::to ('/chi-tiet-san-pham/'.$product->product_id) }}">
    <div class="col-sm-4">
        <div class="product-image-wrapper image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        {{-- <img src="{{URL::to ('public/uploads/product/'.$product->product_image) }}" alt="" />
                        <h2>{{number_format($product->product_price).' VNĐ' }}</h2>
                        <p>{{ $product->product_name }}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a> --}}
                        <form>
                            @csrf
                        <input type="hidden" name="" value="{{ $product->product_id }}" class="cart_product_id_{{ $product->product_id }}">
                        <input type="hidden" name="" value="{{ $product->product_name }}" class="cart_product_name_{{ $product->product_id }}">
                        <input type="hidden" name="" value="{{ $product->product_image }}" class="cart_product_image_{{ $product->product_id }}">
                        <input type="hidden" name="" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                        <input type="hidden" name="" value="{{ $product->product_price }}" class="cart_product_price_{{ $product->product_id }}">
                        <input type="hidden" name="" value="1" class="cart_product_qty_{{ $product->product_id }}">

                        <a href="{{URL::to ('/chi-tiet-san-pham/'.$product->product_id) }}">
                        <img src="{{URL::to ('public/uploads/product/'.$product->product_image) }}" alt="" />
                        <h2>{{number_format($product->product_price).' VNĐ' }}</h2>
                        <p>{{ $product->product_name }}</p>
                        {{-- <button type="submit" class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i>
                            Thêm giỏ hàng
                        </button> --}}
                        </a>
                        <button type="button" class="btn btn-default add-to-cart" name="add-to-cart" data-id_product="{{ $product->product_id }}">Thêm giỏ hàng</button>
                        </form>
                    </div>
                    
            </div>
            {{-- <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                </ul>
            </div> --}}
        </div>
    </div>
    </a>
    @endforeach
</div><!--features_items-->
</div><!--/recommended_items-->
@endsection
