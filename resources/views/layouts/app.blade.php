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
<li><a href="{{ action('UserController@getLogout')}}">Logout</a></li>
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

<!--<input type="text" placeholder="Search Services/Products" name="search" />-->
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

@yield('content')

<!--about_section-->

<div class="about_section">
<div class="about_section_left">
<div class="iner_nheback">
<!--
<h2>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo</h2>
<p> qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi</p>
<br/>
<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, </p>
-->
{!!html_entity_decode($homecontent)!!}

</div>
</div>
@include('layouts/footerArticle')
<div class="clearfix"></div>
</div>

<!--about_section-->


<!--footer_section-->

<div class="footer_section">

<!--footer_top_section-->

<div class="footer_top_section">
<div class="row">
<div class="container">
<div class="col-md-12">
<div class="col-lg-7">
<ul>
<li><a href="{{url('about-us',['id'=>1,])}}">ABOUT ME</a></li>
<li><a href="{{action('ArticleController@index')}}">ARTICLES</a></li>
<li><a href="{{action('BusinessController@advanceSearch')}}">SEARCH A PRODUCT OR SERVICE</a></li>
<li><a href="{{action('BusinessController@searchProduct')}}">PRODUCTS AND SERVICES NEAR YOU </a></li>
<li><a href="{{action('BlogController@index')}}">BLOGS</a></li>
</ul>
</div>
<div class="col-lg-5">
<ul class="footer_top_ul">
<li><a href="#"><img src="{{ url('images/footer_fb.png') }}" alt="" border="0" title="FACEBOOK"/></a></li>
<li><a href="#"><img src="{{ url('images/footer_tw.png') }}" alt="" border="0" title="TWITTER" /></a></li>
<li><a href="#"><img src="{{ url('images/footer_you.png') }}" alt="" border="0" title="YOUTUBE" /></a></li>
<li><a href="#"><img src="{{ url('images/footer_link.png') }}" alt="" border="0"  title="LINKEDIN"/></a></li>
<li><a href="#"><img src="{{ url('images/footer_instagram.png') }}" alt="" border="0" title="INSTAGRAM"/></a></li>
<li><a href="#"><img src="{{ url('images/footer_google.png') }}" alt="" border="0"  title="GOOGLEPLUS"/></a></li>
</ul>
</div>
<div class="clearfix"></div>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>

<!--footer_top_section-->

<!--footer_bottom_section-->

<div class="footer_bottom_section">
<div class="row">
<div class="container">
Copyright © 2016 MARCET ME Projects. All Rights Reserved.
</div>
</div>
</div>

<!--footer_bottom_section-->

</div>

<!--footer_section-->

<div class="clearfix"></div> 

</div>
    
<!--js section-->

<!--slider section-->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!--slider section-->

<!--menu section-->

<script src="{{ asset('/js/jquery.dlmenu.js') }}"></script>		
<script>
			$(function() {
				$( '#dl-menu' ).dlmenu();
			});
		</script>
        
<!--menu section-->

<!--carousel section-->

<script type="text/javascript">
    
    $(window).load(function() {
    
        $("#flexiselDemo3").flexisel({
            visibleItems:6,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,    		
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: { 
                tablet: { 
                    changePoint:800,
                    visibleItems: 2
                }
            }
        });
		
		
		/*$("#flexiselDemo4").flexisel({
            visibleItems: 5,
            animationSpeed: 1000,
            autoPlay: false,
            autoPlaySpeed: 3000,    		
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: { 
                tablet: { 
                    changePoint:800,
                    visibleItems: 2
                }
            }
        });*/
		
        
    });
    </script>
    
<!--carousel section-->

<!--menu section-->

<script src="{{ asset('/js/simpleMobileMenu.js') }}"></script>

<script type="text/javascript">

		jQuery(document).ready(function($) {
			$('.smobitrigger').smplmnu();
		});

	</script>

<!--menu section-->

<!--tab section-->

<script src="{{ asset('/js/easy-responsive-tabs.js') }}"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
var assetUrl="{{asset('')}}"
</script>

<script src="{{ asset('/js/ajaxApp.js') }}"></script>
<!--tab section-->

</body>
</html>