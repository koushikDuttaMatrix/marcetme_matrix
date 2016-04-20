<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Cms;
use App\Models\Article;


class CommonServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{

    $allcategory = Category::where('is_active', 1)
               ->orderBy('id', 'desc') ->get(); 
		
	

		$homecontent = Cms::where('is_active', 1)
               ->where('id', 5) ->get(); 

      

		$data['allcategory'] = $allcategory;
		$data['homecontent'] = $homecontent[0]->description;

		//$latestBlogs = Blog::where('is_active', 1)
        //       ->orderBy('id', 'desc') ->get();      

        $latestBlogs = Blog::where('is_active', 1)
               ->orderBy('id', 'desc') ->get(); 

 			




		
		$homecontent = Cms::where('is_active', 1)
               ->where('id', 5) ->get();
		
		$latest_blog_list = Blog::where('is_active', 1)->orderBy('id', 'desc')
               ->limit(3) ->get(); 
               foreach ($latest_blog_list as $latestBlog) {
               	# code...
               	//echo date('Y-m-d H:i:s');
             
               $latestBlog->embed_link=$this->youtubeImagMaker($latestBlog->embed_link,$latestBlog->video_type);
               }

               $latestArticles = Article::where('is_active', 1)
               ->orderBy('id', 'desc')->limit(3) ->get(); 
                 foreach ($latestArticles as $latestArticle) {
                # code...
                //echo date('Y-m-d H:i:s');
             
               $latestArticle->embed_link=$this->youtubeImagMaker($latestArticle->embed_link,$latestArticle->video_type);
               }

        		$data['blogs'] = $latestBlogs;
        		$data['homecontent'] = $homecontent[0]->description;
        		$data['latest_blog_list'] = $latest_blog_list;
        		
		//print_r($data);die();
       
          view()->share('allcategory',$allcategory);
          view()->share('latestArticles',$latestArticles);
          view()->share('homecontent',$homecontent[0]->description);
          view()->share('blogs',$latestBlogs);
          view()->share('latest_blog_list',$latest_blog_list);
          view()->share('latestBlogs',$latestBlogs);
         // view()->share('latest_article_list',$latestArticles);
          //view()->share('articles',$latestArticles);
          view()->share('latestblog',$latestBlogs);
          view()->share('latest_article_list',$latestArticles);

         
          
        //  view()->share('copyRight', $copyRight);

      
		//
		//$data=[];
		//$data['userId']=Auth::user()->id;
		//echo $data['userId'];die();


          


    




	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		}

public function getVimeoVideoCode($videoUrl)
   {
      //https://vimeo.com/7256322
   	$arr=explode('https://vimeo.com/', $videoUrl);
   	$videoUrl=$arr[1];
   	return $videoUrl;
   	
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


}
