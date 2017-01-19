<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','first_name','last_name',
        'birth_date','campus_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function count(){
        return $this->count();
    }

    
    public function campus(){
        return $this->belongsTo(Campus::class);
    }

    public function owns_this($relationShip){
        if($relationShip instanceof User)
            return $this->id === $relationShip->id;
        return $this->id === $relationShip->user_id;
    }
}
