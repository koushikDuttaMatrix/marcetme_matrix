@extends('layouts.editBusinessApp')

@section('content')
<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner login_carousel">
    <div class="item active"> <img src="images/login_banner.jpg" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <h1>Edit Business</h1>
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
<li>Edit Business</li>
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
            @if (Session::has('alert-success-message'))
              <div class="alert alert-success">
                <!-- <strong>Whoops!</strong> There were some problems with your input.<br><br> -->
                <strong>Success!</strong>{{ Session::get('alert-success-message') }} 
                    
                  
              </div>
              @endif

            <form class="login_form" method="POST" action="{{ action('BusinessController@edit',['id'=>$id]) }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <p>
                <i class="fa fa-user"></i>
                <input type="text" name="title" id="title" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" value="{{$title}}" />
                </p>
                
                <p class="tarea">
                  <i class="fa fa-sticky-note-o tarfa"></i>
                  <textarea rows="5" id="description" placeholder="Description" name="description" style="resize:none; padding:10px 15px;">{{$description}}</textarea>
                </p>
                
                <!--<p>
                  <i class="fa fa-cloud-upload tarfa"></i>
                   <input type="file" name="image_upload" id="image_upload" {{old('image_upload')}} />
       			</p>-->
                <!--<p>
                <div id="formdiv box-body pad"  class="multiBannerUpload" style="padding: 40px 20px;" >
                <label for="exampleInputZipcode"> Business Image Upload Up to 5</label>
                  <i class="fa fa-cloud-upload tarfa"></i>
                  <div id="filediv" ><input name="file[]" type="file" id="file" class="fileUpld" multiple="true" />
                  
                  </div>
                <input type="button" id="add_more" class="upload" value="Add More Files"/>
                <input type="hidden" value="0" name="imageno" id="imageno" />
                <br/>
                </div>
                  </p>-->
              <!-- this area for multiple image upload section



            this area for multiple image upload section -->

<div id="formdiv box-body pad" class="multiBannerUpload" style="padding:0;" >
                <label for="exampleInputBannerImages"> Business Image Upload Up to 5</label>
                <div style="clear:both;"></div>
                
                @foreach ($providerimages as $proimage) 
                <div id="filediv_{{$proimage['id']}}" >
                <div class="abcd" id="abcd">
               
                <img src=" {{ url('timthumb/timthumb.php').'?src=/business_images/'.$proimage["name"].'&w=50&h=50&q=100' }}">



       



                <img id="img" src="{{asset('images/cross.png')}}" alt="delete" class="classImg" data-id="{{$proimage['id']}}" data-parentdivid="abcd{{$imgcount}}" style="cursor: pointer;">
                </div></div>
                @endforeach
                @if(count($providerimages) >5 || count($providerimages) ==5)
                <div id="filediv">Maximum Image uploaded</div>
                @elseif(count($providerimages) <5)
                <div id="filediv"  ><input name="file[]" type="file" class="fileUpld" id="file"/></div>
                <input type="button" id="add_more" class="upload" value="Add More File"/>
                @endif
                <input type="hidden" value="{{count($providerimages)}}" name="imageno" id="imageno" />
              </div>



                <p class="tarea">
                  <i class="fa fa-map-marker tarfa"></i>
                  <textarea rows="5" id="address" placeholder="Address" name="address" style="resize:none; padding:10px 15px;">{{$address}}</textarea>
                </p>
                
                <p>
                <i class="fa fa-phone"></i>
                <input type="text" name="phone" id="phone" placeholder="Phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'" value="{{$phone}}" />
                </p>
                
                
               <p>
<i class="fa fa-globe"></i>
<select id="country" name="country">
   <option>Select One</option>
   @for($i=0;$i<count($countryValue);$i++)
   <option value="{{$countryValue[$i]['countryID']}}"
   @if($country==$countryValue[$i]['countryID'])
   selected
   @endif
   >{{$countryValue[$i]['countryName']}}</option>
   @endfor
</select>
</p>


<p>
<i class="fa fa-map"></i>
<select id="state" name="state">
    <option>Select One</option>
    @for($i=0;$i<count($stateValue);$i++)
   <option value="{{$stateValue[$i]['stateID']}}"
   @if($state==$stateValue[$i]['stateID'])
   selected
   @endif
   >{{$stateValue[$i]['stateName']}}</option>
   @endfor
</select>
</p>


<p>
<i class="fa fa-map-marker"></i>
<select id="city" name="city">
    <option>Select One</option>
    @for($i=0;$i<count($cityValue);$i++)
   <option value="{{$cityValue[$i]['cityID']}}"
   @if($city==$cityValue[$i]['cityID'])
   selected
   @endif
   >{{$cityValue[$i]['cityName']}}</option>
   @endfor
</select>
</p>

 
                <p>
                <i class="fa fa-map-pin"></i>
                <input type="text" name="zip" id="zip" placeholder="Zip" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Zip'" value="{{$zip}}" />
                </p>
                
                <p>
                <i class="fa fa-th"></i>
                  <select id="category_id" name="category_id">
                  <option>Select One</option>
                   @for($i=0;$i<count($categoryValue);$i++)
                   
                   <option value="{{$categoryValue[$i]['id']}}"
                   @if($category_id==$categoryValue[$i]['id'])
                   selected
                   @endif
                   >{{$categoryValue[$i]['title']}}</option>
                   @endfor
                  </select>
                </p>
                
                <!--<div class="captcha_p">
                <span><img src="images/captcha.jpg" alt="" border="0" /><a href="#">Can't read? Reload</a></span>
                <p><i class="fa fa-key"></i>
                <input type="text" placeholder="Enter security code shown above:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter security code shown above:'" /></p>
                </div>-->
                
                
                <p class="login_btn"><button type="submit">Edit</button></p>
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