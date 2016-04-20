@extends('.admin.layouts.default')

@section('content')
              <!-- general form elements -->
           
<div class="page-wrap">
		<div class="box-header">
		  <h3 class="box-title">Add new Page</h3>
		</div><!-- /.box-header -->
		<p></p>
		<div class="form-area" style="width: 95%;">	
			<section class="content">
			
				  <div class="row">
				  	<a class="btn bg-olive margin" href="#"><i class="fa fa-fw fa-compass"></i> Back to List</a>	
						
					<div class='box box-info'>
					<form class="form-horizontal" role="form" name="cms"  method="POST" >
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class='box-body pad'>
							  <label for="exampleInputTitle">Title<span class="requiredspn">*</span></label>
							  <input type="text" name="title" value="{{ old('title') }}" class="form-control" />
						</div>						
					  <div class='box-body pad'>
								<label for="exampleInputDescription">Description</label>
								<textarea name="description" id="description" class="form-control" />{{ old('description') }}</textarea>
						</div>							
						   <div class="box-footer">
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