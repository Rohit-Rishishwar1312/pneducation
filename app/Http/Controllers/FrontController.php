<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Navfoot;
use App\Team;
use App\Placement;
use App\Intern;
use App\Contact;


class FrontController extends Controller
{
    //frontend go to cart
    public function goto_cart()
    {
        $carts= Cart::all();
        $navf= Navfoot::all();
        return view('front.goto_cart',Compact('navf','carts'));
        
    }
    public function addtocart(Request $c)
    {
        //echo "rohit";
        //print_r($c->all());
        $cart = new Cart();
        $cart->course_id=$c->course_id;
        $cart->course_name=$c->course_name;
        $cart->course_price=$c->course_price;
        $cart->course_image=$c->course_image;
        $cart->save();
        if($cart)
        {
            return redirect('goto_cart');
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
}
