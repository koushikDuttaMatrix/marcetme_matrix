
<div class="about_section_right">
<div class="iner_home_back_hbgl">
<h3>Talked About</h3>
<ul>
@foreach ($latest_article_list as $latestarticle) 
<li>
<a href="{{ url('article/'.$latestarticle->id) }}/{!! str_replace(' ', '-', $latestarticle->title) !!}">
<div class="img_section">
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
<div class="txt_section">
<p>Competitions: {{ $latestarticle->title }}</p>
<span><i class="fa fa-user"></i>Posted By: Admin</span>
</div>
<div class="clearfix"></div>
</li>
@endforeach	
</ul>
</div>
</div>
