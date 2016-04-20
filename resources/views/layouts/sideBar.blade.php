<div class="col-md-3 article_right">
<div class="recent_article">
<div class="recent_header">
<img src="{{asset('images/recent_article.png')}}" alt="" border="0" />
<span>Recent blog</span>
</div>
<ul>
@foreach ($latest_blog_list as $latestblogkey=>$latestblog) 
<li>
<a href="{{ url('blog/'.$latestblog->id) }}/{!! str_replace(' ', '-', $latestblog->title) !!}">
<div class="article_img">
@if($latestblog->file_type=="image")
<img src="{{ url('timthumb/timthumb.php').'?src=/blog_images/'.$latestblog->image.'&w=72&h=50&q=100' }}" alt="" border="0" />
@elseif($latestblog->file_type=="video")
@if($latestblog->video_type=="youtube")
<img src="{{ url('timthumb/timthumb.php').'?src='.$latestblog->embed_link.'&w=72&h=50&q=100' }}" alt="" border="0"  />
@elseif($latestblog->video_type=="vimeo")
<img src="{{ url('timthumb/timthumb.php').'?src='.$latestblog->embed_link.'&w=72&h=50&q=100' }}" alt="" border="0"  />

@endif
@endif
</div></a>
<div class="article_txt"><h5>{{ $latestblog->title }}</h5>
<p>{{ substr( strip_tags($latestblog->description) ,0,20) }}...</p>
<span><i class="fa fa-calendar-check-o"></i>{{date('F t,Y',strtotime($latestblog->created_at))}}</span></div>
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

