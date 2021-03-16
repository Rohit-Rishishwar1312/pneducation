<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Learn;

class LearnController extends Controller
{
    public function insert(Request $a)
    {
    	$file = $a->file('l_image');
        $filename = 'l_image'. time().'.'.$a->l_image->extension();
        $file->move("uploade/",$filename);
    	$lrn = new Learn();
    	$lrn->l_title=$a->l_title;
    	$lrn->l_des=$a->l_des;
    	$lrn->l_image=$filename;
    	$lrn->save();
    	if($lrn)
    	{
    		return redirect('admin/learn')->with('message','Addded successfully');
    	}

    }
    public function display()
    {
        $data = Learn::all();
        return view("admin.learn",Compact('data'));
    }
    public function delete($id)
    {
        $y= Learn::find($id);
        $delete= $y->delete();
        if($delete)
        {
            return redirect('admin/learn');
        }

    }
    public function edit($id)
    {
        $edit = Learn::find($id);
        return view("admin.edit_learn",Compact('edit'));
    }
    public function update(Request $z)
   {
        if($z->hasFile('l_image'))
        {
        $file = $z->file('l_image');
        $filename = 'l_image'. time().'.'.$z->l_image->extension();
        $file->move("uploade/",$filename);

        $r = Learn::find($z->id);
        $r->l_title=$z->l_title;
    	$r->l_des=$z->l_des;
    	$r->l_image=$filename;
        $r->save();
        if($r){
            return redirect('admin/learn');
        }
    }
    else
    {
        $r = Learn::find($z->id);
        $r->l_title=$z->l_title;
    	$r->l_des=$z->l_des;
        $r->save();
        if($r)
        {
            return redirect('admin/learn');
        }

    }
   }
}
