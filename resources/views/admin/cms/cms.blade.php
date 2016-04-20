@extends('.admin.layouts.default')

@section('content')

<div class="page-wrap">
		<div class="box-header">
		  <h3 class="box-title">Manage All Pages</h3>
		</div><!-- /.box-header -->
		<p></p>
		<div class="form-area" style="width: 95%;">	
			<section class="content">
				  <div class="row">
				  	<!--<a class="btn bg-olive margin" href="{{url('admin/cms/add')}}" style="float:right"><i class="fa fa-fw fa-compass"></i> Add New Page</a>-->
				  	
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
							
								@if (count($cms) >0)
								
								@foreach ($cms as $index=>$c) 
									<tr>
									  <td>{{$index+1}}</td>
									  <td>{{$c->title}}</td>
									  
									  <td>
									  	<A HREF="{{url('admin/cms/edit/'.$c->id)}}" title="Edit"><i class="fa fa-pencil-square-o"></i></A>
										&nbsp;
								  	  </td>
								  	  <td>
								  	  <!--<input type="hidden" id="cmsId" value="{{$c->id}}"/>
									  	<A href="#" title="Delete" id="deleteCms"> <i class="fa fa-times"></i></A>-->
										&nbsp;
								  	  </td>
									</tr>
								@endforeach	
									@else
									<tr><td> No Records Found!</td></tr>
							@endif						
						  </table>
                          <div class="box-footer clearfix">		
								{!! $cms->render() !!}							  
						 </div>
						</div><!-- /.box-body -->
					  </div><!-- /.box -->
				  </div>
			</section>
		</div>
</div>

@endsection