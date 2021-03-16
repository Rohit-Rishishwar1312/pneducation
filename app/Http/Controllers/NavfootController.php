<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Navfoot;

class NavfootController extends Controller
{
    public function insert(Request $a)
    {
    	$file = $a->file('nf_logo_image');
        $filename = 'nf_logo_image'. time().'.'.$a->nf_logo_image->extension();
        $file->move("uploade/",$filename);
    	$nft = new Navfoot();
    	$nft->nf_email=$a->nf_email;
    	$nft->nf_phone=$a->nf_phone;
    	$nft->nf_des=$a->nf_des;
    	$nft->nf_address=$a->nf_address;
    	$nft->nf_logo_image=$filename;
    	$nft->save();
    	if($nft)
    	{
    		return redirect('admin/navfoot')->with('message','Addded successfully');
    	}

    }
    public function display()
    {
        $data = Navfoot::all();
        return view("admin.navfoot",Compact('data'));
    }
    public function edit($id)
    {
        $edit = Navfoot::find($id);
        return view("admin.edit_navfoot",Compact('edit'));
    }
    public function update(Request $z)
   {
        if($z->hasFile('nf_logo_image'))
        {
        $file = $z->file('nf_logo_image');
        $filename = 'nf_logo_image'. time().'.'.$z->nf_logo_image->extension();
        $file->move("uploade/",$filename);

        $r = Navfoot::find($z->id);
        $r->nf_email=$z->nf_email;
    	$r->nf_phone=$z->nf_phone;
    	$r->nf_des=$z->nf_des;
    	$r->nf_address=$z->nf_address;
    	$r->nf_logo_image=$filename;
        $r->save();
        if($r){
            return redirect('admin/navfoot');
        }
    }
    else
    {
        $r = Navfoot::find($z->id);
        $r->nf_email=$z->nf_email;
    	$r->nf_phone=$z->nf_phone;
    	$r->nf_des=$z->nf_des;
    	$r->nf_address=$z->nf_address;
        $r->save();
        if($r)
        {
            return redirect('admin/navfoot');
        }

    }
   }
   public function delete($id)
    {
        $y= Navfoot::find($id);
        $delete= $y->delete();
        if($delete)
        {
            return redirect('admin/navfoot');
        }

    }
}
