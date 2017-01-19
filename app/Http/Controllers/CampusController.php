<?php

namespace App\Http\Controllers;

use Gate;
use App\User;
use App\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{

    // TODO : REFACTORIZAR GATES....

    // usuario de un campus
    public function user_campus($user){
        $campus = Campus::find(session()->get('campus_id'));
        if(Gate::denies('show-campus',$campus)){
            return view('errors.401');
        };
        return $campus->users()->where('id',$user)->first();
        return view('campus.user',compact('user'));
    }

    // usuario del campus
	public function users(Request $request){
        $campus = Campus::find(session()->get('campus_id'));
        if(Gate::denies('show-campus',$campus)){
            return view('errors.401');
        };
		// cantidad de usuarios por pagina...
        $keyword = $request->input('keyword');
        $users = $campus->users();
        if($keyword !== NULL && $keyword !== ''){
            $keywordsearch = '%'. $keyword .'%';
            $users = $users->where('first_name','LIKE',$keywordsearch)
            ->orWhere('last_name','LIKE',$keywordsearch)
            ->orWhere('email','LIKE',$keywordsearch)
            ->orWhere('name','LIKE',$keywordsearch);
        }
		return view('campus.users',['campus'=> $campus,'users' => $users->paginate(4),'keyword' => $keyword]);
	}

    // mostrar campus
    public function show(){
        $campus = Campus::find(session()->get('campus_id'));
    	if(Gate::denies('show-campus',$campus)){
            return view('errors.401');
        };

    	$campus->load('users');
    	return view('campus.show',compact('campus'));
    }
}
