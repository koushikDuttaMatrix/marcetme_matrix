@extends('layouts.registerApp')

@section('content')
<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner login_carousel">
    <div class="item active"> <img src="images/login_banner.jpg" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <h1>Manage Blog</h1>
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
        <li>Manage Blog</li>
        </ul>
    </div>
    <div class="col-md-6">
    	<div class="pull-right add_btn_area">
    		<a class="add_btn" href="{{action('BlogController@addBlog')}}" style="float:right">Add New Blog</a>
        </div>
    </div>
</div>
</div>
</div>

<!--breadcrumb_section-->


<!--login_section-->

<div class="article_section">
<div class="container">
<div class="col-md-9 article_left">
<div class="page-wrap">
    <div class="form-area"> 
        <div class="manage_blg_area">
        	<div class="table-responsive">
            	<table class="table">
                	<thead>
                    	<tr>
                            <th>Sl.</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    	@if (count($blog) >0)
                	    @foreach ($blog as $index=>$blg)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$blg->title}}</td>
                            <td><a href="{{action('BlogController@editBlog',['id'=>$blg->id])}}" title="Edit"><i class="fa fa-pencil-square-o"></i></a></td>
                        </tr>
                        @endforeach 
                  		@else
                        <tr><td align="center" colspan="3" class="custom_error"> No Records Found!</td></tr>
                		@endif            
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">   
                {!! $blog->render() !!}               
             </div>
        </div>
    </div>
</div>
</div>


@include('layouts/sideBar')
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