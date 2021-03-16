<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Category;

class CourseController extends Controller
{
    
    public function insert(Request $a)
    {
    	$file = $a->file('c_image');
        $filename = 'c_image'. time().'.'.$a->c_image->extension();
        $file->move("uploade/",$filename);
    	$cou = new Course();
    	$cou->c_name=$a->c_name;
    	$cou->c_des=$a->c_des;
    	$cou->c_price=$a->c_price;
    	$cou->c_detail=$a->c_detail;
    	$cou->c_include=$a->c_include;
    	$cou->c_content=$a->c_content;
    	$cou->c_image=$filename;
    	$cou->c_category=$a->c_category;
    	$cou->save();
    	if($cou)
    	{
    		return redirect('admin/course')->with('message','Addded successfully');
    	}

    }
    public function display()
    {
        $cour = Category::all();
        $data = Course::all();
        return view("admin.course",Compact('data','cour'));
    }
    public function edit($id)
    {
        $cate = Category::all();
        $edit = Course::find($id);
        return view("admin.edit_course",Compact('edit','cate'));
    }
    public function update(Request $z)
   {
        if($z->hasFile('c_image'))
        {
        $file = $z->file('c_image');
        $filename = 'c_image'. time().'.'.$z->c_image->extension();
        $file->move("uploade/",$filename);

        $r = Course::find($z->id);
        $r->c_name=$z->c_name;
        $r->c_des=$z->c_des;
        $r->c_price=$z->c_price;
        $r->c_detail=$z->c_detail;
        $r->c_include=$z->c_include;
        $r->c_content=$z->c_content;
        $r->c_category=$z->c_category;
        $r->c_image=$filename;
        $r->save();
        if($r){
            return redirect('admin/course');
        }
    }
    else
    {
        $r = Course::find($z->id);
        $r->c_name=$z->c_name;
        $r->c_des=$z->c_des;
        $r->c_price=$z->c_price;
        $r->c_detail=$z->c_detail;
        $r->c_include=$z->c_include;
        $r->c_content=$z->c_content;
        $r->c_category=$z->c_category;
        $r->save();
        if($r)
        {
            return redirect('admin/course');
        }

    }
   }
   public function delete($id)
    {
        $y= Course::find($id);
        $delete= $y->delete();
        if($delete)
        {
            return redirect('admin/course');
        }

    }
    
}
