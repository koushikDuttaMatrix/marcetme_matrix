<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Marcet Me</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link rel="stylesheet" href="{{ asset('/admin/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/admin/dist/css/AdminLTE.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/admin/dist/css/skins/_all-skins.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/admin/plugins/iCheck/flat/blue.css') }}">
	<link rel="stylesheet" href="{{ asset('/admin/plugins/morris/morris.css') }}">
	<link rel="stylesheet" href="{{ asset('/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
	<link rel="stylesheet" href="{{ asset('/admin/plugins/datepicker/datepicker3.css') }}">
	<link rel="stylesheet" href="{{ asset('/admin/plugins/daterangepicker/daterangepicker-bs3.css') }}">
	<link rel="stylesheet" href="{{ asset('/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/admin/css/style_image.css') }}">
	<link rel="stylesheet" href="{{ asset('/admin/css/style.css') }}">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
			base_url="{{url()}}";
	</script>
	<link rel="shortcut icon" type="image/x-icon" href="{{ url('app/webroot/favicon.ico')}}">
  </head>
  <body class="skin-blue sidebar-mini">
    
	<div class="wrapper">
       @include('admin.includes.header')
	  <!-- Left side column. contains the logo and sidebar -->
	  @include('admin.includes.left-menu')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 822px;">
	  @yield('content')
      </div><!-- /.content-wrapper -->
	   @include('admin.includes.footer')
    </div><!-- ./wrapper -->
	
	
	<script src="{{ asset('/admin/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('/admin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admin/bootstrap/js/raphael-min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('/admin/plugins/knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    
    <!-- FastClick -->
    <script src="{{ asset('/admin/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/admin/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('/admin/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/admin/dist/js/demo.js') }}"></script>
	
	<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip-->
    <script src="{{ asset('/admin/dist/js/adminAjax.js') }}"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
	<script type="text/javascript">
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('description');
		CKEDITOR.replace('editor2');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
     
    </script>
  </body>
</html>
