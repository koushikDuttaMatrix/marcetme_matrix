<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
<title>Marcet Me</title>
<link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/bootstrap-theme.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/jquerysctipttop.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/default.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/component.css') }}" />
<link rel="stylesheet" href="{{ asset('/css/flexisel.css') }}">
<link rel="stylesheet" href="{{ asset('/css/style-slider.css') }}">
<link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/simpleMobileMenu.css') }}" />
<link rel="stylesheet" href="{{ asset('/css/easy-responsive-tabs.css') }}">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<!--js section-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{ asset('/js/bootstrap.js') }}"></script>
<script src="{{ asset('/js/modernizr.custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/jquery-1.10.2.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/jquery.flexisel.js') }}"></script> 
<script src="{{ asset('/js/social-buttons.js') }}"></script>


<!--js section-->

</head>
<body>

<div class="main_div">

<div class="header_top_section">
<!--header_top_section-->

<div class="header_section">
<div class="container">
<ul>

@if (Auth::check())
<li><a href="{{action('UserController@boxes')}}">My Account</a></li>
<li><a href="{{ action('UserController@getLogout')}}">Logout</a>
</li>
<li><span><span>Welcome,{{Auth::user()->name}}</span></span></li>
@else

<li><a href="{{action('UserController@register')}}">Join</a></li>
<li><a href="{{ action('UserController@getLoginUser')}}">Login</a></li>
@endif
<li>/</li>
<li>Menu</li>
<li>	
<!--<img src="images/menu_arrow.png" border="0" alt="" />-->
<div class="navigation">
			<nav>
				<a href="javascript:void(0)" class="smobitrigger ion-navicon-round cross_btn"><span>Menu</span></a>
				<ul class="mobimenu">
					<li><a href="{{action('HomeController@index')}}">Home</a></li>
          <li><a href="{{action('ArticleController@index')}}">Starting a New career or job</a></li>
          <li><a href="{{action('SuccessController@getBusinessSuccess')}}">Business Successes</a></li>
          <li><a href="{{url('family-and-work',['id'=>2])}}">Family and Work</a></li>
          <li><a href="{{action('BusinessController@getBusiness')}}">add a business or career</a></li>
					<!--<li><a href="{{url('about-us',['id'=>1])}}">About Me</a></li>-->
					<li><a href="{{action('BlogController@contactUs')}}">Contact Me</a></li>
                    <li class="no_bg">
                   <!--<a href="{{url('services',['id'=>2,])}}">Our Services</a>-->
                    <a href="#">Our Services</a></li>
                    <ul class="service_ul">


   



                     @foreach ($allcategory as $index=>$cat) 
                    <li><a href="{{action('BusinessController@getBusinessByCategory',['categoryId'=>$cat->id,'categoryName'=>$cat->id])}}">{{ $cat->title }}</a></li>
                      @endforeach    
                    
                    </ul>
                    </li>
				</ul>
			</nav>
		</div>		
</li>
</ul>
</div>
</div>

<!--header_top_section-->

<!--header_bottom_section-->

<div class="header_bottom">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="col-md-4">
@if (Auth::check())
<a href="{{ url('home') }}"><img src="{{asset('images/logo.png')}}" alt="Marcet Me" border="0" title="Marcet Me" /></a>
@else
<a href="{{ url('home') }}"><img src="{{ asset('images/logo.png')}}" alt="Marcet Me" border="0" title="Marcet Me" /></a>
@endif
</div>
<div class="col-md-8">
<form class="header_search" method="GET" action="{{ action('BusinessController@searchProduct') }}" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
<!--<input type="text" placeholder="Search Services/Products" name="search" />-->
<input type="text" name="keyword" id="keyword" placeholder="Search Services/Products" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Services/Products'" />
<button type="submit"><i class="fa fa-search"></i></button>
</form>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>

<!--header_bottom_section-->
<div class="clearfix"></div>
</div>

<!--header_full_section-->

