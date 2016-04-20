<?php namespace App\Http\Controllers\admin;

use Illuminate\Contracts\Auth\Guard;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('adminauth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(Guard $auth)
	{
	//echo "hello";die;
		$email = $auth->user()->email;
		$id = $auth->id();
		//$name = $auth->name();
		//$user = auth()->user();
		//echo $user->id;
		//echo "</br>";
		//echo $user->name;
		//echo "</br>";
		//echo $user->email;
		//echo "<pre>";
		//print_r($user);die;
		$data=array('name' => $email, 'id' => $id,'email' => $email);
		return view('admin/home',$data);
	}

}
