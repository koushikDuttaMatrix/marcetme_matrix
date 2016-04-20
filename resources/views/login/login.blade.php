@extends('layouts.app')

@section('content')




<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner login_carousel">
    <div class="item active"> <img src="{{ url('images/login_banner.jpg')}}" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <h1>Login</h1>
        </div>
      </div>
    </div>
  </div>
  
</div>

<!--slider_section-->



</div>

<div class="breadcrumb_section">
<div class="container">
<ul>
<li>home</li>  
<li>login</li>
</ul>
</div>
</div>

<!--breadcrumb_section-->


<div class="login_section">
<div class="container">


<h4>To improve security, you must now use your email address to log in to Mumsnet</h4>

<div class="col-md-6 login_left">

@if (Session::has('alert-success'))
<div class="alert alert-danger">
	<!-- <strong>Whoops!</strong> There were some problems with your input.<br><br> -->
	<ul>
		<li> 
			<strong> 
				<i class="fa fa-times fa-lg fa-fw"></i> Error. &nbsp;
			</strong>
			{{ Session::get('alert-success') }} 
		</li>
	</ul>
</div>
@endif
<!--this section for success messgae box-->

@if (Session::has('alert-success-message'))
<div class="alert alert-success">
	<!-- <strong>Whoops!</strong> There were some problems with your input.<br><br> -->
	<strong>Success!</strong>{{ Session::get('alert-success-message') }} 
			
		
</div>
@endif
<!--this section for success messgae box-->








<form class="login_form" role="form" method="POST" action="{{ action('UserController@getLoginUser') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<p>
<i class="fa fa-envelope"></i>
<input type="text" name="email" pattern="(\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,7})" value="{{ old('email') }}" placeholder="Email" title="xyz@example.com" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required>
</p>

<p>
<i class="fa fa-lock"></i>
<input type="password" pattern="[a-zA-Z0-9]{6,}" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" title="Minimum six character" required>
</p>

<p class="login_btn"><button type="submit">Log In</button></p>
</form>
</div>
<div class="col-md-6 login_right">
<a href="{{url('facebook-login')}}"><img src="{{ url('images/facebook_img.png')}}" alt="" border="0" /></a>
<a href="{{action('AuthController@redirectToGoogle')}}"><img src="{{ url('images/google_img.png')}}" alt="" border="0" /></a>
</div>
</div>
</div>

@endsection
