<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use Category;
use Article;
use Blog;
use Cms;


class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{

    		 
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
		dd($data);
        
          view()->share('latest_blog_list', $latest_blog_list);
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
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

}
