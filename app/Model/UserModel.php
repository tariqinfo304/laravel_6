<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = "user";
    public $timestamps=false;


   	public function sim()
   	{
   		return $this->hasOne("App\Model\SimModel","user_id");
   	}


   	function phones()
   	{
   		return $this->hasMAny("App\Model\PhoneModel","user_id");
   	}


   	function rights()
   	{
   		return $this->belongsToMany("App\Model\UserRightsModel","user_right_mapping","user_id","right_id");

   	}
}
