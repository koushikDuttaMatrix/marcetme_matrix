@extends('layouts.default')

@section('content')

<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner">
    <div class="item active"> <img src="{{ url('images/slider.jpg') }}" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <!--<a href="{{ url('home') }}"><img src="{{asset('images/logo.png')}}" alt="Marcet Me" border="0" title="Marcet Me" /></a>
          <h2>Marcet guide to teenage slang</h2>-->
          <h1>MARCETME.COM</h1>
          <p>Want to become A member</p>
		  @if(!Auth::check())
          <p class="btn_section"><a class="btn btn-lg btn-primary" href="{{action('UserController@register')}}" role="button">Sign Up</a></p>
		  @endif
           <p class="btn_section"><a class="btn btn-lg btn-primary btn-primary_2" href="{{url('talked-about-today',['id'=>6,])}}" role="button">TALKED ABOUT TODAY</a></p>
        </div>
      </div>
    </div>
    
  </div>
  
</div>

<!--slider_section-->



<!--service_section-->

<div class="service_section">
<div class="row">
<div class="container">
<!--<div class="carousel_btn">Our Services</div>-->
<ul id="flexiselDemo3">
	<?php $pos=1; ?>
	@foreach ($allcategory as $index=>$cat) 
		<li>
        	<div class="sc_pan fc_dgreen">
            <div class="carecter">
			<a href="{{action('BusinessController@getBusinessByCategory',['categoryId'=>$cat->id,'categoryName'=>$cat->id])}}" >
			<img src="{{ url('category_images/'.$cat->image) }}">
			</a>
			</div>
            <h4>{{ $cat->title }}</h4>
            </div>
        </li>
		<?php
		$pos = ($pos%6==0?0:$pos);
		$pos++; 
		?>
	@endforeach	
       <!-- <li>
        	<div class="sc_pan fc_dgreen">
            <div class="carecter"><img src="{{ url('images/img1.png') }}" ></div>
            <h4>Child</h4>
            </div>
        </li>
        <li>
        	<div class="sc_pan fc_pink">
            <div class="carecter"><img src="{{ url('images/img2.png') }}" ></div>
           <h4>Baby</h4>
            </div>
        </li>
        <li>
        	<div class="sc_pan fc_orange">
            <div class="carecter"><img src="{{ url('images/img3.png') }}" ></div>
             <h4>Education</h4>
            </div>
        </li>
        <li>
        	<div class="sc_pan fc_green">
            <div class="carecter"><img src="{{ url('images/img4.png') }}" ></div>
            <h4>Food</h4>
            </div>
        </li>
        <li>
        	<div class="sc_pan fc_red">
            <div class="carecter"><img src="{{ url('images/img5.png') }}" ></div>
             <h4>Money</h4>
            </div>
        </li> 
        <li>
        	<div class="sc_pan fc_purpel">
            <div class="carecter"><img src="{{ url('images/img6.png') }}" ></div>
            <h4>Work</h4>
            </div>
        </li> -->                                      	    	  	       	   	    	
	</ul>
</div>
<div class="clearfix"></div> 
</div>
<div class="clearfix"></div> 
</div>

<!--service_section-->

</div>

<!--header_full_section-->

<!--blog_tab_section-->

<div class="blog_section">
<div class="row">
<div class="container">
<div class="demo">
<div id="horizontalTab">
<ul class="resp-tabs-list">
<li>Blog</li>
<li>Article</li>
</ul>
<p class="title_tab">See our Popular stories</p>
<div class="resp-tabs-container">

<div>
<ul class="tab_border_section">

@foreach ($latestBlogs as $index=>$blog) 
<li>
<a href="{{ url('blog/'.$blog->id) }}/{!! str_replace(' ', '-', $blog->title) !!}">
<div class="tab_img">

@if($blog->file_type=="image")
<img src="{{ url('timthumb/timthumb.php').'?src=/blog_images/'.$blog->image.'&w=271&h=135&q=100' }}" alt="" border="0" />
@elseif($blog->file_type=="video")
@if($blog->video_type=="youtube")
<img src="{{ url('timthumb/timthumb.php').'?src='.$blog->embed_link.'&w=271&h=135&q=100' }}" alt="" border="0"  />
@elseif($blog->video_type=="vimeo")
<img src="{{ url('timthumb/timthumb.php').'?src='.$blog->embed_link.'&w=271&h=135&q=100' }}" alt="" border="0"  />

@endif
@endif





</div>
</a>
<div class="descriptoion_section">
<div class="testi_section">
@if(isset($blog->profile_picture) && $blog->profile_picture!="")
<img src="{{ url('timthumb/timthumb.php').'?src=/user_images/'.$blog->profile_picture.'&w=43&h=43&q=43' }}" alt="" border="0" align="left"/>
@else
<img src="{{ url('images/testi_img.png') }}" alt="" border="0" align="left" />
@endif

<p>"{{ $blog->title }}"</p></div>
<div class="col-lg-12 col-md-12">
<div class="col-md-6">
<i class="fa fa-clock-o"></i>
<span id="blogCreated">{{$blog->estimateDateBlog}} ago
</span>
</div>
<div class="col-md-6 icon_tab">

 <ul>
			<li><a target="_blank" href="http://www.facebook.com/sharer.php?u={{ url('blog/'.$blog->id) }}/{!! str_replace(' ', '-', $blog->title) !!}" class="share-facebook">
			<img src="{{ url('images/facebook.png') }}" alt="" border="0"  />
			</a></li>

			<!-- https://dev.twitter.com/docs/intents -->
			<li><a target="_blank" href="http://twitter.com/share?url={{ url('blog/'.$blog->id) }}/{!! str_replace(' ', '-', $blog->title) !!}&amp;text={{ $blog->title }}&amp;via=MarcetMe" class="share-twitter">
			  <img src="{{ url('images/twitter.png') }}"  alt="" border="0"  />
			</a></li>
			
			<!-- https://developers.google.com/+/web/share/ -->
			<li><a target="_blank" href="http://plus.google.com/share?url={{ url('blog/'.$blog->id) }}/{!! str_replace(' ', '-', $blog->title) !!}" class="share-google">
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

<div>
<ul class="tab_border_section">

@foreach ($latestArticles as $index=>$article) 
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



</div>
</a>
<div class="descriptoion_section">
<div class="testi_section">
@if(isset($article->profile_picture))
<img src="{{ url('timthumb/timthumb.php').'?src=/user_images/'.$article->profile_picture.'&w=43&h=43&q=43' }}" alt="" border="0" align="left"/>
@else
<img src="{{ url('images/testi_img.png') }}" alt="" border="0" align="left" />
@endif

<p>"{{ $article->title }}"</p></div>
<div class="col-lg-12 col-md-12">
<div class="col-md-6">
<i class="fa fa-clock-o"></i>
<span id="articleCreated">{{ $article->estimateDateArticle }} ago
</span>
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

</div>
</div>

</div>
</div>
<div class="clearfix"></div>
</div>
</div>

<!--blog_tab_section-->

@endsection