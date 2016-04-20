@extends('.admin.layouts.default')
@section('content')           
<div class="page-wrap">
		<div class="box-header">
		  <h3 class="box-title">Manage Business Success</h3>
		</div><!-- /.box-header -->
		<p></p>
		<div class="form-area" style="width: 95%;">	
			<section class="content">
				  <div class="row">
				  	<a class="btn bg-olive margin" href="{{url('admin/success/add')}}" style="float:right"><i class="fa fa-fw fa-compass"></i> Add New Business Success</a>

				  	
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
							
								@if (count($business_success) >0)
								
								@foreach ($business_success as $index=>$business_successValue) 
									<tr>
									  <td>{{$index+1}}</td>
									  <td>{{$business_successValue->title}}</td>
									  
									  <td>
									  	<A HREF="{{url('admin/success/edit/'.$business_successValue->id)}}" title="Edit"><i class="fa fa-pencil-square-o"></i></A>
										&nbsp;
								  	  </td>
								  	  <td>
								  	  <input type="hidden" id="business_successId_{{$business_successValue->id}}" value="{{$business_successValue->id}}"/>
									  	<A href="javascript:void(0);" title="Delete" id="deleteBusinessSuccess" onclick="deleteBusinessSuccess('{{$business_successValue->id}}')" > <i class="fa fa-times"></i></A>
										&nbsp;
								  	  </td>
									</tr>
								@endforeach	
									@else
									<tr><td> No Records Found!</td></tr>
								@endif						
						  </table>
                          <div class="box-footer clearfix">		
								{!! $business_success->render() !!}							  
						 </div>
						</div><!-- /.box-body -->
					  </div><!-- /.box -->
				  </div>
			</section>
		</div>
</div>
@endsection