<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{

	public function users(Campus $campus){
		// cantidad de usuarios por pagina...
		return view('campus.users',['users' => $campus->users()->paginate(4)]);
	}

    public function show(Campus $campus){
    	$campus->load('users');
    	return view('campus.show',compact('campus'));
    }
}
