<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Category;
use Article;
use Blog;
use Cms;
use View;
class BaseController extends Controller
{

  public function __construct()
  {

    //its just a dummy data object.
     $allcategory = Category::where('is_active', 1)
               ->orderBy('id', 'desc') ->get(); 
		
		$latestArticles = Article::where('is_active', 1)
               ->orderBy('id', 'desc') ->get(); 
			   
		$latestBlogs = Blog::where('is_active', 1)
               ->orderBy('id', 'desc') ->get(); 

		$homecontent = Cms::where('is_active', 1)
               ->where('id', 5) ->get(); 

	
		
		$data['allcategory'] = $allcategory;
		$data['latestArticles'] = $latestArticles;
		$data['latestBlogs'] = $latestBlogs;
		$data['homecontent'] = $homecontent[0]->description;

		$latestBlogs = Blog::where('is_active', 1)
               ->orderBy('id', 'desc') ->get();      
		
		$homecontent = Cms::where('is_active', 1)
               ->where('id', 5) ->get();
		
		$latest_blog_list = Blog::where('is_active', 1)
               ->limit(3) ->get(); 

			   
	
		$data['blogs'] = $latestBlogs;
		$data['homecontent'] = $homecontent[0]->description;
		$data['latest_blog_list'] = $latest_blog_list;
          
         View::share('data', $data);
}
}