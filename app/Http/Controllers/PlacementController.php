<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Placement;

class PlacementController extends Controller
{
    public function insert(Request $a)
    {
    	$file = $a->file('p_image');
        $filename = 'p_image'. time().'.'.$a->p_image->extension();
        $file->move("uploade/",$filename);
    	$pl = new Placement();
    	$pl->p_name=$a->p_name;
    	$pl->p_designation=$a->p_designation;
    	$pl->p_company=$a->p_company;
    	$pl->p_image=$filename;
    	$pl->save();
    	if($pl)
    	{
    		return redirect('admin/placement')->with('message','Addded successfully');
    	}

    }
    public function display()
    {
        $data = Placement::all();
        return view("admin.placement",Compact('data'));
    }
    public function delete($id)
    {
        $y= Placement::find($id);
        $delete= $y->delete();
        if($delete)
        {
            return redirect('admin/placement');
        }

    }
    public function edit($id)
    {
        $edit = Placement::find($id);
        return view("admin.edit_placement",Compact('edit'));
    }
    public function update(Request $z)
   {
        if($z->hasFile('p_image'))
        {
        $file = $z->file('p_image');
        $filename = 'p_image'. time().'.'.$z->p_image->extension();
        $file->move("uploade/",$filename);

        $r = Placement::find($z->id);
        $r->p_name=$z->p_name;
        $r->p_designation=$z->p_designation;
        $r->p_company=$z->p_company;
        $r->p_image=$filename;
        $r->save();
        if($r){
            return redirect('admin/placement');
        }
    }
    else
    {
        $r = Placement::find($z->id);
        $r->p_name=$z->p_name;
        $r->p_designation=$z->p_designation;
        $r->p_company=$z->p_company;
        $r->save();
        if($r)
        {
            return redirect('admin/placement');
        }

    }
   }
}
