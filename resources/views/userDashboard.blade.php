@extends('layouts.registerApp')

@section('content')
<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner login_carousel">
    <div class="item active"> <img src="images/login_banner.jpg" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <h1>Dashboard</h1>
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
<li>Dashboard</li>
</ul>
</div>
</div>

<!--breadcrumb_section-->


<!--login_section-->



<div class="article_section">
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

 <h2 class="user"><i class="fa fa-user"></i> Welcome, <span>{{$username}}</span></h2> 
  
 <div class="cont_d">
 	<div class="row">
          <div class="col-md-6">
          <div class="add_business">
          <a href={{action('BusinessController@viewBusiness')}}>
          	 <div class="icon"><i class="fa fa-briefcase"></i></div>
             <h4><span class="label label-success pull-right"></span>Manage Services </h4></a>
          </div>
          </div>
          <div class="col-md-6">
            <div class="edit_profile">
            <a href={{action('UserController@editUser')}}>
              <div class="icon"><i class="fa fa-pencil-square-o"></i></div>
              <h4><span class="label label-success pull-right"></span> Manage Profile </h4></a>
            </div>
          </div>
     </div>
     <div class="row">
          <div class="col-md-6">
            <div class="search_service">
              <a href="{{action('BusinessController@advanceSearch')}}"><div class="icon"><i class="fa fa-search"></i></div>
              <h4><span class="label label-success pull-right"></span> Search Services </h4></a> 
            </div>
          </div>
          <div class="col-md-6">
            <div class="manage_blog">
             <a href="{{action('BlogController@manageBlog')}}"> <div class="icon"><i class="fa fa-file-text-o"></i></div>
              <h4 class="text-success"><span class="label label-success pull-right"></span> Manage Blogs </h4></a>
            </div>
          </div>
    </div>
 </div>    
      
   <!--/row-->    
  <!--/col-12-->
<!--/row-->

















  
</div>

@include('layouts/sideBar')

</div>
<div class="clear"></div>
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