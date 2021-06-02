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
        $cart= Cart::all();
        return view('front.goto_cart',Compact('navf','carts','cart'));
        
    }
    public function addtocart(Request $c)
    {
        Session::forget('coupanAmount');
        Session::forget('coupanCode');
        //echo "rohit";
        // print_r($c->all());
        if(Auth::check())
        {
         $user_email= Auth::User()->email;   
         $cart = new Cart();
         $cart->course_id=$c->course_id;
         $cart->course_name=$c->course_name;
         $cart->course_price=$c->course_price;
         $cart->course_image=$c->course_image;
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
        $cart= Cart::all();
        $navf= Navfoot::all();
        return view('front.team',Compact('navf','tm','cart'));
    }
    public function placement()
    {
        $place = Placement::all();
        $cart= Cart::all();
        $navf= Navfoot::all();
        return view('front.placement',Compact('navf','place','cart'));
    }
    public function intern()
    {
        $in = Intern::all();
        $cart= Cart::all();
        $navf= Navfoot::all();
        return view('front.intern',Compact('navf','in','cart'));
    }
    public function contact()
    {
        $cont= Contact::all();
        $cart= Cart::all();
        $navf= Navfoot::all();
        return view('front.contact',Compact('navf','cont','cart'));
    }
    public function aboutus()
    {
        $navf= Navfoot::all();
        $cart= Cart::all();
        return view('front.aboutus',Compact('navf','cart'));
    }
    public function MPCT_workshop()
    {
        $navf= Navfoot::all();
        $cart= Cart::all();
        $work = Workshop::where('w_title','MPCT College')->get();
        // echo "<pre>";
        // print_r($view);
         return view('front.MPCT',compact('navf','work','cart'));
    }
    
     public function Xiaomi_workshop()
    {
        $navf= Navfoot::all();
        $cart= Cart::all();
        $work = Workshop::where('w_title','Xiaomi MI Company')->get();
        // echo "<pre>";
        // print_r($view);
         return view('front.Xiaomi',compact('navf','work','cart'));
    }

    public function Bentchair_workshop()
    {
        $navf= Navfoot::all();
        $cart= Cart::all();
        $work= Workshop::where('w_title','Bentchair Company')->get();
        // echo "<pre>";
        // print_r($view);
         return view('front.Bentchair',compact('navf','work','cart'));
    }

    public function RJIT_workshop()
    {
        $navf= Navfoot::all();
        $cart= Cart::all();
        $work = Workshop::where('w_title','RJIT College')->get();
        // echo "<pre>";
        // print_r($view);
         return view('front.RJIT',compact('navf','work','cart'));
    }
    public function quantity_update($id=null,$course_quantity=null)
    {
        Session::forget('coupanAmount');
        Session::forget('coupanCode');
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
        $cart= Cart::all();
        return view('front.checkout',Compact('navf','carts','cart'));
    }
    public function cart_remove($id)
    {
      Session::forget('coupanAmount');
      Session::forget('coupanCode');
      $y= Cart::find($id);
      $delete= $y->delete();
      if($delete)
      {
        return redirect('goto_cart');
      }
    }

}
