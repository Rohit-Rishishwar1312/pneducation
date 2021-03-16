<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrontContact;

class FrontContactController extends Controller
{
    public function insert(Request $a)
    {
    	$fcontact = new FrontContact();
    	$fcontact->name=$a->name;
    	$fcontact->email=$a->email;
    	$fcontact->phone=$a->phone;
    	$fcontact->message=$a->message;
    	$fcontact->save();
    	if($fcontact)
    	{
    		return redirect('contact')->with('message','Addded successfully');
    	}

    }
}
