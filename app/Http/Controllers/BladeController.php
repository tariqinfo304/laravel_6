<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class BladeController extends Controller
{
    function simple()
    {

    	if (View::exists('simple')) {

    		return view("simple",["title" => "Blade Simple View","data" => "First view data"]);
    	}
    	else
    	{
    		echo "View not exist";
    	}
    }


    function part_1()
    {
    	return view("child_view",["title"=>"Child View"]);
    }




    function lec_1()
    {

    	$json = json_encode(["address" => "lahore","name" => "EVS","id" => 21]);

    	$title= "Simple Blade View";

    	//add this for use Illuminate\Support\Facades\View;
    	if (View::exists('blade_lect_1_child')) {

    		//When passing information in this manner, the data should be an array with key / value pairs. Inside your view
    		return view("blade_lect_1_child",[
    			'title' => $title
    			,'ex_data' => 'tariq &amp; ali 5 < 4' ,
    			'un_ex_data' => 'tariq &amp; ali 5 < 4' ,
    			"json" => $json,
    			"users" => ["tariq","evs","admin","lahore"]
    		]);
		}
		else
		{
			echo "View Not Exist";
		}

		//Aliasing Components
    	
    }

}
