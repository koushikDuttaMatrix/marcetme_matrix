@extends('.admin.layouts.default')

@section('content')
 <div class="col-md-12">
              <!-- general form elements -->
           <h3 class="box-title">Welcome {{Auth::user()->name}} , </h3>
	</div>
	
	<!--<div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Latest Blogs</h3>
                <div class="box-tools pull-right">
                  <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
                  <button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <!--<div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                      </tr>
                    </thead>
                    <tbody>
        				                 
        					                     
        					                     
        					                     
        					                      <tr>
                        <td>FO000000650
</td>
                        <td>Oliver Queen</td>
                        <td>Food Cart</td>
                        <td>Food Cart</td>
                      </tr>
        			</tbody>
                  </table>
                </div><!-- /.table-responsive -->
             <!-- </div><!-- /.box-body -->
           <!--   <div class="box-footer clearfix">
                <a class="btn btn-sm btn-default btn-flat pull-right" href="http://192.168.1.9/FastOrder/admin/orders/">View All Orders</a>
              </div>
              <!-- /.box-footer -->
      <!--</div>-->
@endsection