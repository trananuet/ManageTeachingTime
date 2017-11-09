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
	{{--  <link rel="stylesheet" type="text/css" href="{{asset('/node_modules/aos/aos.css')}}">   --}}
	{{--  <link rel="stylesheet" type="text/css" href="{{asset('/node_modules/fselect/fselect.css')}}">  --}}
	{{--  <link rel="stylesheet" type="text/css" href="{{asset('/node_modules/fselect/fselect.css')}}">  --}}
	{{--  <link rel="stylesheet" type="text/css" href="{{asset('/node_modules/gantt/style.css')}}">   --}}
	{{--  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">   --}}
	{{--  <link href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.css" rel="stylesheet" type="text/css"> 
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/multiselect/multiple-select.css')}}">   --}}

	<link rel="stylesheet" type="text/css" href="{{asset('/admin_uet/css/style.css')}}"> 
	{{-- <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet"> --}}
	{{--  <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alike+Angular" rel="stylesheet">  --}}
	{{--  <link rel="stylesheet" type="text/css" href="{{asset('/node_modules/datepicker/datepicker3.css')}}">  --}}
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
<div class="col-md-12">
	<div id="footer" class="block-short-wrapper">
		<div id="footerIn" class="block-short-inner">
			<div class="footer-company">
				<h3>TRUNG TÂM MÁY TÍNH</h3>
				<h4>Trường Đại học Công nghệ - Đại học quốc gia Hà Nội</h4>
			</div>
		</div>
	</div>
</div>



<!-- JS -->
<script src="{{asset('/node_modules/jquery/dist/jquery.min.js')}}"></script>
<!-- moment JS-->
{{--  <script src="{{asset('/node_modules/datetimepicker/moment.min.js')}}"></script>  --}}
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>  --}}

<!-- moment locale vi -->
{{--  <script src="{{asset('/node_modules/datetimepicker/locale-vi.js')}}"></script>  --}}
 
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
{{--  <script src="{{asset('/node_modules/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>  --}}
{{--  <script src="{{asset('/node_modules/datepicker/bootstrap-datepicker.js')}}"></script>  --}}


<!--  confirm js  -->
{{--  <script src="{{asset('/node_modules/confirm/jquery.confirm.min.js')}}"></script>  --}}

<!-- datemask -->
{{--  <script src="{{asset('/node_modules/inputmask/jquery.inputmask.js')}}"></script>
<script src="{{asset('/node_modules/inputmask/jquery.inputmask.date.extensions.js')}}"></script>  --}}

<!-- datepicker -->
{{--  <script src="{{asset('/node_modules/datetimepicker/datetimepicker.js')}}"></script>  --}}

<!-- aos animation js -->
{{--  <script src="{{asset('/node_modules/aos/aos.js')}}"></script>  --}}

<!-- multi select -->
{{--  <script src="{{asset('/node_modules/fselect/fselect.js')}}"></script>  --}}
{{--  <script src="{{asset('/node_modules/multiselect/multiple-select.js')}}"></script>  --}}
{{--  
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script> 
<script src="{{asset('/node_modules/gantt/jquery.fn.gantt.js')}}"></script>  --}}
{{--  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js"></script>  --}}


{{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  --}}
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>  --}}

@yield('js')
{{--END FOOTER --}}
</body>
</html>