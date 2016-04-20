@extends('.admin.layouts.app')

@section('content')
<div class="login-logo">
        <a href="#">
		<IMG SRC="{{url('admin/images/logo.png')}}" WIDTH="201" HEIGHT="67" BORDER="0" ALT="">		
		</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
		@if (Session::has('alert-success'))
					<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> 

					<i class="fa fa-times fa-lg fa-fw"></i> Error. &nbsp;
					</strong>
					{{ Session::get('alert-success') }}
					</div>
					@endif
					
		<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/auth/login') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
          <div class="form-group has-feedback">
		   <input type="email" class="form-control" name="email" value="{{ old('email') }}">         
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
			<input type="password" class="form-control" name="password">          
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
		  
		   <div class="form-group has-feedback">
			<input type="checkbox" name="remember"> Remember Me      
			<button type="submit" class="btn btn-primary pull-right">Login</button>	
          </div>
		  
          <div class="row">
            <div class="col-xs-4">  
					
            </div><!-- /.col -->
            <div class="col-xs-6 pull-right">
            <!-- <button type="submit" class="btn btn-primary">Login</button>		
				<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>-->
            </div><!-- /.col -->
          </div>
         </form>

        <div class="social-auth-links text-center">

      </div><!-- /.login-box-body -->
@endsection