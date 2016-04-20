<?php namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Models\Article;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Validator;

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
		$this->middleware('adminauth');
		
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
       

		
	
		$count_article = DB::table('articles')
                     ->select(DB::raw('count(*) as article_count'))
                     ->where('is_active', 1)
                     ->get();
		$count_article_no = $count_article[0]->article_count;
	
		$article = Article::where('is_active', 1)
               ->orderBy('id', 'desc')
              ->paginate(10);
               
		
		$data['article']= $article;
		$data['count_article']= $count_article_no;
		return view('admin/article/list',$data);
	}

	public function add(Request $request){
	
		if ($request->isMethod('post')) {
		
		$validator = Validator::make($request->all(), [
            'title' => 'required|unique:articles|max:255',
            'description' => 'required',
           
        ]);

        if ($validator->fails()) {
		
			//echo "<pre>";
			//print_r($validator);die;
			return redirect('admin/article/add')
                        ->withErrors($validator)
                        ->withInput();
		}
		else{
		
		$article = new Article;

		$article->title = $request->title;
		$article->description = $request->description;

		//Article video upload insert code implement here
		if($request->get('file_type')=="video")
		{
			if($request->video_type=="youtube")
			{
			if(strstr($request->embed_link,'https://www.youtube.com/watch?v'))
			{
            $arr=explode('https://www.youtube.com/watch?v=',trim($request->embed_link));
            $embed_link="http://www.youtube.com/embed/".$arr[1]."?autoplay=1";
            
			$article->embed_link = $embed_link;
			
			}
			else
			{
				$article->embed_link = '';
			}
			$article->video_type = $request->video_type;	
			$article->file_type = $request->file_type;	
			}
			elseif($request->video_type=="vimeo")
			{
				$article->video_type = $request->video_type;
			    $article->embed_link = trim($request->embed_link);
			    $article->file_type = $request->file_type;
			}
		}
		elseif($request->get('file_type')=="image")
		{

			$article->video_type ='';
			$article->embed_link = '';
		}
		//Article video upload insert code implement here
		
		if ($request->hasFile('image'))
			{  
				$image = $request->file('image');
				$filename  = time() . '.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('article_images/');  
				$path = public_path('article_images/thumbnails/');         
                //Image::make($image->getRealPath())->resize(200, 200)->save($path);				
				$image->move($destinationPath, $filename);

                $article->image = $filename;                
           }
		   
			$article->save();

			return redirect('admin/articles');
		}
	}
		
		$data = array();
		return view('admin/article/article_add',$data);
	}
	
	public function edit($id, Request $request){	




		

	    $data=array();
		$article = Article::find($id);
		
		//print_r($blog);die();

		//echo $blog->embed_link;die();
		if($article->video_type=="youtube")
		{
			//echo $blog->embed_link;die();
			$arr= explode('http://www.youtube.com/embed/',trim($article->embed_link));
				$arr2= explode('?autoplay=1',$arr[1]);
			//echo $arr2[0];die();
			$embedLink="https://www.youtube.com/watch?v=".$arr2[0]."";
			$article->embed_link=$embedLink;
		}
		$data['article'] = $article;	
		
		if ($request->isMethod('post')) {
		
		$validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
           // 'image' => 'required',
        ]);

        if ($validator->fails()) {
		
			//echo "<pre>";
			//print_r($validator);die;
			return redirect('admin/article/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
		}
		else{
			$article = new Article;
			$article->title = $request->title;
			$article->description = $request->description;
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
				$destinationPath = public_path('article_images/');     
				$path = public_path('article_images/thumbnails/');      				
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
									
			$article::where('id',$id)
			->update($update_arr);
			/***** End of update code *******/
			return redirect('admin/articles/');
		}
	}
		return view('admin/article/article_edit',$data);
	}

	public function remove(Request $request)
   {
   	DB::table('articles')
            ->where('id', $request['id'])
            ->update(['is_active' => 0]);
      return $request['id'];
   }

	
}