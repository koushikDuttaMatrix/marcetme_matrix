<?php 
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Models\Cms;
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
	public function __construct(Guard $auth, Registrar $registrar)
	{
		//$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
	public function getLogin(Request $request){
    
		
		/*if(Auth::check()){ return;}*/// already logged in

			if(trim($request->input('email'))!='' && trim($request->input('password'))!=''){
				
			 $email  = $request->input('email');
			 $password = $request->input('password');
			 $remember = $request->input('remember');
		
			if (Auth::attempt(array('email' => $email, 'password' => $password, 'login_type' => 0),$remember))
				{
					return redirect('/');					
				}
				else{				
					return redirect()->back()->with('alert-success', 'Invalid email or password.');
				}
			}
			
		$homecontent = Cms::where('is_active', 1)
               ->where('id', 5) ->get(); 
		$data['homecontent'] = $homecontent[0]->description;
		return view('login/login',$data);
	}
	public function registration(Request $request){
	
	
	  dd('koushik');
		if ($request->isMethod('post')) {
		// for registering 
		
		
		$validator = Validator::make($request->all(), [
		'name' => 'required',
		'email' => 'required|unique:cms|max:255',
		'password' => 'required',
		]);
		
		if ($validator->fails()) {
		
			//echo "<pre>";
			//print_r($validator);die;
			return redirect('admin/cms/add')
                        ->withErrors($validator)
                        ->withInput();
		}
		else{
				$cms = new Cms;
				$cms->title = $request->title;
				$cms->description = $request->description;			
				$cms->save();
			}	
			return redirect('admin/cms');
		
		
		
		
		
		
		
		}
	else{
			echo "Hi";die;
		}
	
	}
	
	
	
	
	public function getRegister()
	{
	
	return view('auth/register');
	}
	
	
	
	

	
	
	

}
