<?php

namespace App\Http\Controllers;

use App\Models\CategoryProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\CatePost;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        
        if(Session::get('login_normal')){
            $admin_id = Session::get('admin_id');
            if(!$admin_id){
                return Redirect::to('admin');
            }else{
                return Redirect::to('dashboard');
            }
        }else{
            $admin_id = Auth::id();
            if(!$admin_id){
                return Redirect::to('admin');
            }else{
                return Redirect::to('dashboard');
            }
        }
        
    }
    public function add_category_product(){
        $this->AuthLogin();
        // $category = CategoryProductModel::where('category_parent',0)->orderby('category_id','DESC')->get();
        return view('admin.add_category_product');
        // ->with(compact('category'));
    }
    public function all_category_product(){
        $this->AuthLogin();
        // $category_product = CategoryProductModel::where('category_parent',0)->orderby('category_id','DESC')->get();
        $all_category_product = DB::table('tbl_category_product')->paginate(20);
        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        // ->with('category_product',$category_product);
        return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
        
    }
    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['meta_keywords'] = $request->category_product_keywords;
        $data['slug_category_product'] = $request->slug_category_product;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function unactive_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function active_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }
    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['meta_keywords'] = $request->category_product_keywords;
        $data['slug_category_product'] = $request->slug_category_product;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function delete_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    //End Function Admin page
    // public function show_category_home($category_id){
    //     $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
    //     $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
    //     $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
    //     $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
    //     ->where('tbl_product.category_id',$category_id)->get();
    //     $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
    //     return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)
    //     ->with('category_name',$category_name);
    // }


    // public function show_category_home(Request $request ,$slug_category_product){
    //     $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
    //     $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
    //     $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
    //     $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
    //     ->where('tbl_category_product.slug_category_product',$slug_category_product)->get();
    //     foreach($cate_product as $key => $val){
    //         $meta_desc = $val->category_desc;
    //         $meta_keywords = $val->meta_keywords;
    //         $meta_title = $val->category_name;
    //         $url_canonical = $request->url();
    //     }

    //     $category_name = DB::table('tbl_category_product')->where('tbl_category_product.slug_category_product',$slug_category_product)->limit(1)->get();
    //     return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)
    //     ->with('category_name',$category_name)
    //     ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
    //     ->with('category_post',$category_post);
    // }

    //     public function show_category_home(Request $request ,$category_id){
    //     $slider = Slider::orderby('slider_id','DESC')->where('slider_status','1')->take(4)->get();

    //     $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
    //     $meta_desc = "Danh mục sản phẩm";
    //     $meta_keywords = "";
    //     $meta_title = "Danh mục sản phẩm";
    //     $url_canonical = $request->url();

    //     $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
    //     $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        
        
    //     // if(isset($_GET['sort_by'])){
    //     //     $sort_by = $_GET['sort_by'];

    //     //     if($sort_by == 'giam_dan'){
    //     //         $category_by_id = Product::with('category_id',$category_id)->orderBy('product_price','DESC')->paginate(6)->appends(request()->query());
    //     //     }elseif($sort_by == 'tang_dan'){
    //     //         $category_by_id = Product::with('category_id',$category_id)->orderBy('product_price','ASC')->paginate(6)->appends(request()->query());
    //     //     }elseif($sort_by == 'kytu_za'){
    //     //         $category_by_id = Product::with('category_id',$category_id)->orderBy('product_name','DESC')->paginate(6)->appends(request()->query());
    //     //     }elseif($sort_by == 'kytu_az'){
    //     //         $category_by_id = Product::with('category_id',$category_id)->orderBy('product_name','ASC')->paginate(6)->appends(request()->query());
    //     //     }
    //     // }else{
    //     //     $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_id','DESC')->paginate(6);
    //     // }

    //     $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
    //     ->where('tbl_product.category_id',$category_id)->get();
    //     $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();

    //     return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)
    //     ->with('category_name',$category_name)
    //     ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
    //     ->with('category_post',$category_post)->with('slider',$slider);
    // }

    public function show_category_home(Request $request ,$category_id){
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        $meta_desc = "Danh mục sản phẩm";
        $meta_keywords = "";
        $meta_title = "Danh mục sản phẩm";
        $url_canonical = $request->url();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        // $category_by_slug = CategoryProductModel::where('category_id', $category_id)->get();
        // foreach($category_by_slug as $key => $cate){
        //     $category_id = $cate->category_id;
        // }
        $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_category_product.category_id',$category_id)->get();

        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];

            if($sort_by == 'giam_dan'){
                $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
                ->where('tbl_category_product.category_id',$category_id)->orderBy('product_price','DESC')->get();
                
                // $category_by_id = Product::with('category_id',$category_id)->orderBy('product_price','DESC')->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'tang_dan'){
                $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
                ->where('tbl_category_product.category_id',$category_id)->orderBy('product_price','ASC')->get();
               
                // $category_by_id = Product::with('category_id',$category_id)->orderBy('product_price','ASC')->paginate(6)->appends(request()->query());
            // }elseif($sort_by == 'kytu_za'){
            //     $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
            //     ->where('tbl_category_product.category_id',$category_id)->orderBy('product_name','DESC')->get();
            //     // $category_by_id = Product::with('category_id',$category_id)->orderBy('product_name','DESC')->paginate(6)->appends(request()->query());
            // }elseif($sort_by == 'kytu_az'){
            //     $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
            //     ->where('tbl_category_product.category_id',$category_id)->orderBy('product_name','ASC')->get();
            //     // $category_by_id = Product::with('category_id',$category_id)->orderBy('product_name','ASC')->paginate(6)->appends(request()->query());
            // }
            }
        }
        if(isset($_GET['start_price']) && ($_GET['end_price'])){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_category_product.category_id',$category_id)
            ->whereBetween('product_price',[$min_price,$max_price])->orderBy('product_price','asc')->get();

        }
        // }else{
        //     $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        //     ->where('tbl_category_product.category_id',$category_id)->get();
        //     // $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_id','DESC')->paginate(6);
        // }
        
        // $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        // ->where('tbl_category_product.category_id',$category_id)->get();
        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();

        return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)
        ->with('category_name',$category_name)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('category_post',$category_post)->with('slider',$slider)
        ->with('min_price',$min_price)->with('max_price',$max_price);
    }
    
    
}
