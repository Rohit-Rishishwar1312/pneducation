<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Navfoot;
use App\Team;
use App\Placement;
use App\Intern;
use App\Contact;
use App\Workshop;
use Session;
use Auth;
use DB;


class FrontController extends Controller
{
    //frontend go to cart
    public function goto_cart()
    {
        
        //print_r($session_id);
        if(Auth::check())
        {
          $user_email= Auth::User()->email; 
          $carts= Cart::where('user_email',$user_email)->get(); 
        }
        else
        {
           $session_id = Session::getId();
           $carts= Cart::where('session_id',$session_id)->get(); 
        }
        $navf= Navfoot::all();
        return view('front.goto_cart',Compact('navf','carts'));
        
    }
    public function addtocart(Request $c)
    {
        //echo "rohit";
        // print_r($c->all());
        if(Auth::check())
        {
         $session_id = Session::getId();
         $user_email= Auth::User()->email;   
         $cart = new Cart();
         $cart->course_id=$c->course_id;
         $cart->course_name=$c->course_name;
         $cart->course_price=$c->course_price;
         $cart->course_image=$c->course_image;
         $cart->session_id=$session_id;
         $cart->user_email=$user_email;
         $cart->save();
         if($cart)
         {
            return redirect('goto_cart');
         }
        }
        else
        {
        $session_id = Session::getId();
        //print_r($session_id);
        $cart = new Cart();
        $cart->course_id=$c->course_id;
        $cart->course_name=$c->course_name;
        $cart->course_price=$c->course_price;
        $cart->course_image=$c->course_image;
        $cart->session_id=$session_id;
        $cart->save();
         if($cart)
         {
            return redirect('goto_cart');
         }
        }
    }
    public function team()
    {
        $tm = Team::all();
        $navf= Navfoot::all();
        return view('front.team',Compact('navf','tm'));
    }
    public function placement()
    {
        $place = Placement::all();
        $navf= Navfoot::all();
        return view('front.placement',Compact('navf','place'));
    }
    public function intern()
    {
        $in = Intern::all();
        $navf= Navfoot::all();
        return view('front.intern',Compact('navf','in'));
    }
    public function contact()
    {
        $cont= Contact::all();
        $navf= Navfoot::all();
        return view('front.contact',Compact('navf','cont'));
    }
    public function aboutus()
    {
        $navf= Navfoot::all();
        return view('front.aboutus',Compact('navf'));
    }
    public function MPCT_workshop()
    {
        $navf= Navfoot::all();
        $work = Workshop::where('w_title','MPCT College')->get();
        // echo "<pre>";
        // print_r($view);
         return view('front.MPCT',compact('navf','work'));
    }
    
     public function Xiaomi_workshop()
    {
        $navf= Navfoot::all();
        $work = Workshop::where('w_title','Xiaomi MI Company')->get();
        // echo "<pre>";
        // print_r($view);
         return view('front.Xiaomi',compact('navf','work'));
    }

    public function Bentchair_workshop()
    {
        $navf= Navfoot::all();
        $work= Workshop::where('w_title','Bentchair Company')->get();
        // echo "<pre>";
        // print_r($view);
         return view('front.Bentchair',compact('navf','work'));
    }

    public function RJIT_workshop()
    {
        $navf= Navfoot::all();
        $work = Workshop::where('w_title','RJIT College')->get();
        // echo "<pre>";
        // print_r($view);
         return view('front.RJIT',compact('navf','work'));
    }
    public function quantity_update($id=null,$course_quantity=null)
    {
        // echo $id;
        // echo $course_quantity;
        DB::table('carts')->where('id',$id)->increment('course_quantity',$course_quantity);
        return redirect('goto_cart');
    }

    public function checkout()
    {
        if(Auth::check())
        {
          $user_email= Auth::User()->email; 
          $carts= Cart::where('user_email',$user_email)->get(); 
        }
        $navf= Navfoot::all();
        return view('front.checkout',Compact('navf','carts'));
    }

}
