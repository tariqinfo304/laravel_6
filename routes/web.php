<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get("/",function(){

	return view("welcome");
});
*/

//////////////////////////////
//simple route 

Route::get("/file",function(){
		
//we can access only that file which is in public folder in stoarge/app folder
	echo asset("storage/LESCO_Eng.jpg");
});


Route::get("/sultan/{id}",function($id){

	echo $id;

});

////////////////////////////////
//param routes//

Route::get("/param/{id}/{name}",function($id_old,$name){

	echo "id : " .$id_old."<br/>";
	echo "Name :  " . $name;
});


//////////////////////////////
//optional

Route::get("/optional/{name?}",function($option="Default"){

	echo $option;
});

//////////////////////////////
//Regular Expression Constraints

route::get("/validation/{id}/{name}",function($id,$name){

	echo $id . " name : " . $name;
})
->where('id','[1-9]'); //accpet only one length digit
//->where('id','[1-9]+'); //accept multiple digits

//->where(['id' => '[1-5]+']);
//->where(['id' => '123|222|333','name' => "[a-zA-Z-0-9-' '-'!']+"]);
//->where(["id" => "[1-5]{4}","name" => "[a-z]+"]);
//25202-0340608-9
//->where(["id" => "[0-9]{5}-[0-9]{7}-[0-9]{1}"]);

/////////////////////////////////
//Global Constraints
/*

If you would like a route parameter to always be constrained by a given regular expression, you may use the pattern method. You should define these patterns in the boot method of your  RouteServiceProvider:

 //Route::pattern('id', '[0-9]+');
*/

/*
 Route::get("/get_num/{id}",function($id){
 	echo "$id";
 });
*/


/////////////////////////////////////////
 //Encoded Forward Slashes
Route::get('search/{search}', function ($search) {
    echo "Search Route " .$search;
})->where('search', '.*');



///////////////////////////////////////
//Redirect Routes

Route::redirect("/redirect","search/23",302);



/*
//it will call on very method type of http
//OR Route::any();
Route::match(['get','put','post','delete'],"/method",function(){

	echo "Method allow GET,PUT,POST,DELETE";
});



//CSRF Protection//
Route::get("/form",function(){
	return view('test',["name" => "CSRF Token Form"]);
});	


*/



Route::get("/sultan",function(){

	echo "Nick name is Dakoo Route";


})->name("Dakoo");



Route::get("/call_dakoo",function(){
	return redirect()->route("Dakoo");
});

/////////////////////////////////////////////
//Named Routes
Route::get("/user/info",function(){

	echo "It's a name route ";
})->name("info");





Route::get('user/{id}/profile', function ($id) {
    echo "It's a name route with parameter id  : " . $id ;
})->name('profile');

Route::get("check_name_route/{id}",function($id){

	//echo route("info"); 
//	return redirect()->route("info");
	return redirect()->route("profile",["id"=>$id]);
});



/////////////////////////////////
//Route Groups
////////////////////////////////


Route::group(["prefix" => "user/{id}","as" => "UserInfo/"],function($id){

	Route::get("delete",["as" => "Remove",function($id){
		echo "route-group  => user/delete : " .$id;
	}]);

	Route::get("update",["as" => "Edit" ,function($id){

		echo "route-group => user/info : " . $id;
	}]);
});




Route::get("redirect_group/{id}",function($id){

	return redirect()->route("UserInfo/Remove",["id"=>$id]);
});



/////////////////////////
//Route Prefixes




Route::prefix("admin/{id}")->group(function($id){

	Route::get("user",function($id){
		echo "Rout ePrefix . " . $id;
	});//->where(["id" => "[1-5]+"]);
});


/*
Route::fallback(function () {
    echo "NULL Return";
});

*/





///////////////////////////////////////////////////////////
// controller Class Routes//
/////////////////////////////////////////////////////////////

//Simple controller//
Route::get("/get_form",'EVSController@get_form');




Route::get("/form_param/{id}/{name?}",'EVSController@form_parm_method')
			->where(["id" => "[1-9]+"]);



////////////////
// Add controller in folder
///////////////
Route::get("/user",'Admin\UserController@get_user');






//Magic __invoke method call //
Route::get("magic","SingleController");
Route::get("test_magic","SingleController");



//Resource Controllers
//Laravel resource routing assigns the typical "CRUD" routes to a controller with a single line of code.


// register a resourceful route to the controller:

//Route::resource("crud","CRUDController");

//OR

//Partial Resource Routes
//Route::resource("crud","CRUDController")->only(['index','destroy']);
//Route::resource("crud","CRUDController")->except(['destroy']);

//Naming Resource Routes
//Route::resource("crud","CRUDController")->names(['create' => "crud.build"]);


//////////////////////////////////////////
//Supplementing Resource Controllers


//it's order will matter 

Route::get("crud/get_list","CRUDController@get_list");
Route::resource("crud","CRUDController");



/////////////////////////////////////////////
//Localizing Resource URIs

//go to RouteServiceProvider


//Route::resource("crud","CRUDController");


/////////////////////////////////////////////
//Dependency Injection & Controllers

Route::get("user_list","EVSController@get_list");





////////////////////////////////
////////// view ///////////////
//////////////////////////////

Route::get("/simple_blade","BladeController@simple");
Route::get("/part_1","BladeController@part_1");
Route::get("/blade_lect_1","BladeController@lec_1");



/////////////////////////////////////
//////////////// Database //////////
///////////////////////////////////



Route::get("db","DBController@db");

Route::get("db_el","DbElController@db");

Route::get('one_to_one',"DbElController@one_to_one");

Route::get('one_to_many',"DbElController@one_to_many");

Route::get('many_to_many',"DbElController@many_to_many");


Route::get('db_relation',"DbElController@db_relation");


//////////////////////////////////
//////////// Food Website in Laravel
////////////////////////////////////

//Route::get("/","FoodController@index");
Route::get('/register_user/{id?}','FoodController@register_view');
Route::post('/register_save','FoodController@save_data');
Route::get("/user_list","FoodController@user_list");

Route::get("/delete/{id}","FoodController@delete");


//////////////////////////////////////
///////////////// Middleware ////////
/////////////////////////////////////
/*
use App\Http\Middleware\TestMiddleware;

Route::get("/","FoodController@index")->middleware(TestMiddleware::class);
*/

Route::get("/","FoodController@index");//->middleware("Test");


Route::get("/add_product","FoodController@add_product_form");
Route::post("/add_product","FoodController@add_product");
Route::get("/add_cart/{id}","FoodController@add_cart");
Route::get("/cart_list","FoodController@cart_list");
Route::get("/delete_cart/{id}","FoodController@delete_cart");
Route::get("/product_list","FoodController@product_list");
///////////////////////
//////////// Session /
///////////////////////


Route::get("/login","SessionController@login");
Route::post("/do_login","SessionController@do_login");
Route::get("/logout","SessionController@logout");


Route::get("api","HomeController@api");

//auth //
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
