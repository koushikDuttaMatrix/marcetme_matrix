<?php namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Models\Blog;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Validator;

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
		$this->middleware('adminauth');
		
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
	
		$count_blog = DB::table('blogs')
                     ->select(DB::raw('count(*) as blog_count'))
                     ->where('is_active', 1)
                     ->get();
		$count_blog_no = $count_blog[0]->blog_count;
	
		$blog = Blog::where('is_active', 1)
               ->orderBy('id', 'desc')
              ->paginate(10);
               
		
		$data['blog']= $blog;
		$data['count_blog']= $count_blog_no;
		return view('admin/blog/list',$data);
	}

	public function add(Request $request){
	
		if ($request->isMethod('post')) {
		
		$validator = Validator::make($request->all(), [
            'title' => 'required|unique:blogs|max:255',
            'description' => 'required',

            
        ]);

        if ($validator->fails()) {
		
			//echo "<pre>";
			//print_r($validator);die;
			return redirect('admin/blog/add')
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
			//http://www.youtube.com/embed/Kbhh6iT9XOY?autoplay=0
			//https://www.youtube.com/watch?v=PZq9MuWA2UY
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

			return redirect('admin/blogs');
		}
	}
		
		$data = array();
		return view('admin/blog/blog_add',$data);
	}
	
	public function edit($id, Request $request){
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
			return redirect('admin/blog/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
		}
		else{
			$blog = new Blog;
			$blog->title = $request->title;
			$blog->description = $request->description;
			//$cms->save();

// video or image editing this section 

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
			return redirect('admin/blogs/');
		}
	}
		
		return view('admin/blog/blog_edit',$data);
	}
  public function remove(Request $request)
   {
   	DB::table('blogs')
            ->where('id', $request['id'])
            ->update(['is_active' => 0]);
      return $request['id'];
   }
   

	
}