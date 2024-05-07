<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\CatePost;
use Illuminate\Support\Facades\Auth;
session_start();

class CategoryPost extends Controller
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
    public function add_category_post(){
        $this->AuthLogin();
        return view('admin.category_post.add_category');
    }
    public function save_category_post(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $category_post = new CatePost();
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_slug = $data['cate_post_slug'];
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();

        Session::put('message','Thêm danh mục bài viết thành công');
        return Redirect()->back();
    }

    public function all_category_post(){
        $this->AuthLogin();
        $category_post = CatePost::orderBy('cate_post_id','DESC')->paginate(5);
        
        return view('admin.category_post.list_category')->with(compact('category_post'));
    }

    public function edit_category_post($category_post_id){
        $this->AuthLogin();
        $category_post = CatePost::find($category_post_id);
        
        return view('admin.category_post.edit_category')->with(compact('category_post'));
    }
    public function update_category_post(Request $request,$cate_id){
        $this->AuthLogin();
        $data = $request->all();
        $category_post = CatePost::find($cate_id);
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_slug = $data['cate_post_slug'];
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();

        Session::put('message','Cập nhật danh mục bài viết thành công');
        return Redirect('/all-category-post');
    }
    public function delete_category_post($cate_id){
        $this->AuthLogin();
        $category_post = CatePost::find($cate_id);
        $category_post->delete();
        Session::put('message','Xóa danh mục bài viết thành công');
        return Redirect()->back();
    }
    
}
