<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{
    public function insert(Request $a)
    {
    	$file = $a->file('b_image');
        $filename = 'b_image'. time().'.'.$a->b_image->extension();
        $file->move("uploade/",$filename);
    	$ban = new Banner();
    	$ban->b_title=$a->b_title;
    	$ban->b_des=$a->b_des;
    	$ban->b_image=$filename;
    	$ban->save();
    	if($ban)
    	{
    		return redirect('admin/banner')->with('message','Addded successfully');
    	}

    }
    public function display()
    {
        $data = Banner::all();
        return view("admin.banner",Compact('data'));
    }
    public function delete($id)
    {
        $y= Banner::find($id);
        $delete= $y->delete();
        if($delete)
        {
            return redirect('admin/banner');
        }

    }
    public function edit($id)
    {
        $edit = Banner::find($id);
        return view("admin.edit_banner",Compact('edit'));
    }
    public function update(Request $z)
   {
        if($z->hasFile('b_image'))
        {
        $file = $z->file('b_image');
        $filename = 'b_image'. time().'.'.$z->b_image->extension();
        $file->move("uploade/",$filename);

        $r = Banner::find($z->id);
        $r->b_title=$z->b_title;
        $r->b_des=$z->b_des;
        $r->b_image=$filename;
        $r->save();
        if($r){
            return redirect('admin/banner');
        }
    }
    else
    {
        $r = Banner::find($z->id);
        $r->b_title=$z->b_title;
        $r->b_des=$z->b_des;
        $r->save();
        if($r)
        {
            return redirect('admin/banner');
        }

    }
   }
}
