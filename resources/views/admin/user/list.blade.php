@extends('.admin.layouts.default')
@section('content')           
<div class="page-wrap">
		<div class="box-header">
		  <h3 class="box-title">Manage All Articles</h3>
		</div><!-- /.box-header -->
		<p></p>
		<div class="form-area" style="width: 95%;">	
			<section class="content">
				  <div class="row">
				  	<a class="btn bg-olive margin" href="{{url('admin/article/add')}}" style="float:right"><i class="fa fa-fw fa-compass"></i> Add New Article</a>

				  	
				  </div>
				  <div class="row">
					<div class="box">
						<div class="box-body table-responsive no-padding">
						
						  <table class="table table-hover">
							<tr>
							  <th>Sl.</th>
							  <th>Title</th>
							  <th>Actions</th>
							</tr>
							
								@if (count($article) >0)
								
								@foreach ($article as $index=>$artcle) 
									<tr>
									  <td>{{$index+1}}</td>
									  <td>{{$artcle->title}}</td>
									  
									  <td>
									  	<A HREF="{{url('admin/article/edit/'.$artcle->id)}}" title="Edit"><i class="fa fa-pencil-square-o"></i></A>
										&nbsp;
								  	  </td>
									</tr>
								@endforeach	
									@else
									<tr><td> No Records Found!</td></tr>
@endif						
						  </table>
                          <div class="box-footer clearfix">		
								{!! $article->render() !!}							  
						 </div>
						</div><!-- /.box-body -->
					  </div><!-- /.box -->
				  </div>
			</section>
		</div>
</div>
@endsection