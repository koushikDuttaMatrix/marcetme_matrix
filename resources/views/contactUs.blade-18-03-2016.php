@extends('layouts.registerApp')

@section('content')
<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner login_carousel">
    <div class="item active"> <img src="{{asset('images/login_banner.jpg')}}" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <h1>Contact Us</h1>
        </div>
      </div>
    </div>
  </div>
  
</div>

<!--slider_section-->



</div>

<!--header_full_section-->

<!--breadcrumb_section-->

<div class="breadcrumb_section">
<div class="container">
<ul>
<li>home</li>  
<li>Contact Us</li>
</ul>
</div>
</div>

<!--breadcrumb_section-->


<!--login_section-->
<div>

</div>


<div class="login_section">
<div class="container">
<div class="col-md-12 registration_section">
<!-- <h2>Business</h2>
<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam</p>
this section show error message 
@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif-->

<!-- this section show error message -->



<p></p>
<!-- this section show error message -->
@if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          @if (Session::has('alert-success-message'))
<div class="alert alert-success">
  <!-- <strong>Whoops!</strong> There were some problems with your input.<br><br> -->
  <strong>Success!</strong>{{ Session::get('alert-success-message') }} 
      
    
</div>
@endif


<!-- this section show error message -->

<form class="login_form" method="POST" action="{{ action('BlogController@contactUs') }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
<p>
<i class="fa fa-user"></i>
<input type="text" name="name" id="name" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" value="{{old('name')}}" />
</p>
<!--<p>
<i class="fa fa-code"></i>
<input type="text" name="country_code" id="country_code" placeholder="Country Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Country Code'" value="{{old('country_code')}}" />
</p>-->
<!-- new code added -->











<!-- new code added -->
<p>
<i class="fa fa-mail"></i>
<input type="text" name="email" id="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email" value="{{old('email')}}" />
</p>
<div class="form-group">
  <label for="comment">Address:</label>
  <textarea class="form-control" rows="5" id="address" name="address">{{old('address')}}</textarea>
</div>
<!--google map code added this section-->
<div>
      <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:438px;width:700px;'><div id='gmap_canvas' style='height:438px;width:700px;'></div><div><small><a href="http://embedgooglemaps.com">                 embed google map              </a></small></div><div><small><a href="http://freedirectorysubmissionsites.com/">reedirectorysubmissionsites.com</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(51.4372069992009,0.3171879890625151),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(51.4372069992009,0.3171879890625151)});infowindow = new google.maps.InfoWindow({content:'<strong>Title</strong><br>London, United Kingdom<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
    </div>  
    <!--google map code added this section-->
<p class="login_btn"><button type="submit">Send</button></p>
</form>
     
    
      
      
      
     
     
      
   <!--/row-->    
  <!--/col-12-->
<!--/row-->

















  
</div>

</div>
</div>

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
<div class="about_section_right">
<div class="iner_home_back_hbgl">
<h3>Talked About</h3>
<ul>
<li>
<div class="img_section"><img src="{{ url('images/talk_img1.jpg')}}" alt="" border="0" /></div>
<div class="txt_section">
<p>Competitions: what can you win?</p>
<span><i class="fa fa-user"></i>Posted By: Admin</span>
</div>
<div class="clearfix"></div>
</li>
<li>
<div class="img_section"><img src="{{ url('images/talk_img2.jpg')}}" alt="" border="0" /></div>
<div class="txt_section">
<p>Competitions: what can you win?</p>
<span><i class="fa fa-user"></i>Posted By: Admin</span>
</div>
<div class="clearfix"></div>
</li>
<li>
<div class="img_section"><img src="{{ url('images/talk_img3.jpg')}}" alt="" border="0" /></div>
<div class="txt_section">
<p>Competitions: what can you win?</p>
<span><i class="fa fa-user"></i>Posted By: Admin</span>
</div>
<div class="clearfix"></div>
</li>
</ul>
</div>
</div>
<div class="clearfix"></div>
</div>
@endsection