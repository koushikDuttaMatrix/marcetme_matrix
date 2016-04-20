@extends('layouts.default')

@section('content')

<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner login_carousel">
    <div class="item active"> <img src="{{ url('images/login_banner.jpg')}}" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <h1>Starting a New career or job</h1>
        </div>
      </div>
    </div>
  </div>
</div>

<!--slider_section-->



</div>

<!--breadcrumb_section-->

<div class="breadcrumb_section">
<div class="container">
<ul>
<li>home</li>  
<li>Starting a New career or job</li>
</ul>
</div>
</div>

<!--breadcrumb_section-->

<!--article_section-->

<div class="article_section">
<div class="container">
<div class="col-md-9 article_left">

<ul class="tab_border_section article_ul">

@foreach ($articles as $index=>$article) 
<li>
<a href="{{ url('article/'.$article->id) }}/{!! str_replace(' ', '-', $article->title) !!}">
<div class="tab_img">
@if($article->file_type=="image")
<img src="{{ url('timthumb/timthumb.php').'?src=/article_images/'.$article->image.'&w=271&h=135&q=100' }}" alt="" border="0"  />
@elseif($article->file_type=="video")
@if($article->video_type=="youtube")
<img src="{{ url('timthumb/timthumb.php').'?src='.$article->embed_link.'&w=271&h=135&q=100' }}" alt="" border="0"  />
@elseif($article->video_type=="vimeo")
<img src="{{ url('timthumb/timthumb.php').'?src='.$article->embed_link.'&w=271&h=135&q=100' }}" alt="" border="0"  />
@endif
@endif
</div></a>
<div class="descriptoion_section">
<div class="testi_section"><img src="{{ url('images/testi_img.png') }}" alt="" border="0" align="left" />
<p>"{{ $article->title }}"</p></div>
<div class="col-lg-12 col-md-12">
<div class="col-md-6">
<i class="fa fa-clock-o"></i>
<span>{{$article->estimateDateBlog}} ago</span>
</div>
<div class="col-md-6 icon_tab">

 <ul>
			<li><a target="_blank" href="http://www.facebook.com/sharer.php?u={{ url('article/'.$article->id) }}/{!! str_replace(' ', '-', $article->title) !!}" class="share-facebook">
			<img src="{{ url('images/facebook.png') }}" alt="" border="0"  />
			</a></li>

			<!-- https://dev.twitter.com/docs/intents -->
			<li><a target="_blank" href="http://twitter.com/share?url={{ url('article/'.$article->id) }}/{!! str_replace(' ', '-', $article->title) !!}&amp;text={{ $article->title }}&amp;via=MarcetMe" class="share-twitter">
			  <img src="{{ url('images/twitter.png') }}"  alt="" border="0"  />
			</a></li>
			
			<!-- https://developers.google.com/+/web/share/ -->
			<li><a target="_blank" href="http://plus.google.com/share?url={{ url('article/'.$article->id) }}/{!! str_replace(' ', '-', $article->title) !!}" class="share-google">
			  <!-- Cannot get Google+ share count with JS yet -->
			  <img src="{{ url('images/google.png') }}"  alt="" border="0"  />
			</a></li>
			
 </ul>
 
</div>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>
</li>
@endforeach	

</ul>
</div>

@include('layouts/sideBarArticle')
<div class="clearfix"></div>
</div>
</div>

<!--article_section-->
@endsection