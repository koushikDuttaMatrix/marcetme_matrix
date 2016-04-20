@extends('layouts.default')

@section('content')

<!--blog_tab_section-->

<div class="row">
<div class="container">
<div class="demo">
<div id="horizontalTab">

<p class="title_tab">{{ $cms->title }}</p>
<div class="resp-tabs-container">

<div>
{!!$cms->description!!}
</div>

</div>
</div>

</div>
</div>
<div class="clearfix"></div>
</div>

<!--blog_tab_section-->

@endsection