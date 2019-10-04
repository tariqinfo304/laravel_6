<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhoneModel extends Model
{
    protected $table="phone";


    function user()
    {
    	return $this->belongsTo("App\Model\UserModel","user_id");
    }
}
