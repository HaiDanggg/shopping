<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Models\CatePost;
use App\Models\Slider;
use App\Models\Product;
session_start();

class HomeController extends Controller
{
    // public function send_mail(){
    //     $to_name = "Bao Nguyen";
    //     $to_email = "chibaobguyen5585@gmail.com";
    //     // $link_reset_pass = url('update-new-pass?email=',$to_email,'&token',$rand_id);

    //     $data = array("name"=>"Mail từ tài khoản khách hàng","body"=>'Mail gửi về vấn đề hàng hóa');

    //     Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){
    //         $message->to($to_email)->subject('Quên mật khẩu');
    //         $message->from($to_email,$to_name);
    //     });
    //     return redirect('/')->with('messaage','');
    // }
    // public function AuthLogin(){
        
    //     if($admin_id){
    //         return Redirect::to('dashboard');
    //     }else{
    //         return Redirect::to('admin')->send();
    //     }
    // }
    public function send_mail_order(){
        $to_name = "Bao Nguyen";
        $to_email = "chibaobguyen5585@gmail.com";
        
        $customer_name_order = Session::get('customer_name');

        // $customer_name_order = DB::table('tbl_customers')->select('customer_email')->limit(1)->get();
        $data = array("name"=>$customer_name_order,"body"=>'Mail gửi về vấn đề hàng hóa');
        
        Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('Đơn đặt hàng');
            $message->from($to_email,$to_name);
        });
        return redirect('/')->with('messaage','')->with('customer_name',$customer_name_order);
    }
    public function index(Request $request) {
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //category post
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();

        //seo
        $meta_desc = "Chuyên bán các thiết bị di động";
        $meta_keywords = "thiết bị di động";
        $meta_title = "Thiết bị di dộng";
        $url_canonical = $request->url();
        ///--seo

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderBy('product_id','desc')->limit(4)->get();
        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];

            if($sort_by == 'giam_dan'){
                $all_product = DB::table('tbl_product')->where('product_status','0')->orderBy('product_price','desc')->limit(4)->orderBy('product_price','DESC')->get();
                
            }elseif($sort_by == 'tang_dan'){
                $all_product = DB::table('tbl_product')->where('product_status','0')->orderBy('product_price','asc')->limit(4)->orderBy('product_price','ASC')->get();

            }
        }
        if(isset($_GET['start_price']) && ($_GET['end_price'])){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $all_product = DB::table('tbl_product')->where('product_status','0')->orderBy('product_id','desc')->limit(4)
            ->whereBetween('product_price',[$min_price,$max_price])->orderBy('product_price','asc')->get();

        }

        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('category_post',$category_post)->with('slider',$slider)
        ->with('min_price',$min_price)->with('max_price',$max_price);
    }
    public function search(Request $request){
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();

        //seo
        $meta_desc = "Tìm kiếm sản phẩm";
        $meta_keywords = "Tìm kiếm sản phẩm";
        $meta_title = "Tìm kiếm sản phẩm";
        $url_canonical = $request->url();

        //--seo
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();

        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('category_post',$category_post)->with('slider',$slider);
    }
    public function khuyenmai(Request $request){
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();

        //seo
        $meta_desc = "Sản phẩm khuyến mãi";
        $meta_keywords = "Sản phẩm khuyến mãi";
        $meta_title = "Sản phẩm khuyến mãi";
        $url_canonical = $request->url();

        //--seo
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderBy('product_id','desc')->limit(4)->get();
        return view('pages.sanpham.khuyenmai')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('category_post',$category_post)->with('slider',$slider)->with('all_product',$all_product);
    }
}
