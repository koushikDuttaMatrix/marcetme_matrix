@extends('.admin.layouts.default')

@section('content')
           
<div class="page-wrap">
		<div class="box-header">
		  <h3 class="box-title">Edit {{$business_success->title}} Business Success</h3><a class="btn bg-olive margin pull-right" href="{{url('admin/successes')}}"><i class="fa fa-fw fa-compass"></i> Back to List</a>
		</div><!-- /.box-header -->
		@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
		<div class="form-area" style="width: 95%;">	
			<section class="content">
			
				  <div class="row">

						
					<div class='box box-info'>
					<form class="form-horizontal" role="form" name="article"  method="POST"  enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">						
						
						<div class='box-body pad'>
							  <label for="exampleInputTitle">Title<span class="requiredspn">*</span></label>
								<input type="text" name="title" value="{{$business_success->title}}" class="form-control" />
						</div>	
						<div class='box-body pad'>
								<label for="exampleInputDescription">Description</label>
								<textarea name="description" id="description"  class="form-control" />{{$business_success->description}}</textarea>
						</div>	
						
						<div class='box-body pad'>
								<label for="exampleInputDescription">Image</label>
								<input type="file" name="image"  />
								</br>
								@if ($business_success->image != '')
								<img src="{{url('success_images/'.$business_success->image)}} " height="60" width="60">
								@endif
						</div>
						
						 <div class="box-footer pull-right">
							<button type="submit" class="btn btn-primary">Submit</button>
							<button type="reset" class="btn btn-primary">Reset</button>
						  </div>
						 
					</form>
						 
				  </div>				  
				  </div>
					
			</section>
		</div>
</div>


@endsection