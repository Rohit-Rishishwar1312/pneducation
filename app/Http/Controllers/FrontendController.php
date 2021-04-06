<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Learn;
use App\Cart;
use App\Navfoot;
use App\Category;
use App\Course;
use App\User;
use App\Notification;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

class FrontendController extends Controller
{
    public function index()
    {
        $bann = Banner::all();
        $lear = Learn::all();
        $navf = Navfoot::all();
        $catego = Category::all();
        $course = Course::all();
        $notific= Notification::all();
        return view('front.index',Compact('bann','lear','navf','catego','course','notific'));
    }
    //frontend course_detail
    public function course_detail($id)
    {
        $course = Course::find($id);
        $navf= Navfoot::all();
        return view('front.course_detail',Compact('navf','course'));
    }
    public function courses()
    {
        $navf = Navfoot::all();
        $catego = Category::all();
        $course = Course::all();
        return view('front.courses',Compact('navf','course','catego'));
    }
    public function category_courses($id)
    {
        $navf = Navfoot::all();
        $catego = Category::find($id);
        $course = Course::all();
        return view('front.category_courses',Compact('catego','course','navf'));

    }
    public function signup()
    { 
        $navf = Navfoot::all();
        return view('front.signup',Compact('navf'));
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
            return redirect('signup')->with('message','Addded successfully');
        }

    }
    public function login()
    { 
        $navf = Navfoot::all();
        return view('front.login',Compact('navf'));
    }
    public function dologin(Request $a)
    {
        $session_id = Session::getId();
        $data=$a->all();
        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
            Cart::where('session_id',$session_id)->update(['user_email'=>$data['email']]);
            return redirect("goto_cart")->with('message','Login Successfully');
        }
        else{
            return redirect("front/login")->with('message','Login Unsuccessfully');
        }  
    }
    public function front_logout(Request $request) {
        Auth::logout();
        return redirect('front/login');
     }
    
}


