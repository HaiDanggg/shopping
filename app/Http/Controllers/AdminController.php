<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Customer;
use App\Models\Login;
use App\Models\Social;
use App\Models\SocialCustomers;
use App\Models\Statistic;
use Carbon\Carbon;


session_start();

class AdminController extends Controller
{
    public function login_google(){
        return Socialite::driver('google')->redirect();
    }

    
    public function callback_google(){
        $users = Socialite::driver('google')->stateless()->user(); 
        // // return $users->id;
        // return $users->name;
        // return $users->email;
        $authUser = $this->findOrCreateUser($users,'google');
        $account_name = Login::where('admin_id',$authUser->user)->first();
        Session::put('admin_name',$account_name->admin_name);
        Session::put('login_normal',true);
        Session::put('admin_id',$account_name->admin_id);
        return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');  
    }
    public function findOrCreateUser($users, $provider){
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if($authUser){

            return $authUser;
        }else{
            $customer_new = new Social([
                'provider_user_id' => $users->id,
                'provider_user_email' => $users->email,
                'provider' => strtoupper($provider)
            ]);
        }
      


        $orang = Login::where('admin_email',$users->email)->first();

            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $users->name,
                    'admin_email' => $users->email,
                    'admin_password' => '',
                    'admin_phone' => '',
                    'admin_status' => 1
                    
                ]);
            }

        $customer_new->login()->associate($orang);
            
        $customer_new->save();

        return $customer_new;


    }
    // public function AuthLogin(){
    //     $admin_id = Session::get('admin_id');
    //     if($admin_id){
    //         return Redirect::to('dashboard');
    //     }else{
    //         return Redirect::to('admin')->send();
    //     }
    // }
    public function findOrCreateCustomer($users, $provider){
        $authUser = SocialCustomers::where('provider_user_id', $users->id)->first();
        if($authUser){
            return $authUser;
        }else{
            $customer_new = new SocialCustomers([
                'provider_user_id' => $users->id,
                'provider_user_email' => $users->email,
                'provider' => strtoupper($provider)
            ]);

            $customer = Customer::where('customer_email', $users->email)->first();
            if(!$customer){
                $customer = Customer::create([
                    'customer_name' => $users->name,
                    'customer_picture' => $users->avatar,
                    'customer_email' => $users->email,
                    'customer_password' => '',
                    'customer_phone' => ''

                ]);
            }
            $customer_new->customer()->associate($customer);
            $customer_new->save();
            return $customer_new;
        }
    }
    public function login_customer_google(){
        config(['services.google.redirect' => env('GOOGLE_CLIENT_URL')]);
        return Socialite::driver('google')->redirect();
    }
    public function callback_customer_google(){
        config(['services.google.redirect' => env('GOOGLE_CLIENT_URL')]);
        $user = Socialite::driver('google')->stateless()->user();
        $authUser = $this->findOrCreateCustomer($user,'google');
        if($authUser){
            $account_name = Customer::where('customer_id',$authUser->user)->first();
            Session::put('customer_id',$account_name->customer_id);
            Session::put('customer_picture',$account_name->customer_picture);
            Session::put('customer_name',$account_name->customer_name);
        
        } elseif($customer_new){
            $account_name = Customer::where('customer_id',$authUser->user)->first();
            Session::put('customer_id',$account_name->customer_id);
            Session::put('customer_picture',$account_name->customer_picture);
            Session::put('customer_name',$account_name->customer_name);
        }
        return redirect('/dang-nhap')->with('message','Đăng nhập bằng tài khoản google <span style="color:red>'.$account_name->customer_email.'</span>  thành công');
    }
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
    public function index(){
        return view('admin_login');
    }
    // public function show_dashboard(){
    //     return view('admin_layout');
    // }
    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $admin_email = $request-> admin_email;
        $admin_password = md5($request-> admin_password);

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        // return view('admin.dashboard');
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Mật khẩu hoặc tài khoản không đúng');
            return Redirect::to('/admin');
        }
    }
    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/login-auth');
    }
    public function filter_by_date(Request $request){
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Statistic::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }
    // public function order_date(Request $request){
    //     $order_date = $_GET['date'];
    //     $order = Order::where('order_date',$order_date)->orderBy('created_at','DESC')->get();
    //     return view('admin.order_date')->with(compact('order'));
    // }
    public function dashboard_filter(Request $request){
        $data = $request->all();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value']=='7ngay'){
            $get = Statistic::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();
        }elseif($data['dashboard_value']=='thangtruoc'){
            $get = Statistic::whereBetween('order_date',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('order_date','ASC')->get();
        }elseif($data['dashboard_value']=='thangnay'){
            $get = Statistic::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
        }else{
            $get = Statistic::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
        }

        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }
        echo $data = json_encode($chart_data); 
    }
}
