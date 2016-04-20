@extends('.admin.layouts.app')

@section('content')
 <div class="col-md-12>
              <!-- general form elements -->
              <div class="box box-primary">
				
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								
									<li>{{ $message }}</li>
								
							</ul>
						</div>
					
                <div class="box-header with-border">
                  <h3 class="box-title">Admin Login boot1</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form  role="form" method="POST" action="{{ url('/admin/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
					  <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
					  <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                   
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="remember"> Remember Me
                      </label>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
					<button type="submit" class="btn btn-primary">Login</button>
					<a class="btn btn-link" href="{{ url('/admin/password/email') }}">Forgot Your Password?</a>
                  </div>
					
                </form>
              </div><!-- /.box -->
	</div>
@endsection