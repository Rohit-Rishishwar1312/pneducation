<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupan;

class CoupanController extends Controller
{
    public function insert(Request $a)
    {
    	$coupan = new Coupan();
    	$coupan->coupan_code=$a->coupan_code;
    	$coupan->amount=$a->amount;
    	$coupan->amount_type=$a->amount_type;
    	$coupan->status=1;
        $coupan->expiry_date=$a->expiry_date;
    	$coupan->save();
    	if($coupan)
    	{
    		return redirect('admin/coupan')->with('message','Addded successfully');
    	}

    }
    public function display()
    {
        $data = Coupan::all();
        return view("admin.coupan",Compact('data'));
    }
    public function delete($id)
    {
        $y= Coupan::find($id);
        $delete= $y->delete();
        if($delete)
        {
            return redirect('admin/coupan');
        }

    }
    public function edit($id)
    {
        $edit = Coupan::find($id);
        return view("admin.edit_coupan",Compact('edit'));
    }
    public function update(Request $z)
   {
        $r = Coupan::find($z->id);
        $r->coupan_code=$z->coupan_code;
    	$r->amount=$z->amount;
    	$r->amount_type=$z->amount_type;
        $r->expiry_date=$z->expiry_date;
    	$r->save();
        
        if($r)
        {
            return redirect('admin/coupan');
        }

    }
}
