<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Foreach_;
use App\Models\Models\Comment;
use App\Models\Post;
use App\Models\CatePost;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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
    public function add_post(){
        $this->AuthLogin();
        $cate_post = CatePost::orderBy('cate_post_id','DESC')->get();
        return view('admin.post.add_post')->with(compact('cate_post'));
    }
    public function save_post(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $post = new Post();
        $post->post_title = $data['post_title'];
        $post->post_slug = $data['post_slug'];
        $post->post_desc = $data['post_desc'];
        $post->post_content = $data['post_content'];
        $post->post_meta_desc = $data['post_meta_desc'];
        $post->post_meta_keywords = $data['post_meta_keywords'];
        $post->post_status = $data['post_status'];
        $post->cate_post_id = $data['cate_post_id'];

        $get_image = $request-> file('post_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();//lấy tên của hình ảnh
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post',$new_image);

            $post->post_image = $new_image;
            $post->save();
            Session::put('message','Thêm bài viết thành công');
            return Redirect()->back();
        }else{
            Session::put('message','Vui lòng thêm hình ảnh minh họa bài viết');
            return Redirect()->back();
        }
        
    }
    public function all_post(){
        $this->AuthLogin();
        $all_post = Post::with('cate_post')->orderBy('post_id')->paginate(10);
        
        
        return view('admin.post.list_post')->with(compact('all_post'));
    }
    public function delete_post($post_id){
        $this->AuthLogin();
        $post = Post::find($post_id);
        $post_image = $post->post_image;
        
        if($post_image){
            $path = 'public/uploads/post/'.$post_image;
            unlink($path);
        }

        $post->delete();

        Session::put('message','Xóa bài viết thành công');
        return Redirect()->back();
    }

    public function edit_post($post_id){
        $this->AuthLogin();
        $cate_post = CatePost::orderBy('cate_post_id')->get();
        $post = Post::find($post_id);
        
        return view('admin.post.edit_post')->with(compact('post','cate_post'));
    }
    public function update_post(Request $request,$post_id){
        $this->AuthLogin();
        $data = $request->all();
        $post = Post::find($post_id);
        $post->post_title = $data['post_title'];
        $post->post_slug = $data['post_slug'];
        $post->post_desc = $data['post_desc'];
        $post->post_content = $data['post_content'];
        $post->post_meta_desc = $data['post_meta_desc'];
        $post->post_meta_keywords = $data['post_meta_keywords'];
        $post->post_status = $data['post_status'];
        $post->cate_post_id = $data['cate_post_id'];

        $get_image = $request-> file('post_image');
        if($get_image){
            //xoa anh cu
            $post_image_old = $post->post_image;
            $path = 'public/uploads/post/'.$post_image_old;
            unlink($path);
            //cap nhat anh moi
            $get_name_image = $get_image->getClientOriginalName();//lấy tên của hình ảnh
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post',$new_image);

            $post->post_image = $new_image;
        }
        $post->save();
        Session::put('message','Cập nhật bài viết thành công');
        return Redirect('/all-post');
    }
    public function danh_muc_bai_viet(Request $request, $post_slug){
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        //category post
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        //seo
        // $meta_desc = "Danh mục bài viết";
        // $meta_keywords = "Danh mục bài viết";
        // $meta_title = "Danh mục bài viết";
        // $url_canonical = $request->url();

        //--seo
        
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $catepost = CatePost::where('cate_post_slug',$post_slug)->take(1)->get();
        foreach($catepost as $key => $cate){
            $meta_desc = $cate->cate_post_desc;
            $meta_keywords = $cate->cate_post_slug;
            $meta_title = $cate->cate_post_name;
            $cate_id = $cate->cate_post_id;
            $url_canonical = $request->url();
        }
        
        $post = Post::with('cate_post')->where('post_status',0)->where('cate_post_id',$cate_id)->paginate(5);
        

        return view('pages.baiviet.danhmucbaiviet')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)->with('post',$post)->with('category_post',$category_post)
        ->with('slider',$slider);
    }
    public function bai_viet(Request $request, $post_slug){
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        //category post
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        //seo
        // $meta_desc = "Danh mục bài viết";
        // $meta_keywords = "Danh mục bài viết";
        // $meta_title = "Danh mục bài viết";
        // $url_canonical = $request->url();

        //--seo
        
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        // $catepost = CatePost::where('cate_post_slug',$post_slug)->take(1)->get();
        $post = Post::with('cate_post')->where('post_status',0)->where('post_slug',$post_slug)->take(1)->get();
        foreach($post as $key => $p){
            $meta_desc = $p->post_meta_desc;
            $meta_keywords = $p->post_meta_keywords;
            $meta_title = $p->post_title;
            $cate_id = $p->cate_post_id;
            $url_canonical = $request->url();
            $cate_post_id = $p->cate_post_id;
        }
        $related = Post::with('cate_post')->where('post_status',0)->where('cate_post_id',$cate_post_id)->whereNotIn('post_slug',[$post_slug])->take(5)->get();

        return view('pages.baiviet.baiviet')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)->with('post',$post)->with('category_post',$category_post)
        ->with('related',$related)->with('slider',$slider);
    }
    

}
