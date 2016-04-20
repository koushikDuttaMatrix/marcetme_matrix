@extends('.admin.layouts.default')

@section('content')
              <!-- general form elements -->
           
<div class="page-wrap">
		<div class="box-header">
		  <h3 class="box-title">Add new Article</h3><a class="btn bg-olive margin pull-right" href="{{url('admin/articles')}}"><i class="fa fa-fw fa-compass"></i> Back to List</a>
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
							  <input type="text" name="title" value="{{ old('title') }}" class="form-control" />
						</div>	
							
						<div class='box-body pad'>
								<label for="exampleInputDescription">Description</label>
								<textarea name="description" id="description" class="form-control" />{{ old('description') }}</textarea>
						</div>	

						<div class='box-body pad'>
								<label for="exampleInputDescription">File Type</label>
								<input type="radio" name="file_type" id="image" checked="checked" value="image"> Image
  								<input type="radio" name="file_type" id="video" value="video"> Video
						</div>	
						
						<div class='box-body pad imageDiv'>
								<label for="exampleInputDescription">Image</label>
								<input type="file" name="image"  />
						</div>	
						<div class="videoDiv" style="display:none">
						<div class='box-body pad' >
								<label for="exampleInputDescription">Video Type</label>
								<select name="video_type"  id="video_type" >
								<option value="">Select One</option>
								<option value="youtube">Youtube</option>
								<option value="vimeo">Vimeo</option>
								<!--<option value="google">Google</option>	-->
								</select>
						</div>
						<div class='box-body pad' >
							Example Youtube Link Format : https://www.youtube.com/watch?v=0pDokevQsAU 
							</br>
							Example Vimeo Link Format : https://vimeo.com/7256322
						</div>
						<div class='box-body pad embedText' style="display:none">
								<label for="exampleInputDescription">Embed link</label>
								<input type="text" name="embed_link" id="embed_link" class="form-control" />
						</div>	
						</div>
						
						<br/></br/>
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