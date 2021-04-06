<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\FrontContact;

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
    
}
