<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Cms;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\UserComment;


class UserCommentController extends Controller {

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
		$data = array();

		return view('blog_list',$data);
	}
   
    public function create(Request $request)
    {
      if(Auth::check())
      {
      	$userComment = new UserComment;
      $userComment->user_id=Auth::user()->id;
      $userComment->blog_id=$request->get('blog_id');
      $userComment->comment=$request->get('comment');
      $blogId=$request->get('blog_id');
      $name=Auth::user()->name;
      $comment=$request->get('comment');
      if(isset(Auth::user()->profile_picture))
      {
      	if(Auth::user()->profile_picture!="")
	      {
	      	$profileUrl=url('timthumb/timthumb.php').'?src=/user_images/'.Auth::user()->profile_picture.'&w=48&h=48&q=48';
	      }
	      else
	      	$profileUrl=url('images/no_user.png');
	  }
      else
          $profileUrl=url('images/no_user.png');
      //<div class="like-area"><a data-comment_id="18" class="reply_comment" href="javascript:void(0)"><i class="fa fa-comment"></i> Reply</a></div>
      $commentHtml='<li><div class="smallimg"><img alt="" src='.$profileUrl.'></div><div class=\"txts-area\"><div class="comm_name">'.$name.'</div>div class="comment">'.$comment.'</div></div></li>';
      	  $userComment->save();
         return $commentHtml;
      }	
    }

    public function createArticle(Request $request)
    {
    	//echo $request->get('article_id');die();
      if(Auth::check())
      {
      	$userComment = new UserComment;
      $userComment->user_id=Auth::user()->id;
      $userComment->article_id=$request->get('article_id');
      $userComment->comment=$request->get('comment');
      $articleId=$request->get('article_id');
      $name=Auth::user()->name;
      $comment=$request->get('comment');
      if(isset(Auth::user()->profile_picture))
      {
      	if(Auth::user()->profile_picture!="")
	      {
	      	$profileUrl=url('timthumb/timthumb.php').'?src=/user_images/'.Auth::user()->profile_picture.'&w=48&h=48&q=48';
	      }
	      else
	      	$profileUrl=url('images/no_user.png');
	  }
      else
          $profileUrl=url('images/no_user.png');
      
        //$replyHtml='<div class="like-area"><a data-comment_id="18" class="reply_comment" href="javascript:void(0)"><i class="fa fa-comment"></i> Reply</a></div>';
      $commentHtml='<li><div class="smallimg"><img alt="" src='.$profileUrl.'></div><div class=\"txts-area\"><div class="comm_name">'.$name.'</div>div class="comment">'.$comment.'</div></div></li>';
      	  $userComment->save();
         return $commentHtml;
      }	
    }


}
