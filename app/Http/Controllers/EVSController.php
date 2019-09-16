<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class EVSController extends Controller
{


    function get_list(Book $b)
    {
        echo $b->show();
    }
    function get_form()
    {

    	echo "get_form action method";
    }


    function form_parm_method($id,$name=NULL)
    {
    	echo $id;
    	echo "<br/>";
    	echo $name;
    }
}
