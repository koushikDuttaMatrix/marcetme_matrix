@extends('.admin.layouts.default')

@section('content')
           
<div class="page-wrap">
		<div class="box-header">
		  <h3 class="box-title">Edit <strong>{{$blog->title}}</strong> Blog</h3><a class="btn bg-olive margin pull-right" href="{{url('admin/blogs')}}"><i class="fa fa-fw fa-compass"></i> Back to List</a>		

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
					<form class="form-horizontal" role="form" name="blog"  method="POST"  enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">						
						
						<div class='box-body pad'>
							  <label for="exampleInputTitle">Title<span class="requiredspn">*</span></label>
								<input type="text" name="title" value="{{$blog->title}}" class="form-control" />
						</div>	
						<div class='box-body pad'>
								<label for="exampleInputDescription">Description</label>
								<textarea name="description" id="description"  class="form-control" />{{$blog->description}}</textarea>
						</div>	
						
						<!--<div class='box-body pad'>
								<label for="exampleInputDescription">Image</label>
								<input type="file" name="image"  />
								</br>
								@if ($blog->image != '')
								<img src="{{url('blog_images/'.$blog->image)}} " height="60" width="60">
								@endif
						</div>-->
						<div class='box-body pad'>
								<label for="exampleInputDescription">File Type</label>
								<input type="radio" name="file_type" id="image" 
							  @if($blog->file_type=='image')	
								checked="checked" 
								@endif
								value="image"> Image
  								<input type="radio" name="file_type" id="video" 
  								@if($blog->file_type=='video')	
								checked="checked" 
								@endif
  								value="video"> Video
						</div>	
                                 @if($blog->file_type=='image')
                                <div class='box-body pad imageDiv'>
                                @else
                                <div class='box-body pad imageDiv' style="display:none">
                                @endif
								<label for="exampleInputDescription">Image</label>
								<input type="file" name="image"  />
								</br>
								@if ($blog->image != '')
								<img src="{{url('blog_images/'.$blog->image)}} " height="60" width="60">
								@endif
						</div>
						@if($blog->file_type=='video')	
						<div class="videoDiv" >
						@else
						<div class="videoDiv" style="display:none">
						 @endif
						<div class='box-body pad' >
								<label for="exampleInputDescription">Video Type</label>
								<select name="video_type"  id="video_type" >
								<option value="">Select One</option>
								<option value="youtube"
                                 @if($blog->video_type=='youtube')	
								selected="selected" 
								@endif
								>Youtube</option>
								<option value="vimeo"
								@if($blog->video_type=='vimeo')	
								selected="selected" 
								@endif
								>Vimeo</option>
							<!--	<option value="google"
								@if($blog->video_type=='google')	
								selected="selected" 
								@endif
								>Google</option>-->	
								</select>
						</div>

						<div class='box-body pad' >
							Example Youtube Link Format : https://www.youtube.com/watch?v=0pDokevQsAU 
							</br>
							Example Vimeo Link Format : https://vimeo.com/7256322
						</div>

						@if($blog->video_type!="")
						<div class='box-body pad embedText'>
						@else
						<div class='box-body pad embedText' style="display:none">
						@endif
								<label for="exampleInputDescription">Embed link</label>
								<input type="text" name="embed_link" id="embed_link" class="form-control" value="{{$blog->embed_link}}" />
						</div>	
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