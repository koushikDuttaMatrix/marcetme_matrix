
@extends('layouts.registerApp')

@section('content')
<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner login_carousel">
    <div class="item active"> <img src="{{asset('images/login_banner.jpg')}}" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <h1>Business Detail</h1>
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
<li>{{ $business[0]['title'] }}</li>
</ul>
</div>
</div>

<!--breadcrumb_section-->


<!--login_section-->

<div class="article_section">
<div class="container">

<div class="col-md-9 article_left article_details">
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
    
    <div class="deatils_image">
    	<div class="row">
        	<div class="col-md-6 deatils_image_area"><img id="bigImage" src="{{url('timthumb/timthumb.php').'?src=/business_images/'.$business[0]['image_upload'].'&w=271&h=135&q=100'}}" alt="" border="0" />
            <ul class="business_ul">
            @if(isset($business[0]['image_thumb_multi']))
             @foreach($business[0]['image_thumb_multi'] as $thumbImages) 

            <li><a href="javascript:void(0);" class="thumbClass" image="{{$thumbImages}}"><img  src="{{url('timthumb/timthumb.php').'?src=/business_images/'.$thumbImages.'&w=60&h=60&q=100'}}" alt="" border="0" /></a></li>
            @endforeach
            @endif
            </ul>
            </div>

            
            <div class="col-md-6">
            	<h4 class="deatils_heading">{{ $business[0]['title'] }}</h4>
                <div class="details_contact">
                    <span><i class="fa fa-phone"></i> {{ $business[0]['phone'] }}</span>
                </div>
                <div class="details_contact">
                  <!--  <span><i class="fa fa-envelope"></i> info@marcet.com</span>-->
                </div>
                <div class="details_contact">
                    <span><i class="fa fa-map-marker"></i> {{ $business[0]['address'] }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="des"><p>{!! $business[0]['description']  !!}</p></div>
    <div class="map" style="display:none;">
    <!--	<iframe frameborder="0" height="258" marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com/maps?hl=en&amp;q=London, United Kingdom&amp;ie=UTF8&amp;t=m&amp;z=10&amp;iwloc=B&amp;output=embed" width="100%"></iframe>-->
    </div>
</div>

@include('layouts/sideBar')

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