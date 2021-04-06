<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    public function insert(Request $a)
    {
    	$notifi = new Notification();
    	$notifi->notification=$a->notification;
    	$notifi->s_date=$a->s_date;
    	$notifi->e_date=$a->e_date;
    	$notifi->save();
    	if($notifi)
    	{
    		return redirect('admin/notification')->with('message','Addded successfully');
    	}

    }
    public function display()
    {
        $data = Notification::all();
        return view("admin.notification",Compact('data'));
    }
    public function delete($id)
    {
        $y= Notification::find($id);
        $delete= $y->delete();
        if($delete)
        {
            return redirect('admin/notification');
        }

    }
    public function edit($id)
    {
        $edit = Notification::find($id);
        return view("admin.edit_notification",Compact('edit'));
    }
    public function update(Request $z)
   {
        $r = Notification::find($z->id);
        $r->notification=$z->notification;
    	$r->s_date=$z->s_date;
    	$r->e_date=$z->e_date;
        $r->save();
        if($r)
        {
            return redirect('admin/notification');
        }

    }
}
