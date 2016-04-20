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


<div class="article_section">
    <div class="container">
         <div class="col-md-7 article_left">
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
                <i class="fa fa-envelope"></i>
                <input type="text" name="email" id="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email" value="{{old('email')}}" />
                </p>
                
                <p class="tarea">
                <i class="fa fa-map-marker tarfa"></i>
                <textarea placeholder="Address" rows="5" id="address" name="address"  style="resize:none; padding:10px 15px;">{{old('address')}}</textarea>
                </p>
                
                <!--google map code added this section-->
                  
                    <!--google map code added this section-->
                <p class="login_btn"><button type="submit">Send</button></p>
            </form>
            
         </div>
         <div class="col-md-5 article_right">
         	<div class="location">
            	<h2>Location</h2>
                <div class="details_contact">
                    <span><i class="fa fa-phone"></i> 033-20164-200</span>
                </div>
                <div class="details_contact">
                    <span><i class="fa fa-envelope"></i> info@marcet.com</span>
                </div>
                <div class="details_contact">
                    <span><i class="fa fa-map-marker"></i> 1600, Mountain View, Palo Alto Califonia,United States</span>
                </div>
            </div>
         	<div>
                     <iframe frameborder="0" height="258" marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com/maps?hl=en&amp;q=London, United Kingdom&amp;ie=UTF8&amp;t=m&amp;z=10&amp;iwloc=B&amp;output=embed" width="100%"></iframe>
                    </div>
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