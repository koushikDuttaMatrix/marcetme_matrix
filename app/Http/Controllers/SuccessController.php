<?php 
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Business;
use Hash;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Session;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Article;
use App\Models\Cms;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\BusinessImage;
use App\Models\BusinessSuccess;
use Input;
use Carbon\Carbon;
use DB;
use Illuminate\Pagination\LengthAwarePaginator as Paginators;


//require app_path().'/helpers/common.php';


class SuccessController extends Controller {

	public function __construct()
	{
		//$this->middleware('auth');
	}

	public function getBusinessSuccess(Request $request)
	{
	
	   $viewBusiness=BusinessSuccess::where('is_active',1)->orderBy('id', 'desc') ->paginate(5,['id','title','description','image'])->toarray();
	   //print_r($viewBusiness);die();
         //print_r($viewBusiness);die();
		$pagination = new Paginators($viewBusiness, $viewBusiness['total'],$viewBusiness['per_page']);
	 $pagination->setPath(url('/business-success/'));
      $data['render']=$pagination->render();

	   $data['business']=$viewBusiness['data'];
	   if(empty($data['business']))
	   {

         $data['errorMessage']='No Records Found';
	   }
	   return view('businessSuccess',$data);
	}
}
