<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intern;

class InternController extends Controller
{
    public function insert(Request $a)
    {
    	$file = $a->file('i_image');
        $filename = 'i_image'. time().'.'.$a->i_image->extension();
        $file->move("uploade/",$filename);
    	$in = new Intern();
    	$in->i_name=$a->i_name;
    	$in->i_designation=$a->i_designation;
    	$in->i_company=$a->i_company;
    	$in->i_image=$filename;
    	$in->save();
    	if($in)
    	{
    		return redirect('admin/intern')->with('message','Addded successfully');
    	}

    }
    public function display()
    {
        $data = Intern::all();
        return view("admin.intern",Compact('data'));
    }
    public function delete($id)
    {
        $y= Intern::find($id);
        $delete= $y->delete();
        if($delete)
        {
            return redirect('admin/intern');
        }

    }
    public function edit($id)
    {
        $edit = Intern::find($id);
        return view("admin.edit_intern",Compact('edit'));
    }
    public function update(Request $z)
   {
        if($z->hasFile('i_image'))
        {
        $file = $z->file('i_image');
        $filename = 'i_image'. time().'.'.$z->i_image->extension();
        $file->move("uploade/",$filename);

        $r = Intern::find($z->id);
        $r->i_name=$z->i_name;
        $r->i_designation=$z->i_designation;
        $r->i_company=$z->i_company;
        $r->i_image=$filename;
        $r->save();
        if($r){
            return redirect('admin/intern');
        }
    }
    else
    {
        $r = Intern::find($z->id);
        $r->i_name=$z->i_name;
        $r->i_designation=$z->i_designation;
        $r->i_company=$z->i_company;
        $r->save();
        if($r)
        {
            return redirect('admin/intern');
        }

    }
   }
}
