
@extends('layouts.registerApp')

@section('content')
<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner login_carousel">
    <div class="item active"> <img src="images/login_banner.jpg" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <h1>Edit User</h1>
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
<li>Edit User</li>
</ul>
</div>
</div>

<!--breadcrumb_section-->


<!--login_section-->

<div class="login_section">
<div class="container">
<div class="col-md-12 registration_section">
<h2>Edit User</h2>
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

<form class="login_form" method="POST" action="{{ action('UserController@editUser') }}" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<p>
<i class="fa fa-user"></i>
<input type="text" name="name" id="name" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" value="{{$name}}" />
</p>
<!--<p>
<i class="fa fa-code"></i>
<input type="text" name="country_code" id="country_code" placeholder="Country Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Country Code'" value="{{old('country_code')}}" />
</p>-->
<!-- new code added -->

<p>
<i class="fa fa-globe"></i>
<select id="country" name="country">
   <option>Select One</option>
   @for($i=0;$i<count($countryValue);$i++)
   <option value="{{$countryValue[$i]['countryID']}}"
   @if($country==$countryValue[$i]['countryID'])
   selected
   @endif
   >{{$countryValue[$i]['countryName']}}</option>
   @endfor
</select>
</p>


<p>
<i class="fa fa-map"></i>
<select id="state" name="state">
    <option>Select One</option>
    @for($i=0;$i<count($stateValue);$i++)
   <option value="{{$stateValue[$i]['stateID']}}"
   @if($state==$stateValue[$i]['stateID'])
   selected
   @endif
   >{{$stateValue[$i]['stateName']}}</option>
   @endfor
</select>
</p>


<p>
<i class="fa fa-map-marker"></i>
<select id="city" name="city">
    <option>Select One</option>
    @for($i=0;$i<count($cityValue);$i++)
   <option value="{{$cityValue[$i]['cityID']}}"
   @if($city==$cityValue[$i]['cityID'])
   selected
   @endif
   >{{$cityValue[$i]['cityName']}}</option>
   @endfor
</select>
</p>


<p>
<i class="fa fa-user"></i>
<input type="text" name="zip" id="zip" placeholder="Zip" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Zip'" value="{{$zip}}" />
</p>

<!-- new code added -->
<p>
<i class="fa fa-phone"></i>
<input type="text" name="phone_number" id="phone_number" placeholder="Phone No" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone No'" value="{{$phone_number}}" />
</p>
<p>
<i class="fa fa-cloud-upload tarfa"></i>
<input type="file" name="profile_picture" id="profile_picture">
</p>
<!--<div class="captcha_p">
<span><img src="images/captcha.jpg" alt="" border="0" /><a href="#">Can't read? Reload</a></span>
<p><i class="fa fa-key"></i>
<input type="text" placeholder="Enter security code shown above:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter security code shown above:'" /></p>
</div>-->
<!--<p class="registration_checkbox"><input type="checkbox" name="terms" id="terms" />I agree with <a href="#">Terms & Conditions</a></p >-->
<p class="login_btn"><button type="submit">Submit</button></p>
</form>
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
@include('layouts/footerArticle')
<div class="clearfix"></div>
</div>
@endsection