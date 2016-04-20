@extends('layouts.registerApp')

@section('content')
<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner login_carousel">
    <div class="item active"> <img src="{{asset('images/login_banner.jpg')}}" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <h1>Add Blog</h1>
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
        <li>Add Blog</li>
        </ul>
    </div>
    <div class="col-md-6">
    	<div class="pull-right add_btn_area">
    		<a class="add_btn" href="{{action('BlogController@manageBlog')}}">Back to List</a> 
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
            
            <form class="login_form" method="POST" action="{{ action('BlogController@addBlog') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <p>
            <i class="fa fa-user"></i>
            <input type="text" name="title" id="title" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" value="{{old('title')}}" />
            </p>
            
            <p class="tarea" style="height: auto;">
            
            <textarea rows="5" id="descriptionBlog" name="description" placeholder="Description" style="resize:none; padding:10px 15px;">{{old('description')}}</textarea>
            </p>


            




            <div class='box-body pad' style="margin-bottom: 20px;">
                                <label for="exampleInputDescription">File Type</label>
                                <input type="radio" name="file_type" id="image" checked="checked" value="image"> Image
                                <input type="radio" name="file_type" id="video" value="video"> Video
                        </div>  
                        
                         <p class="imageDiv">
                       <i class="fa fa-cloud-upload tarfa"></i>
                       <input type="file" name="image" id="image">
                       </p> 
                        <div class="videoDiv" style="display:none">
                        <div class='box-body pad' style="margin-bottom: 10px;">
                                <label for="exampleInputDescription">Video Type</label>
                                <select name="video_type"  id="video_type" >
                                <option value="">Select One</option>
                                <option value="youtube">Youtube</option>
                                <option value="vimeo">Vimeo</option>
                                 
                                </select>
                        </div>
                        <div class='box-body pad' style="background: #e1e1e1; border: 1px solid #d1d1d1; margin-bottom: 10px; padding: 10px;">
                            <strong>Example Youtube Link Format :</strong> https://www.youtube.com/watch?v=0pDokevQsAU 
                            </br>
                            <strong>Example Vimeo Link Format :</strong>  https://vimeo.com/7256322
                        </div>
                        <div class='box-body pad embedText' style="display:none; margin-bottom: 10px;">
                                <label for="exampleInputDescription">Embed link</label>
                                <input type="text" name="embed_link" id="embed_link" class="form-control" />
                        </div> 

                        </div>
            
            <!--<div class="captcha_p">
            <span><img src="images/captcha.jpg" alt="" border="0" /><a href="#">Can't read? Reload</a></span>
            <p><i class="fa fa-key"></i>
            <input type="text" placeholder="Enter security code shown above:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter security code shown above:'" /></p>
            </div>-->
            <p class="login_btn"><button type="submit">Submit</button></p>
            </form>
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
@include('footerBlog')
<div class="clearfix"></div>
</div>
@endsection