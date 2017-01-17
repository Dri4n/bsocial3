<?php

namespace App\Http\Controllers;

use \Hash;
use App\User;
use App\Campus;
use Illuminate\Http\Request;

class UsersController extends Controller
{

	// vista -> vista de la totalidad de usuarios del campus;
    public function index(){
    	$users = Campus::find(session()->get('campus_id'))->users;
    	return view('users.index',compact('users'));
    }

    // vista -> editar usuario.
    public function edit(User $user){
    	if($user->id === auth()->id())
    		return view('users.personal_info',compact('user'));
    	
    	return view('errors.401');
    }


    public function update_account_info(Request $request, User $user){
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|confirmed'
        ]);

        $form_data = $request->all();
        if ($user->password !== $form_data['password'])
            $form_data['password'] = bcrypt($form_data['password']);
        $this->update_user($user,$form_data);
        return back();
    }

    // method PUT
    public function update_personal_info(Request $request,User $user){
        $this->validate($request, [
            'email' => 'required|email',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
        ]);

        $form_data = $request->all();
        $this->update_user($user,$form_data);
    	return back();
    }

    protected function update_user(User $user,$form_data){
        $user = $user->update($form_data);
    }

    // method DELETE
    public function delete(User $user){

    }

    // method POST
    public function update_avatar(Request $request,User $user){

    	$this->validate($request, [
             'avatar' => 'dimensions:max_width=100,max_height=100|image|required', 
             'file' => 'max:5000',
        ]);

        $file = request()->file('avatar');
        $ext = $file->guessClientExtension();
        $path = $file -> storeAs('avatar/'.$user->id,"avatar.".$ext);
        
        // TODO -> falta especificar como se guardaran los archivos del sitio....
        // $user -> url_avatar = $path;

        session()->flash('upload_ok', "Archivo subido correctamente");
        return back();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
    }
}
