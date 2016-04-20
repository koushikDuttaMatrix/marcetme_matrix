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
use DB;   //from user manual
use Socialite;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToFacebook()
    {

        return Socialite::driver('facebook')->redirect('user-dashboard');
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        //die("here");
       // $user = Socialite::driver('facebook')->user();

        try{
              $user = Socialite::driver('facebook')->user();
        }
           catch (Exception $e) {
            return redirect('auth-login');
        }


       //print_r($user);
       /// echo $user->email;die();die();
        $checkUser=User::
        where('email',$user->email)
        ->where('login_type',0)
        ->get(['id'])->toarray();
        
        if(!empty($checkUser)) 
        {
            //update
         $userId=$checkUser[0]['id'];   
         //print_r($checkUser);die();
         DB::table('users')->where('id', $userId)
            ->update(['name' => $user->name,'email'=>$user->email,'fb_id'=>$user->id,'fb_image'=>$user->avatar]);
                $authUser = User::findOrFail($checkUser[0]['id']);

              Auth::login($authUser, true);
             return Redirect('user-dashboard');
        } 
        else
        {
      // insert
            $userDb = new User;
            $userDb->name = $user->name;
                $userDb->email = $user->email;
                $userDb->fb_id = $user->id;
                $userDb->fb_image = $user->avatar;
                $userDb->save();
                $authUser = User::findOrFail($userDb['id']);
                Auth::login($authUser, true);
                return Redirect('user-dashboard');
     
        // $user->token;
    }
}

public function redirectToGoogle()
    {

        return Socialite::driver('google')->redirect('user-dashboard');
    }

public function handleProviderCallbackGoogle()
    {
        //die("here");
        try{
            $user = Socialite::driver('google')->user();
        }
        catch(Exception $e)
        {
            return redirect('auth-login');
        }
        
       // print_r($user);die();
       //print_r($user);
       /// echo $user->email;die();die();
        $checkUser=User::
        where('email',$user->email)
        ->where('login_type',0)
        ->get(['id'])->toarray();
        
        if(!empty($checkUser)) 
        {
            //update
         $userId=$checkUser[0]['id'];   
         //print_r($checkUser);die();
         DB::table('users')
            ->where('id', $userId)
            ->update(['name' => $user->name,'email'=>$user->email,'google_id'=>$user->id,'google_image'=>$user->avatar]);
                $authUser = User::findOrFail($checkUser[0]['id']);

              Auth::login($authUser, true);
             return Redirect('user-dashboard');
        } 
        else
        {
      // insert
            $userDb = new User;
            $userDb->name = $user->name;
                $userDb->email = $user->email;
                $userDb->google_id = $user->id;
                $userDb->google_image = $user->avatar;
                $userDb->save();
                $authUser = User::findOrFail($userDb['id']);
                Auth::login($authUser, true);
                return Redirect('user-dashboard');
     
        // $user->token;
    }
}

}