@extends('layouts.default')

@section('content')

<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner login_carousel">
    <div class="item active"> <img src="{{ url('images/login_banner.jpg')}}" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <h1>Blog </h1>
        </div>
      </div>
    </div>
  </div>
  
</div>

<!--slider_section-->



</div>

<div class="breadcrumb_section details_breadcrumb_section">
<div class="container">
<ul>
<li><a href="{{ url() }}">home</a></li>  
<li><a href="{{ url('blogs')}}">blog</a></li>
<li>{{ $blog->title }}</li>
</ul>
</div>
</div>

<!--breadcrumb_section-->

<!--article_section-->

<div class="article_section">
<div class="container">
<div class="col-md-9 article_left article_details">
<img src="{{ url('blog_images/'.$blog->image) }}" alt="" border="0" />
<h4>{{ $blog->title }}</h4>
<p class="p_admin"><i class="fa fa-user"></i>Admin <i class="fa fa-comments"></i>Leave a comment</p>
<p>{!! html_entity_decode($blog->description) !!}</p>
<!--
<p class="tag_p">
<i class="fa fa-tags"></i>Tags : <span><a href="#">tag1</a>, <a href="#">tag2</a>, <a href="#">tag3</a></span>
</p>-->
</div>
<div class="col-md-3 article_right">
<div class="recent_article">
<div class="recent_header">
<img src="{{ url('images/recent_article.png') }}" alt="" border="0" />
<span>Recent blog</span>
</div>
<ul>
@foreach ($latest_blog_list as $latestblogkey=>$latestblog) 
<li>
<div class="article_img"><img src="{{ url('timthumb/timthumb.php').'?src=/blog_images/'.$latestblog->image.'&w=72&h=50&q=100' }}" alt="" border="0" /></div>
<div class="article_txt"><h5>{{ $latestblog->title }}</h5>
<p>{{ substr(strip_tags($latestblog->description),0,20) }}...</p>
<span><i class="fa fa-calendar-check-o"></i>March 22, 2016</span></div>
<div class="clearfix"></div>
</li>
@endforeach	

</ul>
</div>
<div class="recent_article">
<div class="recent_header">
<img src="{{ url('images/categories_header.png') }}" alt="" border="0" />
<span>categories</span>
</div>
<ul class="categories_ul">
<li><a href="#">Baby</a></li>
<li><a href="#">Education</a></li>
<li><a href="#">Food</a></li>
<li><a href="#">Money</a></li>
<li><a href="#">Work</a></li>
<li><a href="#">Child</a></li>
</ul>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>

<!--article_section-->
@endsection