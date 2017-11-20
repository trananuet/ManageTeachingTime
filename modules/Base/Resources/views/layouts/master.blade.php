<!DOCTYPE html>
<html>
<head>
	<title>Hệ thống quản lý giờ giảng - Trường Đại học Công Nghệ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">	
	<link rel="icon" href="{{asset('/favicon.ico')}}" type="image/x-icon">
	{{-- <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"> --}}
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
	{{--  <link rel="stylesheet" type="text/css" href="{{asset('/node_modules/datetimepicker/bootstrap-datetimepicker.min.css')}}">  --}}
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/font-awesome/css/font-awesome.css')}}">
	 <link rel="stylesheet" type="text/css" href="{{asset('/node_modules/bootstrap-toggle/css/bootstrap-toggle.min.css')}}">  
	{{--  <link rel="stylesheet" type="text/css" href="{{asset('/node_modules/fselect/fselect.css')}}">  --}}
	{{--  <link rel="stylesheet" type="text/css" href="{{asset('/node_modules/fselect/fselect.css')}}">  --}}
	{{--  <link rel="stylesheet" type="text/css" href="{{asset('/node_modules/gantt/style.css')}}">   --}}
	{{--  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">   --}}
	{{--  <link href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.css" rel="stylesheet" type="text/css"> 
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/multiselect/multiple-select.css')}}">   --}}
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/datatables/datatables.net-dt/css/jquery.dataTables.css')}}">  
	<link rel="stylesheet" type="text/css" href="{{asset('/admin_uet/css/style.css')}}"> 
	{{-- <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet"> --}}
	{{--  <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alike+Angular" rel="stylesheet">  --}}
	{{--  <link rel="stylesheet" type="text/css" href="{{asset('/node_modules/datepicker/datepicker3.css')}}">  --}}
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/css/metisMenu.min.css')}}"> 
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/css/timeline.css')}}"> 
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/css/startmin.css')}}"> 
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/css/morris.css')}}"> 
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  
	@yield('css')
	
	
</head>
<body>
{{-- BEGIN NAV --}}
	@yield('nav')
{{-- END NAV --}}

{{-- SECTION --}}
    @yield('content')
{{-- ENDSECTION --}}

{{-- FOOTER --}}
  {{--  <hr style="border: 1px solid #c3c5c5;">   --}}
	<!-- Footer -->

<div class="col-md-12" style="background: #f7f4f4;border-top: 1px solid #c3c5c5;padding-left: 20px;">
	<div id="footer" class="block-short-wrapper">
		<div id="footerIn" class="block-short-inner">
			<div class="footer-company">
				<h3>Trung tâm máy tính</h3>
				<h4>Hệ thống quản lí giờ giảng</h4>
			</div>
		</div>
	</div>
</div>



<!-- JS -->
<script src="{{asset('/node_modules/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/node_modules/js/metisMenu.min.js')}}"></script>
<script src="{{asset('/node_modules/js/startmin.js')}}"></script>
<script src="{{asset('/node_modules/bootstrap-toggle/js/bootstrap-toggle.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('/node_modules/confirm/jquery.confirm.min.js')}}"></script>
<script src="{{asset('/node_modules/datatables/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('/node_modules/validatejs/jquery.validate.min.js')}}"></script>

<script src="{{asset('/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
 <script src="{{asset('/admin_uet/js/manage.js')}}"></script> 
{{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  --}}
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>  --}}

@yield('js')
{{--END FOOTER --}}
</body>
</html>