<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    public function insert(Request $a)
    {
    	$file = $a->file('ot_image');
        $filename = 'ot_image'. time().'.'.$a->ot_image->extension();
        $file->move("uploade/",$filename);
    	$tm = new Team();
    	$tm->ot_name=$a->ot_name;
    	$tm->ot_des=$a->ot_des;
    	$tm->ot_image=$filename;
    	$tm->save();
    	if($tm)
    	{
    		return redirect('admin/ourteam')->with('message','Addded successfully');
    	}

    }
    public function display()
    {
        $data = Team::all();
        return view("admin.ourteam",Compact('data'));
    }
    public function delete($id)
    {
        $y= Team::find($id);
        $delete= $y->delete();
        if($delete)
        {
            return redirect('admin/ourteam');
        }

    }
    public function edit($id)
    {
        $edit = Team::find($id);
        return view("admin.edit_ourteam",Compact('edit'));
    }
    public function update(Request $z)
   {
        if($z->hasFile('ot_image'))
        {
        $file = $z->file('ot_image');
        $filename = 'ot_image'. time().'.'.$z->ot_image->extension();
        $file->move("uploade/",$filename);

        $r = Team::find($z->id);
        $r->ot_name=$z->ot_name;
        $r->ot_des=$z->ot_des;
        $r->ot_image=$filename;
        $r->save();
        if($r){
            return redirect('admin/ourteam');
        }
    }
    else
    {
        $r = Team::find($z->id);
        $r->ot_name=$z->ot_name;
        $r->ot_des=$z->ot_des;
        $r->save();
        if($r)
        {
            return redirect('admin/ourteam');
        }

    }
   }
}
