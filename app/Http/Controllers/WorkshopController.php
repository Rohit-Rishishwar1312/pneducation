<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workshop;

class WorkshopController extends Controller
{
     public function insert(Request $a)
    {
    	
        $file=$a->file('w_image');
     
        $filename = 'w_image'. time().'.'. $a->w_image->extension();
         
        $file->move("uploade/",$filename);
         
    	$work = new Workshop();
    	$work->w_title=$a->w_title;
    	$work->w_image=$filename;
    	$work->save();
    	if ($work) 
    	{
    		return redirect('admin/workshop');
    	}
    }
    public function display()
    {
        $data = Workshop::all();
        return view("admin.workshop",Compact('data'));
    }

    public function delete($id)
    {
        $y= Workshop::find($id);
        $delete= $y->delete();
        if($delete)
        {
            return redirect('admin/workshop');
        }

    }
    public function edit($id)
    {
        $edit = Workshop::find($id);
        return view("admin.edit_workshop",Compact('edit'));
    }
    public function update(Request $z)
   {
        if($z->hasFile('w_image'))
        {
        $file = $z->file('w_image');
        $filename = 'w_image'. time().'.'.$z->w_image->extension();
        $file->move("uploade/",$filename);

        $r = Workshop::find($z->id);
        $r->w_title=$z->w_title;
        $r->w_image=$filename;
        $r->save();
        if($r){
            return redirect('admin/workshop');
        }
    }
    else
    {
        $r = Workshop::find($z->id);
        $r->w_title=$z->w_title;
        $r->save();
        if($r)
        {
            return redirect('admin/workshop');
        }

    }
   }
}
