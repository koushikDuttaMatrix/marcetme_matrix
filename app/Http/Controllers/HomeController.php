<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Article;
use App\Models\Cms;
use Auth;



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
	  if(Auth::check())
	  {
		$allcategory = Category::where('is_active', 1)
               ->orderBy('id', 'desc') ->get(); 
		
		$latestArticles = Article::where('is_active', 1)
		->leftJoin('users','users.id','=','articles.user_id')
               ->orderBy('articles.id', 'desc') ->get(['articles.id','title','description','image','profile_picture','articles.created_at','file_type','video_type','embed_link']); 
                 foreach ($latestArticles as $latestArticle) {
               	# code...
               	//echo date('Y-m-d H:i:s');
             $estimateDate=(strtotime(date('Y-m-d H:i:s')))-intval(strtotime($latestArticle->created_at));
               $stringA=$this->getTimeDiffInWords($estimateDate);
               $latestArticle->estimateDateArticle=$stringA;
                $latestArticle->embed_link=$this->youtubeImagMaker($latestArticle->embed_link,$latestArticle->video_type);
                
              // $string=helpers::getTimeDiffInWords($estimateDate);
               //echo $string;die();
             //echo $estimatetDate;die();
            //  print_r($latestArticle);die();
               //	$latestBlog['']
               }

                 


			   
		$latestBlogs = Blog::where('is_active', 1)
		->leftJoin('users','users.id','=','blogs.user_id')
               ->orderBy('blogs.id', 'desc') ->get(['blogs.id','title','description','image','profile_picture','blogs.created_at','file_type','video_type','embed_link']); 
              // print_r($latestBlogs);die();
               foreach ($latestBlogs as $latestBlog) {
               	# code...
               	//echo date('Y-m-d H:i:s');
              $estimateDate=(strtotime(date('Y-m-d H:i:s')))-intval(strtotime($latestBlog->created_at));
                $stringB=$this->getTimeDiffInWords($estimateDate);
               $latestBlog->estimateDateBlog=$stringB;
                $latestBlog->embed_link=$this->youtubeImagMaker($latestBlog->embed_link,$latestBlog->video_type);
             //echo $estimatetDate;die();
               //print_r($latestBlog);die();
               //	$latestBlog['']
               }
              // print_r($latestBlogs);die();

		$homecontent = Cms::where('is_active', 1)
               ->where('id', 5) ->get(); 

	    
		
		$data['allcategory'] = $allcategory;
		$data['latestArticles'] = $latestArticles;
		$data['latestBlogs'] = $latestBlogs;
		$data['homecontent'] = $homecontent[0]->description;
	  }
	  else
          {
          	$allcategory = Category::where('is_active', 1)
               ->orderBy('id', 'desc') ->get(); 
		
		$latestArticles = Article::where('is_active', 1)
               ->orderBy('id', 'desc') ->get(); 
              foreach ($latestArticles as $latestArticle) {
               	# code...
               	//echo date('Y-m-d H:i:s');
              $estimateDate=(strtotime(date('Y-m-d H:i:s')))-intval(strtotime($latestArticle->created_at));
               $stringA=$this->getTimeDiffInWords($estimateDate);
               $latestArticle->estimateDateArticle=$stringA;
               $latestArticle->embed_link=$this->youtubeImagMaker($latestArticle->embed_link,$latestArticle->video_type);
             // echo $string;die();
              // $latestArticle->estimateDateArticle=$estimateDate;
                 
                
              // $string=helpers::getTimeDiffInWords($estimateDate);
               //echo $string;die();
             //echo $estimatetDate;die();
            //  print_r($latestArticle);die();
               //	$latestBlog['']
               }

           



			   
		$latestBlogs = Blog::where('is_active', 1)
               ->orderBy('id', 'desc') ->get(); 

 			foreach ($latestBlogs as $latestBlog) {
               	# code...
               	//echo date('Y-m-d H:i:s');
              $estimateDate=(strtotime(date('Y-m-d H:i:s')))-intval(strtotime($latestBlog->created_at));
                  $stringB=$this->getTimeDiffInWords($estimateDate);
                   $latestBlog->estimateDateBlog=$stringB;
                   $latestBlog->embed_link=$this->youtubeImagMaker($latestBlog->embed_link,$latestBlog->video_type);
             //echo $estimatetDate;die();
               //print_r($latestBlog);die();
               //	$latestBlog['']
               }


		$homecontent = Cms::where('is_active', 1)
               ->where('id', 5) ->get(); 

	    
		
		$data['allcategory'] = $allcategory;
		$data['latestArticles'] = $latestArticles;
		$data['latestBlogs'] = $latestBlogs;
		$data['homecontent'] = $homecontent[0]->description;
          }

		//return view('home');
		
		

		return view('index',$data);
	}
   public function youtubeImagMaker($imgPath,$videoType)
   	{

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
   public function getVimeoVideoCode($videoUrl)
   {
      //https://vimeo.com/7256322
   	$arr=explode('https://vimeo.com/', $videoUrl);
   	$videoUrl=$arr[1];
   	return $videoUrl;
   	
   }
   	
   
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
