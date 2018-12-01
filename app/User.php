<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

public function parkings(){
  return $this->hasMany('App\Parking');
}

public function tdls(){
  return $this->hasMany('App\Tdl');
}


public function ResidenceMembers(){
  return $this->hasMany('App\ResidenceMember');
}

  // public static function isAdmin(){
  //   return $this->isAdmin;
  // }




    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password','fullName','usergroup_id','position','mobileNumber','lastLogin','lastAction','twoStepCode','isAdmin','isDataEntry','isDefaulPassword','Active','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




}
