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
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/excel/bootstrap-toggle/css/bootstrap-toggle.min.css')}}"> 

	{{--  <link rel="stylesheet" type="text/css" href="{{asset('/node_modules/datetimepicker/bootstrap-datetimepicker.min.css')}}">  --}}
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/font-awesome/css/font-awesome.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/datatables/datatables.net-dt/css/jquery.dataTables.css')}}">  
	
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/excel/css/metisMenu.min.css')}}"> 
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/excel/css/timeline.css')}}"> 
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/excel/css/startmin.css')}}"> 
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/excel/css/morris.css')}}">

	{{-- SELECT2 --}}
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/select2/dist/css/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/multiselect/multiple-select.css')}}"> 

	<link rel="stylesheet" type="text/css" href="{{asset('/admin_uet/css/style.css')}}"> 
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
<!-- Footer -->



<!-- JS -->
<script src="{{asset('/node_modules/jquery/dist/jquery.min.js')}}"></script>
{{--  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  --}}
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('/node_modules/excel/bootstrap-toggle/js/bootstrap-toggle.min.js')}}"></script>

<script src="{{asset('/node_modules/excel/js/metisMenu.min.js')}}"></script>
<script src="{{asset('/node_modules/excel/js/startmin.js')}}"></script>

<script src="{{asset('/node_modules/confirm/jquery.confirm.min.js')}}"></script>
<script src="{{asset('/node_modules/datatables/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('/node_modules/validatejs/jquery.validate.min.js')}}"></script>

<!-- Select -->
<script src="{{asset('/node_modules/select2/dist/js/select2.js')}}"></script>
<script src="{{asset('/node_modules/multiselect/multiple-select.js')}}"></script>

<script src="{{asset('/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/admin_uet/js/manage.js')}}"></script> 
{{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  --}}
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>  --}}

@yield('js')
{{--END FOOTER --}}
</body>
</html>