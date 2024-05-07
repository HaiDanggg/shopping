@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 style="margin: 0;position:inherit;font-size:22px;" class="title text-center">{{ $meta_title }}</h2>
    
    <div class="product-image-wrapper">
        @foreach($post as $key =>$p)
        <div class="single-products" style="margin: 10px 0; padding:5px 0">
                {!! $p->post_content !!}
                
        </div>
        <div class="clearfix"></div>
        @endforeach
    </div>
</div>
<h2 style="margin: 0;position:inherit;font-size:22px;" class="title text-center">Bài viết liên quan</h2>
<style class="text/css">
    ul.post_related li{
        list-style-type: disc;
        font-size: 16px;
        padding: 6px;
    }
    ul.post_related li a{
        color: #000;
    }
    ul.post_related li a:hover{
        color: #14c2bf;
    }
</style>
<ul class="post_related">
    @foreach($related as $key => $post_related)
    <li><a href="{{ url('/bai-viet/'.$post_related->post_slug) }}">{{ $post_related->post_title }}</a></li>
    @endforeach
</ul>

@endsection
