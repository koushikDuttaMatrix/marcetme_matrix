<div class="col-md-3 article_right">
<div class="recent_article">
<div class="recent_header">
<img src="{{asset('images/recent_article.png')}}" alt="" border="0" />
<span>Recent Starting a New career or job</span>
</div>
<ul>


@foreach ($latest_article_list as $latestarticle) 

<li>
<a href="{{ url('article/'.$latestarticle->id) }}/{!! str_replace(' ', '-', $latestarticle->title) !!}">
<div class="article_img">
@if($latestarticle->file_type=="image")
<img src="{{ url('timthumb/timthumb.php').'?src=/article_images/'.$latestarticle->image.'&w=72&h=50&q=100' }}" alt="" border="0" />
@elseif($latestarticle->file_type=="video")
@if($latestarticle->video_type=="youtube")
<img src="{{ url('timthumb/timthumb.php').'?src='.$latestarticle->embed_link.'&w=72&h=50&q=100' }}" alt="" border="0"  />
@elseif($latestarticle->video_type=="vimeo")
<img src="{{ url('timthumb/timthumb.php').'?src='.$latestarticle->embed_link.'&w=72&h=50&q=100' }}" alt="" border="0"  />

@endif
@endif
</div></a>
<div class="article_txt"><h5>{{ $latestarticle->title }}</h5>
<p>{{ substr( strip_tags($latestarticle->description),0,20) }}...</p>
<span><i class="fa fa-calendar-check-o"></i>{{date('F t,Y',strtotime($latestarticle->created_at))}}</span></div>
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