
@extends('layouts.registerApp')

@section('content')
<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner login_carousel">
    <div class="item active"> <img src="{{asset('images/login_banner.jpg')}}" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <h1>Business Successes</h1>
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
<div class="row">
    <div class="col-md-6">
        <ul>
        <li>home</li>  
        <li>Business Successes</li>
        </ul>
    </div>
    <!--<div class="col-md-6">
      <div class="pull-right add_btn_area">
        <a href="{{action('BusinessController@getBusiness')}}" class="add_btn">Add Business</a>
        </div>
    </div>-->
</div>
</div>
</div>

<!--breadcrumb_section-->


<!--login_section-->

<div class="article_section">
<div class="container">

<div class="col-md-9 article_left">
@if(isset($errorMessage))
<div class="custom_error">{{$errorMessage}}</div>
@else
@endif
<!-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam</p>
this section show error message -->
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
@for($i=0;$i<count($business);$i++)

<div class="business_block">
<div class="row">
  <div class="col-md-4">
      <div class="img">
        <img src=" {{ url('timthumb/timthumb.php').'?src=/success_images/'.$business[$i]['image'].'&w=271&h=160&q=100' }}" alt="Cinque Terre" >
        </div>
       



    </div>
    <div class="col-md-8">
      <div class="title">
        <a href="javascript:void(0)" >  {{$business[$i]['title']}}</a>
        </div>
        <div class="des">
        <i class="fa fa-quote-left"></i>
         {!!  $business[$i]['description']!!}
         <i class="fa fa-quote-right"></i>
        </div>
        
    </div>
</div>
</div>
@endfor
{!!$render!!}
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