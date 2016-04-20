<?php namespace App\Http\Controllers\admin;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Cms;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Validator;

class CmsController extends Controller {

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
	public function __construct(Guard $auth)
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
		
		$count_cms = DB::table('cms')
                     ->select(DB::raw('count(*) as cms_count'))
                     ->where('is_active', 1)
                     ->get();
		$count_cms_no = $count_cms[0]->cms_count;

	
		$cms = Cms::where('is_active', 1)
               ->orderBy('title', 'desc')
              ->paginate(10);
               
		
		$data['cms']= $cms;
		$data['cms_count']= $count_cms_no;
		return view('admin/cms/cms',$data);
	}

	public function add(Request $request){
	
		if ($request->isMethod('post')) {
		
		$validator = Validator::make($request->all(), [
		'title' => 'required|unique:cms|max:255',
		'description' => 'required',
		]);
		
		if ($validator->fails()) {
		
			//echo "<pre>";
			//print_r($validator);die;
			return redirect('admin/cms/add')
                        ->withErrors($validator)
                        ->withInput();
		}
		else{
				$cms = new Cms;
				$cms->title = $request->title;
				$cms->description = $request->description;			
				$cms->save();
			}	
			return redirect('admin/cms');
		}
		
		$data = array();
		return view('admin/cms/cms_add',$data);
	}
	
	public function edit($id, Request $request){		
		
		if ($request->isMethod('post')) {
			$cms = new Cms;
			$cms->title = $request->title;
			$cms->description = $request->description;
			//$cms->save();
			
			/******* update code *******/
			$update_arr = array(
											'title'=>$request->title,
											'description' => $request->description											
									);
									
			$cms::where('id',$id)
			->update($update_arr);
			/***** End of update code *******/
			return redirect('admin/cms/');
		}
		//$cms = new Cms;
		$cms = Cms::find($id);
		
		$data=array();
		$data['cms'] = $cms;
		return view('admin/cms/cms_edit',$data);
	}
	public function remove(Request $request)
   {
   	DB::table('cms')
            ->where('id', $request['id'])
            ->update(['is_active' => 0]);
      return $request['id'];
   }
	
	
}
