<?php 
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for Categorys that
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
	 * Show the application dashboard to the Category.
	 *
	 * @return Response
	 */
	public function index()
	{	

		$count_category = DB::table('category')
                     ->select(DB::raw('count(*) as category_count'))
                     ->where('is_active', 1)
                     ->get();
		$count_category_no = $count_category[0]->category_count;
		
		//echo "<pre>";
		//print_r($count_category);die;
		
		$category = Category::where('is_active', 1)
		->where('is_active',1)
               ->orderBy('id', 'desc')
              ->paginate(10);      
				//echo "<pre>";
				//print_r($category);die;
		
		$data['category']= $category;
		$data['count_category'] = $count_category_no;
		return view('admin/category/list',$data);
	}

	public function add(Request $request){
	
		if ($request->isMethod('post')) {		
		$validator = Validator::make($request->all(), [
            'title' => 'required|unique:category|max:255',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
		
			//echo "<pre>";
			//print_r($validator);die;
			return redirect('admin/category/add')
                        ->withErrors($validator)
                        ->withInput();
		}
		else{
		
		$category = new Category;

		$category->title = $request->title;
		$category->description = $request->description;
		
		if ($request->hasFile('image'))
			{  
				$image = $request->file('image');
				$filename  = time() . '.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('category_images/');  
				$path = public_path('category_images/thumbnails/');         
                //Image::make($image->getRealPath())->resize(200, 200)->save($path);				
				$image->move($destinationPath, $filename);

                $category->image = $filename;                
           }
		   
			$category->save();

			return redirect('admin/category');
		}
	}
		
		$data = array();
		return view('admin/category/category_add',$data);
	}
	
	public function edit($id, Request $request){		
		
		if ($request->isMethod('post')) {
		
		$validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
           // 'image' => 'required',
        ]);

        if ($validator->fails()) {
		
			//echo "<pre>";
			//print_r($validator);die;
			return redirect('admin/category/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
		}
		else{
			$category = new Category;
			$category->title = $request->title;
			$category->description = $request->description;
			//$cms->save();
			
			/******* update code *******/
			$update_arr = array('title'=>$request->title,
											'description' => $request->description);
											
			if ($request->hasFile('image'))
			{  
				$image = $request->file('image');
				$filename  = time() . '.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('category_images/');     
				$path = public_path('category_images/thumbnails/');      				
                //Image::make($image->getRealPath())->resize(200, 200)->save($path);				
				$image->move($destinationPath, $filename);

                $update_arr['image'] = $filename;                
			}
									
			$category::where('id',$id)
			->update($update_arr);
			/***** End of update code *******/
			return redirect('admin/category/');
		}
	}
		$category = Category::find($id);
		
		$data=array();
		$data['category'] = $category;
		return view('admin/category/category_edit',$data);
	}
   public function remove(Request $request)
   {
   	DB::table('category')
            ->where('id', $request['id'])
            ->update(['is_active' => 0]);
      return $request['id'];
   }
	
}