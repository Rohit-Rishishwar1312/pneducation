<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Cart;
use App\Navfoot;
use DB;

class SearchController extends Controller
{
    public function search_course(Request $request)
    {
      $navf = Navfoot::all();
      $cart = Cart::all();
      $search= $request->get('search');
      //print($search);
      $result= DB::table('courses')->where('c_name','like', '%'.$search.'%')->get();

      return view('front.search_page',Compact('navf','result','cart'));
      
    }
}
