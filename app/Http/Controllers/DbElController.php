<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\UserModel;
use DB;

class DbElController extends Controller
{
    function db()
    {
    	$user  = new UserModel();


    	//$user_list = $user->all();

    	//$user_list = $user->where("id", 1)->get();

    	//$user_list = $user->orderBy("name","Asc")->take(1)->get();

    	
    	//DB::enableQueryLog();

    	//$user_list = $user->orderBy("name","Asc")->take(1)->get();
    	


    	//$user_list = $user->first();
    	//$user_list->name="evs";

    	//dd($user_list);
    	//it will retrive record from DB//
    	//$user_list_12 = $user_list->fresh();

    	//print_r(DB::getQueryLog());

    	//$user_list = $user->where(["id"=> 1,"name" => "sultan"])->get();
    	//dd($user_list);

    	/*
    	foreach ($user_list as $row):
    		
    		echo $row->name;
    		echo "<br/>";

    	endforeach;

    	*/


    	/*
    	//Insert into DB//
    	$user_obj = new UserModel();
    	$user_obj->name="saif";
    	$user_obj->username="saif786";
    	$user_obj->email = "saif@gnail.com";
    	var_dump($user_obj->save());
    	*/

    	/*
    	//one record update in DB
    	$user_update = new UserModel();
    	$user_update = $user_update->find(1);
    	$user_update->password="evs786";
    	dd($user_update->save());
		*/

    	/*
		//massive udate

		$user_list_update = new UserModel();
		$user_list_update = $user_list_update
							->where("name","abc")
							->update(["password"=>"abc786"]);

		//$user_list_update[0]->name="abc";
		//dd($user_list_update[0]->save());
		*/

							/*
		//delete() method call when we get data from db
		$user_delete= new UserModel();
		$user_delete = $user_delete->find(2);
		$user_delete->delete();
		*/

		/*
		// it wil remove data from table directly
		$user_delete= new UserModel();
		//var_dump($user_delete->destroy(3));
		var_dump($user_delete->destroy([3,5]));
		*/
		


    }
}
