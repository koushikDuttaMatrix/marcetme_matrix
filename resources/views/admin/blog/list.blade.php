@extends('.admin.layouts.default')
@section('content')           
<div class="page-wrap">
		<div class="box-header">
		  <h3 class="box-title">Manage All Blogs</h3>
		</div><!-- /.box-header -->
		<p></p>
		<div class="form-area" style="width: 95%;">	
			<section class="content">
				  <div class="row">
				  	<a class="btn bg-olive margin" href="{{url('admin/blog/add')}}" style="float:right"><i class="fa fa-fw fa-compass"></i> Add New Blog</a>

				  	
				  </div>
				  <div class="row">
					<div class="box">
						<div class="box-body table-responsive no-padding">
						
						  <table class="table table-hover">
							<tr>
							  <th>Sl.</th>
							  <th>Title</th>
							   <th>Edit</th>
							  <th>Actions</th>
							</tr>
							
								@if (count($blog) >0)
								
								@foreach ($blog as $index=>$blg) 
									<tr>
									  <td>{{$index+1}}</td>
									  <td>{{$blg->title}}</td>
									  
									  <td>
									  	<A HREF="{{url('admin/blog/edit/'.$blg->id)}}" title="Edit"><i class="fa fa-pencil-square-o"></i></A>
										&nbsp;
								  	  </td>
								  	  <td>
								  	  <input type="hidden" id="blogId" value="{{$blg->id}}"/>
									  	<A href="javascript:void(0);" title="Delete" id="deleteBlog"
									  	onclick="deleteBlog('{{$blg->id}}')"> <i class="fa fa-times"></i></A>
										&nbsp;
								  	  </td>
									</tr>
								@endforeach	
									@else
									<tr><td> No Records Found!</td></tr>
								@endif						
						  </table>
                          <div class="box-footer clearfix">		
								{!! $blog->render() !!}							  
						 </div>
						</div><!-- /.box-body -->
					  </div><!-- /.box -->
				  </div>
			</section>
		</div>
</div>
@endsection