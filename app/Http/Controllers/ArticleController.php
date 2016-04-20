<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use App\Models\Article;
use App\Models\Cms;
use App\Models\Blog;
use App\Models\UserComment;


class ArticleController extends Controller {

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

	/*
	********** This function use for getting Article list*************
	*/
	public function index()
	{
                ///////////////////////////////////
				$latestArticles = Article::where('is_active', 1)
               ->orderBy('id', 'desc') ->get(); 

 			foreach ($latestArticles as $latestArticle) {
               	# code...
               	//echo date('Y-m-d H:i:s');
              $estimateDate=(strtotime(date('Y-m-d H:i:s')))-intval(strtotime($latestArticle->created_at));
                  $stringB=$this->getTimeDiffInWords($estimateDate);
                   $latestArticle->estimateDateBlog=$stringB;
                   $latestArticle->embed_link=$this->youtubeImagMaker($latestArticle->embed_link,$latestArticle->video_type);
               }
               ///////////////////////////////////

 				$data['articles']=$latestArticles;
               




		return view('article_list',$data);
	}

     // youtube video thumb genarator
	public function youtubeImagMaker($imgPath,$videoType)
	   {
	   //	print_r($videoType);die();
	   	if($imgPath!="" && $videoType=="youtube")
	   	{
	   		$arr=explode('http://www.youtube.com/embed/', $imgPath);
	   	  $uniqueArr=explode('?autoplay=1', $arr[1]);
	   	  $imageLink='http://img.youtube.com/vi/'.$uniqueArr[0].'/0.jpg';
	   	  return $imageLink;
	   	}
	   	elseif($imgPath!="" && $videoType=="vimeo")
	   	{
	   		$videoId=$this->getVimeoVideoCode($imgPath);
	   		$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/".$videoId.".php"));
            $hash[0]['thumbnail_medium'];
            return $hash[0]['thumbnail_medium'];


	   	}
	   	  
	   }
	   //video unique video code genarator
	   public function getVimeoVideoCode($videoUrl)
	   {
	      //https://vimeo.com/7256322
	   	$arr=explode('https://vimeo.com/', $videoUrl);
	   	$videoUrl=$arr[1];
	   	return $videoUrl;
	   	
	   }
	/*
	********** This function use for getting Article detail by id*************
	*/
	public function details($id){

 	$data = array();
	





	
		$article = Article::where('is_active', 1)
               ->where('id', $id) ->get();
		# this section for unique vimeo video link generate
               if($article[0]->video_type=="vimeo")
				$article[0]->vimeoVideoLink=$this->getVimeoVideoCode($article[0]->embed_link);
			  else
				$article[0]->vimeoVideoLink='';
	
		
		//echo "<pre>";
		//print_r($article_list);die;

		
		
		//echo "<pre>";
		//print_r($homecontent);die;

		$data['article'] = $article[0];
		$commentView=UserComment::
		leftJoin('users','users.id','=','user_comments.user_id')->
		where('user_comments.is_active',1)->
		where('article_id',$id)->
		orderBy('user_comments.id','desc')->get()->toarray();
		$data['userComments']=$commentView;

		return view('article_details',$data);
	}
	/*
	********** This function use for getting difference between insert date and current date*************
	*/
	public function getTimeDiffInWords($currentTime) {
        $negative = ($currentTime < 0)?true:false;
        $currentTime = abs($currentTime);
        $months=(int)($currentTime / (3600*720));
       //echo $months;die();
        $days = (int)($currentTime / (3600*24));
        $hours_left = $currentTime % (3600*24);
        $hours = (int)($hours_left / 3600);
        $minutes_left = $currentTime % 3600;
        $minutes = (int)($minutes_left / 60);
        $seconds_left = $minutes_left % 60;
		
		$string =($months>0)?$months.' Month ':($days>0?$days.' Days ':($hours>0?$hours.' Hours ':''));
		
        /*$string = ( ($months > 0)?$months." month".($months == 1?'':'s')." ":
        	($days > 0)?$days." day".($days == 1?'':'s')." ": 
                    ($hours > 0?$hours." hr".($hours == 1?'':'s')." " :
                        ($minutes> 0?$minutes." min".($minutes == 1?'':'s')."": 
                            $seconds_left." second".($seconds_left == 1?'':'s')." ")));*/
        $string = ($negative?"-":"").$string;
        return $string;
    }

}
