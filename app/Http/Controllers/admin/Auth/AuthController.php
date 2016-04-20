<?php namespace App\Http\Controllers\admin\Auth;

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


class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Registrar $registrar)
	{
		//$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
	
	public function login(Request $request){
	 
		if(Auth::check()){ return;}// already logged in

			
		
			if(trim($request->input('email'))!='' && trim($request->input('password'))!=''){

			 $email  = $request->input('email');
			 $password = $request->input('password');
			 $remember = $request->input('remember');
	
			
			if (Auth::attempt(array('email' => $email, 'password' => $password, 'login_type' => 1),$remember))
				{
					return redirect('admin/home');					
				}
				else{				
					return redirect()->back()->with('alert-success', 'Invalid email or password.');
				}
			}

	        return view('admin/login/login');
	}
	
	public function getLogout() {
		Auth::logout();
		return redirect('admin/home');
	}
	
	
}
