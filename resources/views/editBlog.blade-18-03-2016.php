@extends('layouts.registerApp')

@section('content')
<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner login_carousel">
    <div class="item active"> <img src="{{asset('images/login_banner.jpg')}}" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <h1>Edit Blog</h1>
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
<li>Edit Blog</li>
</ul>
</div>
</div>

<!--breadcrumb_section-->


<!--login_section-->

<div class="login_section">
<div class="container">
<div class="col-md-12 registration_section">
<div class="page-wrap">
    <div class="box-header">
      <a class="btn bg-olive margin pull-right" href="{{action('BlogController@manageBlog')}}"><i class="fa fa-fw fa-compass"></i> Back to List</a>  
    </div>
<h2>Edit Blog</h2>
<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam</p>
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

<!-- this section show error message -->

<form class="login_form" method="POST" action="{{ action('BlogController@addBlog') }}" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<p>
<i class="fa fa-user"></i>
<input type="text" name="title" id="title" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" value="{{$blog->title}}" />
</p>

<div class="form-group">
  <label for="comment">Description :</label>
  <textarea class="form-control" rows="5" id="description" name="description">{{$blog->description}}</textarea>
</div>

<div class="form-group">
      <label for="usr">Name:</label>
      <input type="file" class="form-control" name="image" id="image">
      </br>
                @if ($blog->image != '')
                <img src="{{url('blog_images/'.$blog->image)}} " height="60" width="60">
                @endif
    </div>
<!--<div class="captcha_p">
<span><img src="images/captcha.jpg" alt="" border="0" /><a href="#">Can't read? Reload</a></span>
<p><i class="fa fa-key"></i>
<input type="text" placeholder="Enter security code shown above:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter security code shown above:'" /></p>
</div>-->
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