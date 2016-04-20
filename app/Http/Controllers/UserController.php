<?php 
namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Hash;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Session;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Article;
use App\Models\Cms;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Input;
use Carbon\Carbon;
use Mail;
use DB;
use Captcha;


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
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}
	
	

	
	 public function authenticate($email,$password)
    {
	//echo "koushik";die();
	     
	    
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
		  dd('success');
		
            // Authentication passed...
           // return redirect()->intended('dashboard');
        }
    }
	public function logout(Request $request)
	{
 
	    Auth::logout();
	}
	
	public function registration(Request $request)
	{
	
		if ($request->isMethod('post')) {
	
	
		
		$validator = Validator::make($request->all(), [
		
		]);
		
		if ($validator->fails()) {
		//dd('here');
		
			//echo "<pre>";
			//print_r($validator);die;
			//return redirect('admin/cms/add')
                      //  ->withErrors($validator)
                      //  ->withInput();
		}
		else{
		//dd('here2');
		if($request->get('password') != $request->get('password_confirmation'))
		{
		return view('auth/register');
		}
		
				$user = new User;
				$user->name = $request->name;
				$user->password = Hash::make($request->password);	
				$user->email = $request->email;		
				
				$user->save();
			}	
			return redirect('auth-login')->with('alert-success', 'Register Successfully');
		
		
		
		
		
		
		
		}
	else{
			return view('auth/register');
		}
	
	}
	public function getLogin()
	{
	return view('auth/login');
	}
	
	
	public function getLoginUser(Request $request){
       
		//print_r(Auth::user());die();
		/*if(Auth::check()){ return;}*/// already logged in
			if(trim($request->input('email'))!='' && trim($request->input('password'))!=''){
				
			 $email  = $request->input('email');
			 $password = $request->input('password');
			 $remember = $request->input('remember');
		
			if (Auth::attempt(array('email' => $email, 'password' => $password, 'login_type' => 0),$remember))
				{
			      // dd(Auth::user()->id);
			
					return redirect('user-dashboard');					
				}
				else{	
			
					return redirect('auth-login')->with('alert-success', 'Invalid email or password.');
				}
			}
			
		$homecontent = Cms::where('is_active', 1)
               ->where('id', 5) ->get(); 
		$data['homecontent'] = $homecontent[0]->description;
		return view('login/login',$data);
	}
	
	public function getLogout(Request $request) {


    
    
		Auth::logout();
		//die("ggggg");
		return redirect('auth-login');
			
		
	}
	
	public function register(Request $request)
	{
    
      //new code added 
		
$countryValue=Country::where('order_flag',1)->
get(['countryID','countryName'])->
toarray();
		
		$data['countryValue']=$countryValue;
	//return view('home');
		if ($request->isMethod('post')) {


         $data = array();
       /* $data['name']=$request['name'];
        $subject="Registrstion Email";
      // this section code implement for email sending to user
		Mail::send('emails.registerEmail', $data, function($message) use ($subject)
       {

       $message->from('admin@marcetme.com', 'Admin');
	
       $message->to('kaushikdutta@matrixnmedia.com')->subject($subject); 

     }
     );
		print_r('success');*/	
		$validator = Validator::make($request->all(), [
		'email' => 'required|unique:users|max:255',
		'username' => 'required|unique:users|max:255',
		'name' => 'required',
		'country' => 'required',
		 'state' => 'required',
		 'city' => 'required',
		 'zip' => 'required',
		'phone_number' => 'required',
		 'password' => 'required|min:3|confirmed',
        'password_confirmation' => 'required|min:3',
		'terms'=>'required',
		'captcha' => 'required|captcha'

		
		]);
		
		if ($validator->fails()) {
            	//echo $out;die();
			return redirect('user-register')
                        ->withErrors($validator)
                        ->withInput();

		}
		else{
				$user = new User;
				//this section for save latitude and longitude from zip code
                 $addressForLatLong=trim($request->zip);
				
				$latitude = '';
			$longitude = '';
			// We get the JSON results from this request
			$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($addressForLatLong).'&sensor=false');
			// We convert the JSON to an array
			$geo = json_decode($geo, true);
			// If everything is ok
			if ($geo['status'] = 'OK') {
				if(count($geo['results']) > 0)
				{
					// We set our values
					$latitude = $geo['results'][0]['geometry']['location']['lat'];
					$longitude = $geo['results'][0]['geometry']['location']['lng'];
				}
			}
			
             //this section for save latitude and longitude from zip code

				$user->name = $request->name;
				$user->email = $request->email;
				$user->username = $request->username;
				$user->phone_number = $request->phone_number;
				$user->password = Hash::make($request->password);
				$user->country=$request->country;
				$user->state=$request->state;
				$user->city=$request->city;
				$user->latitude=$latitude;
				$user->longitude=$longitude;
				$user->zip=$request->zip;
				$user->save();
				return redirect('auth-login')->with('alert-success-message', 'Register Successfully done.');
			}
		
		
		}
		
	 return view('register',$data);
	}
   public function boxes()
   {

	$data['username'] =Auth::user()->name;


   	return view('userDashboard',$data);
   }

	public function editUser(Request $request)
	{
		$data = array();
		 $id=Auth::user()->id;
         $user = User::findOrFail($id);
         $countryId=$user['country'];
         $stateId=$user['state'];
         $cityId=$user['city'];
         $data['name']=$user['name'];
         $data['country']=$user['country'];
         $data['state']=$user['state'];
         $data['city']=$user['city'];
         $data['zip']=$user['zip'];
         $data['phone_number']=$user['phone_number'];
         $data['profile_picture']=$user['profile_picture'];
         
         //print_r($user);die();
        //echo $id;die();
		
$countryValue=Country::where('order_flag',1)->get(['countryID','countryName'])->toarray();
$stateValue=State::where('countryID',$countryId)->get(['stateID','stateName'])->toarray();
$cityValue=City::where('stateID',$stateId)->get(['cityID','cityName'])->toarray();
		
		$data['countryValue']=$countryValue;
		$data['stateValue']=$stateValue;
		$data['cityValue']=$cityValue;
	    // print_r($stateValue);die();


    
	//return view('home');
		if ($request->isMethod('post')) {

			
		$validator = Validator::make($request->all(), [
		'name' => 'required',
		'country' => 'required',
		 'state' => 'required',
		 'city' => 'required',
		 'zip' => 'required',
		'phone_number' => 'required'

		
		]);
		
		if ($validator->fails()) {
		
			//echo "<pre>";
			//print_r($validator);die;
			return redirect('edit-user')
                        ->withErrors($validator)
                        ->withInput();
		}
		else{
				$user = new User;
				//this section for user image upload
			if($request->hasFile('profile_picture')) {

			//	$myStr = str_random(60);
            $file = Input::file('profile_picture');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $uploadProfilePicture = $timestamp. '-' .$file->getClientOriginalName();
            $file->move(public_path().'/user_images/', $uploadProfilePicture);

	         //$request['profile_picture']=$uploadProfilePicture;
	         DB::table('users')->where('id',$id)->update(['profile_picture'=>$uploadProfilePicture]);
             }
             else
             {
             	//die("here");
             	DB::table('users')->where('id',$id)->update(['profile_picture'=>$data['profile_picture']]);
             	
             }
             //this section for user image upload
              // echo $request['profile_picture'];die();
				//this section for save latitude and longitude from zip code
                 $addressForLatLong=trim($request->zip);
				
				$latitude = '';
			$longitude = '';
			// We get the JSON results from this request
			$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($addressForLatLong).'&sensor=false');
			// We convert the JSON to an array
			$geo = json_decode($geo, true);
			// If everything is ok
			if ($geo['status'] = 'OK') {
				if(count($geo['results']) > 0)
				{
					// We set our values
					$latitude = $geo['results'][0]['geometry']['location']['lat'];
					$longitude = $geo['results'][0]['geometry']['location']['lng'];
				}
			}
			
             //this section for save latitude and longitude from zip code
                 $request['latitude']=$latitude;
                 $request['longitude']=$longitude;
                 $request['id']=Auth::user()->id;
                 
               // / print_r($request['profile_picture']);die();
				 $input = $request->all();
                 $input = $request->except('_token','terms','id');
                 //print_r($input);die();
                // $input = $request->except('terms');
    			$user=User::findOrFail($id)->update($input);

    			//Session::flash('flash_message', 'Task successfully added!');
				   Session::flash('alert-success-message', 'Successfully Edited.');

                    return redirect()->back();
			}
		}
		
	 return view('editUser',$data);
	}

	public function createCaptcha()
	{
		$url=Captcha::src();
	   // $url='<img src='.$captchaSrc.' alt="captcha"><a href="javascript:void(0);" id="reloadCaptcha">Can\'t read? Reload</a>';
		return $url;

	}


}
