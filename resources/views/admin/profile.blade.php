@extends('.admin.layouts.default')

@section('content')
 <div class="col-md-12>
              <!-- general form elements -->
           <h3 class="box-title">Welcome {{Session::get('userDetails')[0]->name}}, {{Session::get('userDetails')[0]->id}}</h3>
	</div>
@endsection