<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DBController extends Controller
{
    function db()
    {
    	echo "<pre>";
    	

    	//$evs = DB::table("evs")->get();


    	//$evs = DB::table("evs")->where("name","sultan")->get();

    	//$evs = DB::table("evs")->where("name","sultan")->first();

    	//$evs = DB::table("evs")->where("name","sultan")->value("username");

    	//will return one single record of table (first)
    	//$evs = DB::table("evs")->value("username");


    	//run in case of column name "id" exist
    	//$evs = DB::table("evs")->find(2);



    	//DB::enableQueryLog();


    	/*
    	$evs = DB::table("evs")
    		->orderBy("name","desc")
    		->orderBy("id","asc")
    		->get();
    		*/


    	//$evs = DB::table("evs")->count();
    		//return max id from table all record//
    	//$evs = DB::table("evs")->max("id");
    	//$evs = DB::table("evs")->avg("id");

    	//for data existnce check 

    	//$evs = DB::table("evs")->where("id","1")->exists();

    	//$evs = DB::table("evs")->select("name");

    	//$evs = $evs->addSelect("email")->get();



    	$evs =DB::table("evs")->insert(
    		["name"=>"Alla Dita","email" => "Bota@gmail.com"],
    		["name"=>"Nawz Dita","email" => "Bota@gmail.com"]
    );

    //	print_r(DB::getQueryLog());
    	/*
    	foreach ($evs as $key => $value) {
    		
    		echo "<br/>";
    		echo $key;
    		echo "<br/>";
    		echo gettype($value);
    		echo "<br/>";
    		echo $value->name;
    		echo "<br/>";
    		print_r($value);
    	}
    	*/
    	var_dump($evs);
    }
}
