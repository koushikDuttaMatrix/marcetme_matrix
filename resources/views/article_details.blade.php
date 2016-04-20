@extends('layouts.default')

@section('content')
<div class="banner_section">

<!--slider_section-->

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

<div class="carousel-inner login_carousel">
    <div class="item active"> <img src="{{ url('images/login_banner.jpg')}}" border="0" style="width:100%" alt="First slide">
      <div class="container">
       <div class="carousel-caption">
          <h1>Starting a New Career or Job Dteails</h1>
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
<li><a href="{{ url()}}">home</a></li>  
<li><a href="{{ url('articles')}}">article</a></li>
<li>Starting a New Career or Job details</li>
</ul>
</div>
</div>

<!--breadcrumb_section-->

<!--article_section-->

<div class="article_section">
<div class="container">
<div class="col-md-9 article_left article_details">

@if($article->file_type=="image")
<img src="{{ url('timthumb/timthumb.php').'?src=/article_images/'.$article->image.'&w=720&h=400&q=100' }}" alt="" border="0" />
@elseif($article->file_type=="video")
@if($article->video_type=="youtube")
<iframe width="720" height="400"
src="{{$article->embed_link}}">
</iframe>
@elseif($article->video_type=="vimeo")
<iframe src="https://player.vimeo.com/video/{{$article->vimeoVideoLink}}" width="720" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
<p><a href="https://vimeo.com/{{$article->vimeoVideoLink}}">How to increase the Canon 7D dynamic range (Tutorial)</a> from <a href="https://vimeo.com/luka">Luka</a> on <a href="https://vimeo.com">Vimeo</a>.</p>
@endif
@endif

<h4>{{ $article->title }}</h4>
<p class="p_admin">
<i class="fa fa-user"></i>
 @if(Auth::check())
{{Auth::user()->name}}
@else

@endif
<i class="fa fa-comments"></i><a href="#.comment" class="btn">Leave a comment</a></p>
{!! html_entity_decode($article->description) !!}
<!--
<p class="tag_p">
<i class="fa fa-tags"></i>Tags : <span><a href="#">tag1</a>, <a href="#">tag2</a>, <a href="#">tag3</a></span>
</p>-->
<script>
$(document).on("click", function(e){
    if($(e.target).is(".btn")){
      $(".com_show").show();
    }
});
</script>
<div class="comment">
  
  <div class="comment_section com_show"  style="display:none;">
      <div class="smallimg">
        @if(Auth::check())
            @if(Auth::user()->profile_picture!="")
            <img alt="" src="{{ url('timthumb/timthumb.php').'?src=/user_images/'.Auth::user()->profile_picture.'&w=48&h=48&q=48' }}">    @else
            <img alt="" src="{{ url('images/no_user.png') }}">  
             @endif
            @else
             <img alt="" src="{{ url('images/no_user.png') }}">  
             @endif

        </div>
        <div class="txts-area">
            <form method="POST" id="commentFormArticle" action="{{ action('UserCommentController@createArticle') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <textarea name="comment" id="comment" placeholder="Add a comment..." class="text1 required" name=""></textarea>
                @if(Auth::check())
                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}"/> 
                @else
                   <input type="hidden" name="user_id" id="user_id" value=""/>
                   @endif    
                   <input type="hidden" name="article_id" id="article_id" value="{{$article->id}}"/>
                <div class="comment-button">
                   <p class="login_btn sub"><button id="postCommentArticle" type="submit">Send</button></p>
                </div>
            </form>    
        </div>
    </div>
    <div class="comm-area">
        <ul>
        <div id="append_comment"></div> 
        @foreach($userComments as $comment)
          <li>
              <div class="smallimg">
                @if(isset($comment['profile_picture']))
                     @if($comment['profile_picture']!="")
                    <img alt="" src="{{ url('timthumb/timthumb.php').'?src=/user_images/'.$comment['profile_picture'].'&w=48&h=48&q=48' }}" > 
                    @else
                       <img alt="" src="{{ url('images/no_user.png')}}"> 
                       @endif
                    @else
                       <img alt="" src="{{ url('images/no_user.png')}}"> 
                       @endif

                </div>
                <div class="txts-area">
                    <div class="comm_name">{{$comment['name']}}</div>
                    <div class="comment">{{$comment['comment']}}</div>
                    <!--<div class="like-area">
                       <a data-comment_id="18" class="reply_comment" href="javascript:void(0)"><i class="fa fa-comment"></i> Reply</a>    
                    </div>-->
                </div>
            </li>
           @endforeach   
           
        </ul>
    </div>
    
</div>



</div>
@include('layouts/sideBarArticle')
<div class="clearfix"></div>
</div>
</div>


<!--article_section-->
@endsection