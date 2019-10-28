<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserModel;
use App\Http\Requests\RegisterUser;
use App\Rules\Uppercase;
use DB;

class FoodController extends Controller
{



    function delete_cart($c_id)
    {
        DB::table("cart")->where("c_id",$c_id)->delete();

        return redirect("cart_list");
    }
    function cart_list()
    {
        $cart_list = DB::table("cart")
        ->join("user","user.id","=","cart.user_id")
        ->join("product","product.p_id","=","cart.p_id")
        ->select("user.name as user_name","product.name as p_name","cart.c_id","product.price"
            ,"cart.quantity")
        ->get();

        return view("Food.cart_list",["data" => $cart_list]);
    }

    function add_cart($p_id)
    {
        $user_id = session("id");

        DB::table("cart")->insert([
            "user_id" => $user_id,
            "p_id" => $p_id
        ]);

        //call sms API here

        return redirect("cart_list");

    }

    function add_product_form()
    {
        return view("Food.add_product");
    }
    function add_product(Request $req)
    {
        DB::table("product")->insert(
            ["name"=>$req->name,"price" => $req->price]);
        return redirect("/product_list");
    }


    function product_list()
    {
        $list = DB::table("product")->get();
        return view("Food.list",["data" => $list]);
    }


    function index()
    {

//echo "controller call here";
        
    	return view('Food/index',["phone_no" =>"0303-4672394"
            ,"email" => "evs@gmail.com","address" => "Lahore ALi Sher"]);
            
    }

    function register_view($id=0)
    {
        $user = new UserModel();
        if(!empty($id))
        {
            $user = $user->find("$id");
        }
    	return view('Food/register',["user_data" => $user]);
    }

    function delete($id)
    {
        $user = new UserModel();
        $user = $user->find("$id");
        $user->delete();
        return redirect("user_list");
        //echo "$id is Deleted!";
    }
    function user_list(Request $req)
    {
        //print_r($req->session()->all());
        $user = new UserModel();
        //$user_list = $user->all();

        //{ (n -1) * total_record } , total_record
        
        $user_list = $user->paginate(1);


       // $user_list = $user->simplePaginate(2);
       // dd($user_list);
        return view("Food/user_list",['data' => $user_list]);
    }


    function save_data(Request $request)
    {
         // echo "<pre>";
        //dd($request);
      /*echo $request->path() ."<br/>";
      echo  $request->url()."<br/>";;
        echo $request->fullUrl()."<br/>";
        */

        //print_r( $request->input());

         // echo $request->method();
        //echo $request->isMethod('post');
        //use when variavble is not sedn from user-form
      //  echo $name = $request->input('name1',"evs");

       // print_r($request->only(['name', 'password']));


        /*
        $input = $request->only('username', 'password');

        $input = $request->except(['email']);

        $input = $request->except('email');

        if ($request->has('name1')) {
                die("ok");
        }
        else
        {
            die("not exist");
        }
        */


         ///file handling //
        
        /*if ($request->hasFile('file_attach')) {
            
            if ($request->file('file_attach')->isValid()) {
*/

                    /*
                $file = $request->file('file_attach');
                

               // dd(  $file);
                echo $request->file_attach->path();
                echo "<br/>";
                var_dump($request->file_attach->extension()). "<br/>";

                die("ok");
                
                //$path = $request->file_attach->store("images");
               // echo $request->file_attach->path();;

               */
              //  $ext =  $request->file_attach->extension();
               // $name = "file_".rand().".".$ext;
                /*
                if($ext)
                    $name = "file_".rand().".".$ext;
                else
                    $name = "file_".rand();
                    */
/*
                $path = $request->file_attach->storeAs("images",$name );
                die( $path);
            }   
        }
        else
        {
            die("no");
        }
*/

       $request->validate([
            'name' => 'required|max:255',
            'username' => 'required',
            'password' => 'required'
        ]);


        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $username = $request->input('username');


        $user = new UserModel();
        $user->name = $name;
        $user->email = $email;
        $user->password = encrypt($password);
        $user->username = $username;

        $user->save();

        return redirect('user_list');

    }


    function register_save(Request $request)//RegisterUser
    {
       // echo "<pre>";
    	//dd($request);
    //	echo $request->path() ."<br/>";
    //	echo  $request->url()."<br/>";;
    	//echo $request->fullUrl()."<br/>";
    	
       // print_r( $request->all());
    	//$input = $request->input();
    	
       // echo $request->method();
    	//echo $request->isMethod('post');
    	//echo $name = $request->query('name');
    	//$name = $request->query('name', 'Helen');
    	//echo $request->input('name1', 'xyz');
    	//echo $name = $request->name;

       

    	
			//print_r($request->only(['name', 'password']));
/*
$input = $request->only('username', 'password');

$input = $request->except(['email']);

$input = $request->except('email');

if ($request->has('name1')) {
    die("ok");
}
if ($request->has('name')) {
    //
}
if ($request->has(['name', 'email'])) {
    //
}

    	*/

//nullable 
	   
       
       /*
    	$validatedData = $request->validate([
            'name' => 'required|max:255',
            'height' => 'required',
            'date' => 'required'
        ]);
    */



        //Check Request Folder class 


        /*
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        */

        /*
        
        Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ])->validate();

        */

        /*
        //rule//
        $validatedData = $request->validate([
            'name' => ['required', 'string', new Uppercase],
            'height' => 'required',
            'date' => 'date'
        ]);*/



    	$name = $request->input('name');
    	$email = $request->input('email');
    	$password = $request->input('password');
    	$con_password = $request->input('con_password');
    	$date = $request->input('date');
    	$phone_no = $request->input('phone_no');
    	$height = $request->input('height');
    	$weight = $request->input('weight');
    	$gender = $request->input('gender');
    		

    	//it will save user-data into user table by using ORM 

    	$user = new UserModel();
    	$user->name= $name;
    	$user->email = $email;
    	$user->dob = $date;
    	$user->phone_no = $phone_no;
    	$user->height = $height;
    	$user->weight = $weight;
    	$user->gender = $gender;

    	$user->save();
        return redirect('user_list');

        //die();

        ///file handling //
        
        if ($request->hasFile('file_attach')) {
            
            if ($request->file('file_attach')->isValid()) {


                /*
                $file = $request->file('file_attach');
                
                echo $request->file_attach->path();
                echo "<br/>";
                var_dump($request->file_attach->extension()). "<br/>";

                die("ok");
                */
                //$path = $request->file_attach->store("images");
               // echo $request->file_attach->path();;
                $ext =  $request->file_attach->extension();
                $name = "file_".rand().".".$ext;
                /*
                if($ext)
                    $name = "file_".rand().".".$ext;
                else
                    $name = "file_".rand();
                    */

                $path = $request->file_attach->storeAs("images",$name );
                die( $path);
            }   
        }
        else
        {
            die("no");
        }

    	return redirect('user_list');
    }
   
}
