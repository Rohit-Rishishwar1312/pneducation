<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Learn;
use App\Cart;
use App\Navfoot;
use App\Rating;
use App\Category;
use App\Course;
use App\Coupan;
use App\User;
use App\Notification;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
use DB;

class FrontendController extends Controller
{
    public function index()
    {
        $bann = Banner::all();
        $lear = Learn::all();
        $rate= Rating::all();
        $user= User::all();
        $navf = Navfoot::all();
        $cart= Cart::all();
        $catego = Category::all();
        $course = Course::all();
        $notific= Notification::all();
        return view('front.index',Compact('bann','lear','navf','catego','course','notific','cart','rate','user'));
    }
    //frontend course_detail
    public function course_detail($id)
    {
        $course = Course::find($id);
        $cart= Cart::all();
        $rate= Rating::all();
        $user= User::all();
        $navf= Navfoot::all();
        return view('front.course_detail',Compact('navf','course','cart','rate','user'));
    }
    public function courses()
    {
        $navf = Navfoot::all();
        $cart= Cart::all();
        $catego = Category::all();
        $course = Course::all();
        return view('front.courses',Compact('navf','course','catego','cart'));
    }
    public function categories()
    {
        $navf = Navfoot::all();
        $cart= Cart::all();
        $catego = Category::all();
        $course = Course::all();
        return view('front.category',Compact('navf','course','catego','cart'));
    }
    public function category_courses($id)
    {
        $navf = Navfoot::all();
        $cart= Cart::all();
        $catego = Category::find($id);
        $course = Course::all();
        return view('front.category_courses',Compact('catego','course','navf','cart'));

    }
    public function signup()
    { 
        $navf = Navfoot::all();
        $cart= Cart::all();
        return view('front.signup',Compact('navf','cart'));
    }
    public function save(Request $a)
    {
        
        $u = new User();
        $u->name=$a->name;
        $u->email=$a->email;
        $u->password=Hash::make($a->password);
        $u->save();
        if($u)
        {
            return redirect('signup')->with('message','SIGN UP successfully');
        }

    }
    public function login()
    { 
        $navf = Navfoot::all();
        $cart= Cart::all();
        return view('front.login',Compact('navf','cart'));
    }
    public function dologin(Request $a)
    {
        $session_id = Session::getId();
        $data=$a->all();
        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
            Cart::where('session_id',$session_id)->update(['user_email'=>$data['email']]);
            return redirect("index")->with('message','Login Successfully');
        }
        else{
            return redirect("front/login")->with('message','Login Unsuccessfully');
        }  
    }

    public function front_logout(Request $request) {
        Auth::logout();
        return redirect('front/login');
     }
     public function forgot_password()
    {
        return view('front.forgot_password');
    }
    public function profile()
    {
        $navf= Navfoot::all();
        $cart= Cart::all();
        $data= DB::table('course__orders')->join('course__order__products','course__orders.user_id','course__order__products.user_id')->get();
        return view('front.profile',Compact('navf','data','cart'));
    }
    public function user_order_data()
    {
        $navf= Navfoot::all();
        $cart= Cart::all();
        $data= DB::table('course__orders')->join('course__order__products','course__orders.user_id','course__order__products.user_id')->get();
        return view('front.user_order_data',Compact('navf','data','cart'));
    }
    public function applyCoupan(Request $request)
    {
        Session::forget('coupanAmount');
        Session::forget('coupanCode');
      if($request->isMethod('post'))
      {
        $data = $request->all();
        // echo "<pre>";
        // print_r($data);
        // die;
        $coupancount= Coupan::where('coupan_code',$data['coupan_code'])->count();
        if($coupancount==0)
        {
            return redirect()->back()->with('message','Coupon Code does not exists');
        }
        else
        {
            // echo "success";die;
            $coupanDetails = Coupan::where('coupan_code',$data['coupan_code'])->first();
            $expiry_date = $coupanDetails->expiry_date;
            $current_date = date('Y-m-d');
            if($expiry_date < $current_date)
            {
              return redirect()->back()->with('message','Coupon Code is Expired');  
            }
            //Coupan is ready for discount
            $session_id = Session::getId();
            $userCart = Cart::where('session_id',$session_id)->get();
            $total_amount = 0;
            foreach($userCart as $item)
            {
                $total_amount = $total_amount + ($item->course_price*$item->course_quantity);
            }
            //check if counpon amount is fixed or percentage
            if($coupanDetails->amount_type=="fixed")
            {
                $coupanAmount = $coupanDetails->amount;
                // print_r($coupanAmount);
                // die;
                //Add coupan Code in session
            Session::put('coupanAmount',$coupanAmount);
            Session::put('coupanCode',$data['coupan_code']);
            // echo Session::get('coupanAmount');die;
            return redirect()->back()->with('message','Coupon Code is Successfully Applied. You are Availing Discount');
            }
            else
            {
              $coupanAmount = $total_amount * ($coupanDetails->amount/100);  
              //Add coupan Code in session
            Session::set('coupanAmount',$coupanAmount);
            Session::set('coupanCode',$data['coupan_code']);
            return redirect()->back()->with('message','Coupon Code is Successfully Applied. You are Availing Discount');
            }
        }
      }
    }
    public function insert_rating(Request $a)
    {
        $ir = new Rating();
        $ir->user_id=$a->user_id;
        $ir->course_id=$a->course_id;
        $ir->rating=$a->rating;
        $ir->message=$a->message;
        $ir->save();
        if($ir)
        {
            return redirect()->back()->with('message','Rating successfully Given');
        }
    }
}


