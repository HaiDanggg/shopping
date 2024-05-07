<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\CatePost;
use App\Models\Contact;
use App\Models\Slider;
session_start();

class ContactController extends Controller
{
    public function lien_he(Request $request){
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        //category post
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();

        //seo
        $meta_desc = "Liên hệ";
        $meta_keywords = "Liên hệ";
        $meta_title = "Liên hệ với chúng tôi";
        $url_canonical = $request->url();
        ///--seo
 
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $contact = Contact::where('info_id',1)->get();
        return view('pages.lienhe.contact')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('category_post',$category_post)->with('contact',$contact)
        ->with('slider',$slider);
    } 
    public function information(){
        $contact = Contact::where('info_id',1)->get();
        return view('admin.information.add_information')->with(compact('contact'));
    }
    public function update_info(Request $request, $info_id){
        $data = $request->all();
        $contact = Contact::find($info_id);
        $contact->info_contact = $data['info_contact'];
        $contact->info_map = $data['info_map'];
        $contact->info_fanpage = $data['info_fanpage'];
        $get_image = $request-> file('info_image');

        $path = 'public/uploads/contact/';
        if($get_image){
            unlink($path.$contact->info_logo);
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $contact->info_logo = $new_image;
            
        }
        $contact->save();
        return Redirect()->back()->with('message','Cập nhật thông tin website thành công');
    }
    public function save_info(Request $request){
        $data = $request->all();
        $contact = new Contact();
        $contact->info_contact = $data['info_contact'];
        $contact->info_map = $data['info_map'];
        $contact->info_fanpage = $data['info_fanpage'];
        $get_image = $request-> file('info_image');

        $path = 'public/uploads/contact/';
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $contact->info_logo = $new_image;
            
        }
        $contact->save();
        return Redirect()->back()->with('message','Cập nhật thông tin website thành công');
    }
}
