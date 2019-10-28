<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class SessionController extends Controller
{

/*
	public function __construct()
    {
        $this->middleware('Test');
    }
    */
    function login()
    {	

    	return view("session/login");

    	 /*
            
            Encrypted values are passed through serialize during encryption, which allows for encryption of objects and arrays. 
        
        //WE CAN PASS OBJECT AND ARRAY TO THI SFUNCTION 
           // encrypt(["123","@3"]);
            //decrypt

        */


        //$user = new UserModel();
       // dd($user);
            /*
        
        $encrypted =  encrypt("admin");

        echo  $encrypted ."</br>";
        
        dd(decrypt($encrypted));
    
		*/
        
        /*
        $encrypted =  encrypt($user);
        echo  $encrypted ."</br>";
        
        dd(decrypt($encrypted));
        */
        
        

        /*

        echo $encrypted =  Crypt::encryptString("admin");
        echo Crypt::decryptString($encrypted);
        
        */

        
        
        /*
        $hash_string = Hash::make("admin");
        

        echo $hash_string;
        
        echo "<br/>";

        var_dump(Hash::check('admin1', $hash_string));
        */
        
    
        

        /*

        // Get the currently authenticated user...
        $user = Auth::user();

        // Get the currently authenticated user's ID...
        $id = Auth::id();


        echo $user;

        echo "<br/>";
        echo $id;

        */
     
      
      //add in method Request $request
     // echo $request->user();


        /*
    	if (Auth::check()) {
            echo "The user is logged in...";
        }
        

        
        return view('home');
        */

    }
    function do_login(Request $request)
  	{

  		$validator = Validator::make($request->all(), [
            'username' => 'required|min:4|max:25',
            'password' => 'required|min:3',
        ]);

  		if ($validator->fails()) {
            return redirect('login')
                        ->withErrors($validator)
                        ->withInput();
        }


        $user = UserModel::where("username",$request->username)
                    ->get();

        if(!empty($user) && isset($user[0]->username) 
            && $user[0]->password == $request->password )
        {

          session(['username' => $user[0]->username,

                  "id" => $user[0]->id]);
        }
        else
        {
           return redirect('login')
                        ->withErrors($validator)
                        ->withInput();
        }

        return redirect("/");

  	}

  	function logout()
  	{
  		session()->forget("username");
  		session()->flush();
  		return redirect("login");
  	}
}
