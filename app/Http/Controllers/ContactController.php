<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
   public function insert(Request $a)
    {
    	$contact = new Contact();
    	$contact->phone=$a->phone;
    	$contact->email=$a->email;
    	$contact->address=$a->address;
    	$contact->office=$a->office;
    	$contact->save();
    	if($contact)
    	{
    		return redirect('admin/contact')->with('message','Addded successfully');
    	}

    } 
    public function display()
    {
        $data = Contact::all();
        return view("admin.contact",Compact('data'));
    }
    public function delete($id)
    {
        $y= Contact::find($id);
        $delete= $y->delete();
        if($delete)
        {
            return redirect('admin/contact');
        }

    }
    public function edit($id)
    {
        $edit = Contact::find($id);
        return view("admin.edit_contact",Compact('edit'));
    }
    public function update(Request $z)
   {
        $r = Contact::find($z->id);
        $r->phone=$z->phone;
    	$r->email=$z->email;
    	$r->address=$z->address;
    	$r->office=$z->office;
        $r->save();
        if($r)
        {
            return redirect('admin/contact');
        }

    }
}
