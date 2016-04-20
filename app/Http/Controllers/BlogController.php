<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Cms;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\UserComment;


class BlogController extends Controller {

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
	********** this function use for view blog list **************
	*/
	public function index()
	{
		$data = array();

$allcategory = Category::where('is_active', 1)
               ->orderBy('id', 'desc') ->get(); 
		
		$latestArticles = Article::where('is_active', 1)
               ->orderBy('id', 'desc') ->get(); 

              if(Auth::check())
	  			{
$latestBlogs = Blog::where('is_active', 1)
		->leftJoin('users','users.id','=','blogs.user_id')
               ->orderBy('blogs.id', 'desc') ->get(['blogs.id','title','description','image','profile_picture','blogs.created_at','blogs.file_type','blogs.video_type','blogs.embed_link']); 
              // print_r($latestBlogs);die();
               foreach ($latestBlogs as $latestBlog) {
               	# code...
               	//echo date('Y-m-d H:i:s');
              $estimateDate=(strtotime(date('Y-m-d H:i:s')))-intval(strtotime($latestBlog->created_at));
                $stringB=$this->getTimeDiffInWords($estimateDate);
               $latestBlog->estimateDateBlog=$stringB;
               $latestBlog->embed_link=$this->youtubeImagMaker($latestBlog->embed_link,$latestBlog->video_type);
               //elseif($latestBlog->video_type=="vimeo")
             //echo $estimatetDate;die();
               //print_r($latestBlog);die();
               //	$latestBlog['']
               }
               
	  			}
	  			else
	  			{
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
	  			}

			   
		$homecontent = Cms::where('is_active', 1)
               ->where('id', 5) ->get(); 

	
		
		$data['allcategory'] = $allcategory;
		$data['latestArticles'] = $latestArticles;
		$data['latestBlogs'] = $latestBlogs;
		$data['homecontent'] = $homecontent[0]->description;

	
		$homecontent = Cms::where('is_active', 1)
               ->where('id', 5) ->get();
	
		$data['blogs'] = $latestBlogs;
		$data['homecontent'] = $homecontent[0]->description;
		return view('blog_list',$data);
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
	/*
	********** this function use for view blog detail page**************
	*/
	public function details($id){


		$blogs = Blog::where('is_active', 1)->orderBy('id', 'desc')
               ->where('id', $id) ->get();
		
				# this section for unique vimeo video link generate
               if($blogs[0]->video_type=="vimeo")
				$blogs[0]->vimeoVideoLink=$this->getVimeoVideoCode($blogs[0]->embed_link);
			  else
				$blogs[0]->vimeoVideoLink='';

				$data['blog'] = $blogs[0];

		/*$latest_blog_list = Blog::where('is_active', 1)
               ->limit(3) ->get(); 
		
		//echo "<pre>";
		//print_r($article_list);die;

		
		$homecontent = Cms::where('is_active', 1)
               ->where('id', 5) ->get(); 
		//echo "<pre>";
		//print_r($homecontent);die;
		
		
		$data['homecontent'] = $homecontent[0]->description;
		$data['latest_blog_list'] = $latest_blog_list;*/
		// this section for show comment

		$commentView=UserComment::
		leftJoin('users','users.id','=','user_comments.user_id')->
		where('user_comments.is_active',1)->
		where('blog_id',$id)->
		orderBy('user_comments.id','desc')->get()->toarray();
		$data['userComments']=$commentView;

        
		//$data['profilePicture'] = Auth::user()->profile_picture();
		//print_r($commentView);die();

		return view('blog_details',$data);
	}

 /*
	********** this function use for get cms data by id**************
	*/
	public function getCms(Request $request,$id)
	{
		
       // logic done for cms view 
         $cms=Cms::findOrFail($id);
         $data['cmsTitle']= $cms['title']; 
         $data['cmsDescription']= $cms['description']; 
     //dd($data);
		return view('cmsView',$data);
	}
   /*
	********** this function use for view contact us page**************
	*/
	public function contactUs(Request $request)
	{
		$data=array();
        if ($request->isMethod('post')) {
       $validator = Validator::make($request->all(), [
		'name' => 'required',
		'email' => 'required',
		 'address' => 'address'
		]);
		
		if ($validator->fails()) {
		
			//echo "<pre>";
			//print_r($validator);die;
			return redirect('contact-us')
                        ->withErrors($validator)
                        ->withInput();
		}
		else{

			// mail send code done this area
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

			
		}
	}



		return view('contactUs',$data);
	}
   /*
	********** this function use for view and insert blog page**************
	*/
	public function addBlog(Request $request)
	{
		$data=array();
         if ($request->isMethod('post')) {
		$validator = Validator::make($request->all(), [
            'title' => 'required|unique:blogs|max:255',
            'description' => 'required'
            
        ]);

        if ($validator->fails()) {
		
			//echo "<pre>";
			//print_r($validator);die;
			return redirect('add-blog')
                        ->withErrors($validator)
                        ->withInput();
		}
		else{
		
		$blog = new Blog;

		$blog->title = $request->title;
		$blog->description = $request->description;


		//blog video upload insert code implement here
		if($request->get('file_type')=="video")
		{
			if($request->video_type=="youtube")
			{
			if(strstr($request->embed_link,'https://www.youtube.com/watch?v'))
			{
            $arr=explode('https://www.youtube.com/watch?v=',trim($request->embed_link));
            $embed_link="http://www.youtube.com/embed/".$arr[1]."?autoplay=1";
            
			$blog->embed_link = $embed_link;
			
			}
			else
			{
				$blog->embed_link = '';
			}
			$blog->video_type = $request->video_type;	
			$blog->file_type = $request->file_type;	
			}
			elseif($request->video_type=="vimeo")
			{
				$blog->video_type = $request->video_type;
			$blog->embed_link = trim($request->embed_link);
			$blog->file_type = $request->file_type;
			}
		}
		elseif($request->get('file_type')=="image")
		{

			$blog->video_type ='';
			$blog->embed_link = '';
		}
		//blog video upload insert code implement here
		$blog->user_id = Auth::user()->id;
		
		if ($request->hasFile('image'))
			{  
				$image = $request->file('image');
				$filename  = time() . '.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('blog_images/');  
				$path = public_path('blog_images/thumbnails/');         
                //Image::make($image->getRealPath())->resize(200, 200)->save($path);				
				$image->move($destinationPath, $filename);

                $blog->image = $filename;                
           }
		   
			$blog->save();

			return redirect('manage-blogs');
		}
	}
		
		
		return view('addBlog',$data);
	}
   /*
	********** this function use for view manage blog page**************
	*/
	public function manageBlog()
	{
		$data=array();
		$count_blog = DB::table('blogs')
                     ->select(DB::raw('count(*) as blog_count'))
                     ->get();
		$count_blog_no = $count_blog[0]->blog_count;
	
		$blog = Blog::where('is_active', 1)
                     ->where('user_id',Auth::user()->id)
                     //->where('verify',1)
               ->orderBy('id', 'desc')
              ->paginate(10);
               
		
		$data['blog']= $blog;
		$data['count_blog']= $count_blog_no;
		return view('manageBlog',$data);
	}

/*
	********** this function use for edit blog page**************
	*/
	public function editBlog($id, Request $request){	


	    $data=array();
		$blog = Blog::find($id);
		
		//print_r($blog);die();

		//echo $blog->embed_link;die();
		if($blog->video_type=="youtube")
		{
			//echo $blog->embed_link;die();
			$arr= explode('http://www.youtube.com/embed/',$blog->embed_link);
				$arr2= explode('?autoplay=1',$arr[1]);
			//echo $arr2[0];die();
			$embedLink="https://www.youtube.com/watch?v=".$arr2[0]."";
			$blog->embed_link=$embedLink;
		}
		$data['blog'] = $blog;	
		if ($request->isMethod('post')) {
		
		$validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
           // 'image' => 'required',
        ]);

        if ($validator->fails()) {
		
			//echo "<pre>";
			//print_r($validator);die;
			return redirect('edit-blog'.$id)
                        ->withErrors($validator)
                        ->withInput();
		}
		else{
			$blog = new Blog;
			$blog->title = $request->title;
			$blog->description = $request->description;
			//$cms->save();
			
			/******* update code *******/
			$update_arr = array(
											'title'=>$request->title,
											'description' => $request->description											
									);
			if ($request->hasFile('image'))
			{  
				$image = $request->file('image');
				$filename  = time() . '.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('blog_images/');     
				$path = public_path('blog_images/thumbnails/');      				
                //Image::make($image->getRealPath())->resize(200, 200)->save($path);				
				$image->move($destinationPath, $filename);

                $update_arr['image'] = $filename;                
           }


               // video or image editing this section 
			if($request->get('file_type')=="video")
		    {
			if($request->video_type=="youtube")
			{
			if(strstr($request->embed_link,'https://www.youtube.com/watch?v'))
			{
            $arr=explode('https://www.youtube.com/watch?v=',trim($request->embed_link));
            $embed_link="http://www.youtube.com/embed/".$arr[1]."?autoplay=1";
			$update_arr['embed_link']  = $embed_link;
			
			}
			else
			{
				$update_arr['embed_link']  = '';
			}
			$update_arr['video_type'] = $request->video_type;	
			$update_arr['file_type'] = $request->file_type;	
			}
			elseif($request->video_type=="vimeo")
			{
			$update_arr['video_type']  = $request->video_type;
			$update_arr['embed_link'] = trim($request->embed_link);
			$update_arr['file_type'] = $request->file_type;
			}
			$update_arr['image'] ="";
		    }
		    elseif($request->get('file_type')=="image")
		     {
             $update_arr['video_type']="";
              $update_arr['embed_link']="";  
			//$blog->video_type ='';
			//$blog->embed_link = '';
			$update_arr['file_type'] = $request->file_type; 
		     }
			// video or image editing this section 
									

									
			$blog::where('id',$id)
			->update($update_arr);
			/***** End of update code *******/
			return redirect('manage-blogs');
		}
	}
		
		return view('editBlog',$data);
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
