<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\FrontContact;
use App\Course_Order;
use App\Navfoot;
use App\Course_Order_Product;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	
    	return view('admin.index');
    }
    public function category()
    {
    	
    	return view('admin.category');
    }
    public function course()
    {

        return view('admin.course');
    }
    public function banner()
    {

        return view('admin.banner');
    }
    public function navfoot()
    {

        return view('admin.navfoot');
    }
    public function learn()
    {

        return view('admin.learn');
    }
    public function ourteam()
    {

        return view('admin.ourteam');
    }
    public function placement()
    {

        return view('admin.placement');
    }
    public function intern()
    {

        return view('admin.intern');
    }
    public function contact()
    {

        return view('admin.contact');
    }
    public function contact_data()
    {
        $co= FrontContact::all();
        return view('admin.contact_data',Compact('co'));
    }
    public function notification()
    {
        return view('admin.notification');
    }
    public function workshop()
    {
        return view('admin.workshop');
    }
     public function coupan()
    {
        return view('admin.coupan');
    }
    public function course_order()
    {
        $data= DB::table('course__orders')->join('course__order__products','course__orders.user_id','course__order__products.user_id')->get();
        //print_r($data);
        return view('admin.course_order',Compact('data'));

    }
     public function invoice($id)
    {
        $navf= Navfoot::all();
        $data= DB::table('course__orders')->join('course__order__products','course__orders.user_id','course__order__products.user_id')->get();
        return view('admin.invoice',compact('data','id','navf'));
    }
    
}
