<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function insert(Request $a)
    {
        $file = $a->file('ca_image');
        $filename = 'ca_image'. time().'.'.$a->ca_image->extension();
        $file->move("uploade/",$filename);
    	$c = new Category();
    	$c->name=$a->name;
    	$c->status=1;
        $c->ca_image=$filename;
    	$c->save();
    	if($c)
    	{
    		return redirect('admin/category')->with('message','Addded successfully');
    	}

    }
    public function display()
    {
        $data = Category::all();
        return view("admin.category",Compact('data'));
    }
    public function delete($id)
    {
    	$y= Category::find($id);
    	$delete= $y->delete();
    	if($delete)
    	{
    		return redirect('admin/category');
    	}

    }
    public function edit($id)
    {
        $ed = Category::find($id);
        return view("admin.edit_category",Compact('ed'));
    }
    public function update(Request $z)
    {
        if($z->hasFile('ca_image'))
        {
        $file = $z->file('ca_image');
        $filename = 'ca_image'. time().'.'.$z->ca_image->extension();
        $file->move("uploade/",$filename);

        $r = Category::find($z->id);
        $r->name=$z->name;
        $r->ca_image=$filename;
        $r->save();
        if($r){
            return redirect('admin/category');
        }
    }
    else
    {
        $r = Category::find($z->id);
        $r->name=$z->name;
        $r->save();
        if($r)
        {
            return redirect('admin/category');
        }

    }

    }
}
