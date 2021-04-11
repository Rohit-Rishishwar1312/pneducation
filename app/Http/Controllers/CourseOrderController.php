<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course_Order;
use App\Course_Order_Product;
use App\Cart;
use Session;
use DB;

class CourseOrderController extends Controller
{
    public function insert(Request $a)
    {
    	$co = new Course_Order();
    	$co->name=$a->name;
    	$co->user_email=$a->user_email;
    	$co->user_id=$a->user_id;
    	$co->country=$a->country;
    	$co->address=$a->address;
    	$co->city=$a->city;
    	$co->state=$a->state;
    	$co->pincode=$a->pincode;
    	$co->order_note=$a->order_note;
    	$co->order_status=$a->order_status;
    	$co->payment_method=$a->payment_method;
    	$co->coupan_code=$a->coupan_code;
    	$co->coupan_amount=$a->coupan_amount;
    	$co->total=$a->total;
    	$co->save();
    	$cartproduct=DB::table('carts')->where(['user_email'=>$a->user_email])->get();
    	// foreach($cartproduct as $c)
    	// {
    	// 	$cp = new Course_Order_Product();
    	// 	$cp->corse_order_id=$c->
    	// }
    	//print_r($cartproduct);
    	if($co)
    	{
    		return redirect('checkout')->with('message','Addded successfully');
    	}
    }
}
