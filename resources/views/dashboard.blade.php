@extends('layouts.registerApp')

@section('content')
<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner login_carousel">
    <div class="item active"> <img src="images/login_banner.jpg" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <h1>Add Business</h1>
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
<li>Add Business</li>
</ul>
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
            <form class="login_form" method="POST" action="{{ action('BusinessController@getBusiness') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <p>
                <i class="fa fa-user"></i>
                <input type="text" name="title" id="title" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" value="{{old('title')}}" />
                </p>
                
                <p class="tarea">
                  <i class="fa fa-sticky-note-o tarfa"></i>
                  <textarea rows="5" id="description" placeholder="Description" name="description" style="resize:none; padding:10px 15px;">{{old('description')}}</textarea>
                </p>
                
                <!--<p>
                  <i class="fa fa-cloud-upload tarfa"></i>
                   <input type="file" name="image_upload" id="image_upload" {{old('image_upload')}} />
       			</p>-->
                <div id="formdiv box-body pad"  class="multiBannerUpload" style="padding:0" >
                <label for="exampleInputZipcode"> Business Image Upload Up to 5</label>
                  <i class="fa fa-cloud-upload tarfa"></i>
                  <div class="clear"></div>
                  <div id="filediv" ><input name="file[]" type="file" id="file" class="fileUpld" multiple="true" />
                  
                  </div>
                <input type="button" id="add_more" class="upload" value="Add More File"/>
                <input type="hidden" value="0" name="imageno" id="imageno" />
                </div>
                 
              <!-- this area for multiple image upload section



            this area for multiple image upload section -->



                
                <p class="tarea">
                  <i class="fa fa-map-marker tarfa"></i>
                  <textarea rows="5" id="address" placeholder="Address" name="address" style="resize:none; padding:10px 15px;">{{old('address')}}</textarea>
                </p>
                
                <p>
                <i class="fa fa-phone"></i>
                <input type="text" name="phone" id="phone" placeholder="Phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'" value="{{old('phone')}}" />
                </p>
                
                
                <p>
                <i class="fa fa-globe"></i>
                   <select id="country" name="country" >
                   <option>Select Country</option>
                   @for($i=0;$i<count($countryValue);$i++)
                   <option value="{{$countryValue[$i]['countryID']}}"
                   @if(old('country')==$countryValue[$i]['countryID'])
                   selected
                   @endif
                   >{{$countryValue[$i]['countryName']}}</option>
                   @endfor
                  </select>
                  @if(old('country'))
                  <input type="hidden" name="errorMode" id="errorMode" value="{{old('country')}}" />
                  @else
                   <input type="hidden" name="errorMode" id="errorMode" value="0" />
                  @endif
                </p>
                
                <p>
                <i class="fa fa-map"></i>
                   <select id="state" name="state">
                    <option>Select State</option>
                  </select>
                </p>
                
                <p>
                <i class="fa fa-map-signs"></i>
                  <select id="city" name="city">
                    <option>Select City</option>  
                  </select>
                </p>
 
                <p>
                <i class="fa fa-map-pin"></i>
                <input type="text" name="zip" id="zip" placeholder="Zip" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Zip'" value="{{old('zip')}}" />
                </p>
                
                <p>
                <i class="fa fa-th"></i>
                  <select id="category_id" name="category_id">
                  <option>Select One</option>
                   @for($i=0;$i<count($categoryValue);$i++)
                   
                   <option value="{{$categoryValue[$i]['id']}}"
                   @if(old('category_id')==$categoryValue[$i]['id'])
                   selected
                   @endif
                   >{{$categoryValue[$i]['title']}}</option>
                   @endfor
                  </select>
                </p>
                <div class="captcha_p">
<span id="captchaImage">
{!!captcha_img()!!}
<a href="javascript:void(0);" id="reloadCaptcha">Can't read? Reload</a></span>
<p><i class="fa fa-key"></i>
<input type="text" placeholder="Enter security code shown above:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter security code shown above:'" name="captcha" id="captcha" /></p>
</div>
                <!--<div class="captcha_p">
                <span><img src="images/captcha.jpg" alt="" border="0" /><a href="#">Can't read? Reload</a></span>
                <p><i class="fa fa-key"></i>
                <input type="text" placeholder="Enter security code shown above:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter security code shown above:'" /></p>
                </div>-->
                
                <p class="registration_checkbox"><input type="checkbox" name="terms" id="terms" />I agree with <a href="#">Terms & Conditions</a></p >
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
@include('layouts/footerArticle')
<div class="clearfix"></div>
</div>
@endsection