@extends('.admin.layouts.default')
@section('content')           
<div class="page-wrap">
		<div class="box-header">
		  <h3 class="box-title">Manage All Categories</h3>
		</div><!-- /.box-header -->
		<p></p>
		<div class="form-area" style="width: 95%;">	
			<section class="content">
				  <div class="row">
				  	<a class="btn bg-olive margin" href="{{url('admin/category/add')}}" style="float:right"><i class="fa fa-fw fa-compass"></i> Add New Category</a>

				  	
				  </div>
				  <div class="row">
					<div class="box">
						<div class="box-body table-responsive no-padding">
					
						  <table class="table table-hover">
							<tr>
							  <th>Sl.</th>
							  <th>Image</th>
							  <th>Title</th>							  
							  <th>Edit</th>
							  <th>Actions</th>
							</tr>
							
								@if (count($category) >0)
								
								@foreach ($category as $index=>$cat) 
									<tr>
									  <td>{{$index+1}}</td>
									  <td><image src="{{url('category_images/'.$cat->image)}}" height="50" width="50"></td>
									  <td>{{$cat->title}}</td>
									  
									  <td>
									  	<A href="{{url('admin/category/edit/'.$cat->id)}}" title="Edit"><i class="fa fa-pencil-square-o"></i></A>
										&nbsp;
								  	  </td>
								  	  <td>
								  	  <input type="hidden" id="catrgoryId" value="{{$cat->id}}"/>
									  	<A href="javascript:void(0);" title="Delete" id="deleteCategory" onclick="deleteCategory('{{$cat->id}}');"> <i class="fa fa-times"></i></A>
										&nbsp;
								  	  </td>
									</tr>
								@endforeach	
									@else
									<tr><td colspan="3"> No Records Found!</td></tr>
								@endif						
						  </table>
                          <div class="box-footer clearfix">		
								{!! $category->render() !!}							  
						 </div>
						</div><!-- /.box-body -->
					  </div><!-- /.box -->
				  </div>
			</section>
		</div>
</div>
@endsection