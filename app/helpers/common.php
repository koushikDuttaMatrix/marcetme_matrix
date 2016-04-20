<?php
function commonView()
{
   	$data = array();print_r($data);die();
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
		
		return $data;

//common section code
}