@extends('layouts.registerApp')

@section('content')
<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner login_carousel">
    <div class="item active"> <img src="{{asset('images/login_banner.jpg')}}" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <h1>{{$cmsTitle}}</h1>
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
<li>{{$cmsTitle}}</li>
</ul>
</div>
</div>

<!--breadcrumb_section-->


<!--login_section-->
<div>

</div>


<div class="login_section">
<div class="container">
<div class="col-md-9 article_left">
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

  {!!$cmsDescription!!}
  
     
      
      
      
      
     
     
      
   <!--/row-->    
  <!--/col-12-->
<!--/row-->

















  
</div>

<div class="col-md-3 article_right">
<div class="recent_article">
<div class="recent_header">
<img src="{{asset('images/recent_article.png')}}" alt="" border="0" />
<span>Recent blog</span>
</div>
<ul>
@foreach ($latest_blog_list as $latestblogkey=>$latestblog) 
<li>
<div class="article_img"><img src="{{asset('images/article_1.jpg')}}" alt="" border="0" /></div>
<div class="article_txt"><h5>{{ $latestblog->title }}</h5>
<p>{{ substr( strip_tags($latestblog->description) ,0,20) }}...</p>
<span><i class="fa fa-calendar-check-o"></i>March 22, 2016</span></div>
<div class="clearfix"></div>
</li>
@endforeach 

</ul>
</div>
<div class="recent_article">
<div class="recent_header">
<img src="{{asset('images/categories_header.png')}}" alt="" border="0" />
<span>categories</span>
</div>
<ul class="categories_ul">
@foreach ($allcategory as $index=>$cat) 
                    <li><a href="{{action('BusinessController@getBusinessByCategory',['categoryId'=>$cat->id,'categoryName'=>$cat->id])}}">{{ $cat->title }}</a></li>
                      @endforeach  
</ul>
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