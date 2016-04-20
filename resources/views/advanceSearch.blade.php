
@extends('layouts.registerApp')

@section('content')
<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner login_carousel">
    <div class="item active"> <img src="{{asset('images/login_banner.jpg')}}" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <h1>Advance Search</h1>
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
<li>Advance Search</li>
</ul>
</div>
</div>

<!--breadcrumb_section-->


<!--login_section-->

<div class="login_section">
<div class="container">
<div class="col-md-9 article_left">

<!-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam</p>
this section show error message -->
<form class="login_form" method="GET" action="{{ action('BusinessController@searchProduct') }}" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
<p>
<i class="fa fa-user"></i>
<input type="text" name="keyword" id="keyword" placeholder="keyword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Keyword'" value="{{old('keyword')}}" />
</p>

<p>
<i class="fa fa-th"></i>
<select id="category" name="category">
<option>Select Keyword</option>
@for($i=0;$i<count($categoryValue);$i++)

<option value="{{$categoryValue[$i]['title']}}"
>{{$categoryValue[$i]['title']}}</option>
@endfor
</select>
</p>

<p class="login_btn"><button type="submit">Search</button></p>
</form>
<div class="clearfix"></div>







<!-- 
this html copy from registration page....
-->


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