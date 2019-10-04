<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserRightsModel extends Model
{
    
    protected $table="user_rights";

    protected $primaryKey="user_right_id";

    public $timestamps=false;



    function user()
   	{
   		return $this->belongsToMany("App\Model\UserModel","user_right_mapping","user_id","right_id");

   	}
}
