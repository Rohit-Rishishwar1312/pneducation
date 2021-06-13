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
        // $data= DB::table('course__orders')->join('course__order__products','course__orders.user_id','course__order__products.user_id')->get();
        //print_r($data);
        $data = Course_Order::all();
        return view('admin.course_order',Compact('data'));

    }
    public function view_order($id)
    {
        // $data= DB::table('course__orders')->join('course__order__products','course__orders.user_id','course__order__products.user_id')->get();
        //print_r($data);
        $course_user = Course_Order::all();
        $navf= Navfoot::all();
        $data = Course_Order_Product::where('course_order_id',$id)->get();
        return view('admin.view_order',Compact('data','navf','course_user'));

    }
    public function update_order_status(Request $z)
    {
        $co = Course_Order::find($z->id);
        $co->order_status =$z->order_status;
        $co->save();
        if($co)
        {
            return redirect('admin/course_order');
        }
    }
     public function invoice($id)
    {
        $course_user = Course_Order::all();
        $navf= Navfoot::all();
        $data = Course_Order_Product::where('course_order_id',$id)->get();
        return view('admin.invoice',compact('data','navf','course_user'));
    }
    
}
