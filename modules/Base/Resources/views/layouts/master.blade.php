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
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/datatables/datatables.net-dt/css/jquery.dataTables.css')}}">  
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/datatables/makepdf/css/buttons.dataTables.min.css')}}">  

	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/dashboard2/vendors/bootstrap/dist/css/bootstrap.min.css')}}"> 
	{{--  <link rel="stylesheet" type="text/css" href="{{asset('/node_modules/dashboard2/vendors/font-awesome/css/font-awesome.min.css')}}">   --}}
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/dashboard2/vendors/nprogress/nprogress.css')}}"> 
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/dashboard2/vendors/iCheck/skins/flat/green.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/dashboard2/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/dashboard2/vendors/jqvmap/dist/jqvmap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/dashboard2/vendors/bootstrap-daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/dashboard2/build/css/custom.min.css')}}">

	{{-- SELECT2 --}}
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/select2/dist/css/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/multiselect/multiple-select.css')}}"> 

	<link rel="stylesheet" type="text/css" href="{{asset('/admin_uet/css/style.css')}}"> 
	@yield('css')
	
	<style type="text/css">
		.font {
			color:black;
			font-size: 12px;
		}
		.footer {
	    position: fixed;
	    background-color: #cccccc;
	    bottom: 0px;
	    left: 0px;
	    right: 0px;
	    margin-bottom: 0px;
	    font-weight: bold;
	    height: 40px;
	}
	.clear {
		width: 80%;
		text-align: right;
	}
	</style>
</head>
  <body class="nav-md font">
    <div class="container body">
      <div class="main_container">
        {{-- BEGIN NAV --}}
			@yield('nav')
		{{-- END NAV --}}

        
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            
            
			{{-- SECTION --}}
			    @yield('content')
			{{-- ENDSECTION --}}
            
          </div>
          <!-- /top tiles -->

          <br /><br /><br /><br /><br /><br /><br />

        </div>
        <!-- /page content -->
        <div class="clearfix"></div>
        <!-- footer content -->
        <footer class="footer">
        	<div class="clear">
            TRUNG TÂM MÁY TÍNH
        </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
<!-- JS -->
<script src="{{asset('/node_modules/jquery/dist/jquery.min.js')}}"></script>
{{--  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  --}}
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('/node_modules/dashboard2/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>


{{--  <script src="{{asset('/node_modules/datatables/makepdf/jquery.dataTables.min.js')}}"></script>  --}}




<script src="{{asset('/node_modules/dashboard2/vendors/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/nprogress/nprogress.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/gauge.js/dist/gauge.min.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/skycons/skycons.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/Flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/flot.curvedlines/curvedLines.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/DateJS/build/date.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('/node_modules/dashboard2/vendors/moment/min/moment.min.js')}}"></script>

<script src="{{asset('/node_modules/dashboard2/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('/node_modules/dashboard2/build/js/custom.min.js')}}"></script>







<script src="{{asset('/node_modules/confirm/jquery.confirm.min.js')}}"></script>
<script src="{{asset('/node_modules/datatables/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('/node_modules/datatables/makepdf/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/node_modules/datatables/makepdf/buttons.flash.min.js')}}"></script>
<script src="{{asset('/node_modules/datatables/makepdf/jszip.min.js')}}"></script>
<script src="{{asset('/node_modules/datatables/makepdf/makepdf.min.js')}}"></script>
<script src="{{asset('/node_modules/datatables/makepdf/vps_pdf.min.js')}}"></script>
<script src="{{asset('/node_modules/datatables/makepdf/buttons.html5.min.js')}}"></script>
<script src="{{asset('/node_modules/datatables/makepdf/buttons.print.min.js')}}"></script>

<script src="{{asset('/node_modules/validatejs/jquery.validate.min.js')}}"></script>

<!-- Select -->
<script src="{{asset('/node_modules/select2/dist/js/select2.js')}}"></script>
<script src="{{asset('/node_modules/multiselect/multiple-select.js')}}"></script>

<script src="{{asset('/admin_uet/js/manage.js')}}"></script> 
{{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  --}}
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>  --}}

@yield('js')
{{--END FOOTER --}}
</body>
</html>