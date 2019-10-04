<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SimModel extends Model
{
    	
    	protected $table = "user_sim";
    	protected $primaryKey = "sim_id";
    	public $timestamps = false;

    	function user_info()
    	{
    		return $this->belongsTo("App\Model\UserModel","user_id");
    	}
}
