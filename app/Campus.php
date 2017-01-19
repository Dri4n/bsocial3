<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = 'campus';

    protected $fillable = [
        'name', 'address', 'id'
    ];

    public function addUser($user){

    	if($user instanceof User)
			return $this->users()->save($user);
		$this->users()->saveMany($user);
    }

    public function users(){
    	return $this->hasMany(User::class);
    }
}
