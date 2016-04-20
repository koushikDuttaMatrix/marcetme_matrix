<?php namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class UserController extends Controller {

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
	public function index()
	{
			
		$users = User::where('login_type','<>', 1)		
			 ->where('login_type','<>', 1)	
             ->orderBy('id', 'desc')
              ->paginate(10);    
			  
		echo "<pre>";
		print_r($users);die;
		
		$data['users']= $users;
		return view('admin/user/list',$data);		
		
	}

	
	/**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile($id,Guard $auth)
    {
	  // $userdetails = Session::get('userDetails');
	   //echo "<pre>";
	  // print_r($userdetails);
	   //echo Session::get('userDetails')[0]->name;die;
		$data = array();
		return view('admin/profile',$data);
       // return view('user.profile', ['user' => User::findOrFail($id)]);
    }
	
	 public function userslist($id,Guard $auth)
    {
	   $userdetails = Session::get('userDetails');
	   //echo "<pre>";
	  // print_r($userdetails);
	   //echo Session::get('userDetails')[0]->name;die;
		$data = array();
		return view('admin/profile',$data);
       // return view('user.profile', ['user' => User::findOrFail($id)]);
    }
	
	
}
