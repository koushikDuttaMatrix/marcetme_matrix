<?php 
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use App\Models\BusinessSuccess;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Validator;

class BusinessSuccessController extends Controller {

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


	public function index()
	{
       

		
	 // success vs successes
		$count_business_success = DB::table('business_success')
                     ->select(DB::raw('count(*) as business_success_count'))
                     ->where('is_active', 1)
                     ->get();
		$count_business_success_no = $count_business_success[0]->business_success_count;
	
		$business_success = BusinessSuccess::where('is_active', 1)
               ->orderBy('id', 'desc')
              ->paginate(10);
               
		
		$data['business_success']= $business_success;
		$data['count_business_success']= $count_business_success_no;
		return view('admin/success/list',$data);

	}

	public function add(Request $request){
	
		if ($request->isMethod('post')) {
		
		$validator = Validator::make($request->all(), [
            'title' => 'required|unique:articles|max:255',
            'description' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
		
			//echo "<pre>";
			//print_r($validator);die;
			return redirect('admin/success/add')
                        ->withErrors($validator)
                        ->withInput();
		}
		else{
		
		$business_success = new BusinessSuccess;

		$business_success->title = $request->title;
		$business_success->description = $request->description;
		
		if ($request->hasFile('image'))
			{  
				$image = $request->file('image');
				$filename  = time() . '.' . $image->getClientOriginalExtension();
				
				$destinationPath = public_path('success_images/');  
				$path = public_path('success_images/thumbnails/');  

                //Image::make($image->getRealPath())->resize(200, 200)->save($path);				
				$image->move($destinationPath, $filename);

                $business_success->image = $filename;                
           }
		   
			$business_success->save();

			return redirect('admin/successes');
		}
	}
		
		$data = array();
		return view('admin/success/success_add',$data);
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
			return redirect('admin/success/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
		}
		else{
			$business_success = new BusinessSuccess;
			$business_success->title = $request->title;
			$business_success->description = $request->description;
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
				$destinationPath = public_path('success_images/');     
				$path = public_path('success_images/thumbnails/');      				
                //Image::make($image->getRealPath())->resize(200, 200)->save($path);				
				$image->move($destinationPath, $filename);

                $update_arr['image'] = $filename;                
           }
									
			BusinessSuccess::where('id',$id)
			->update($update_arr);
			/***** End of update code *******/
			return redirect('admin/successes/');
		}
	}
		$article = BusinessSuccess::find($id);
		
		$data=array();
		$data['business_success'] = $article;
		return view('admin/success/success_edit',$data);
	}

	public function remove(Request $request)
   {
   	DB::table('business_success')
            ->where('id', $request['id'])
            ->update(['is_active' => 0]);
      return $request['id'];
   }

}