@extends('base::layouts.master')
@section('nav')
	@include('base::layouts.nav')
@endsection
@section('content')
<div class="col-md-12 box-page">
	<div class="container">
		<div class="row ">
			<div class="col-md-7">
				<h3>TRUNG TÂM MÁY TÍNH</h3>
				<h4>HỆ THỐNG QUẢN LÝ GIỜ GIẢNG CỦA GIẢNG VIÊN</h4>
			</div>
			<div id="loginbox" class="mainbox col-md-5 col-sm-7 " style="height: 520px;">                    
				<div class="panel panel-info" >
					<div class="panel-heading">
						<div class="panel-title text-center"><h2>Đăng nhập</h2></div>
						<div class="forget-password" ><a href="#">Quên mật khẩu?</a></div>
					</div>     

					<div class="panel-body" >

						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
						<form class="form-horizontal" role="form" action ={{route('login')}} method ='POST' accept-charset='utf-8'>
							{{ csrf_field() }}	
							<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input id="login-email" type="text" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">                                        
							</div>
								
							<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input id="login-password" type="password" class="form-control" name="password" placeholder="Mật khẩu" >
							</div>

							<div class="input-group">
								<div>
									<label>
										<input id="login-remember" type="checkbox" name="remember" value="1"> Ghi nhớ
									</label>
								</div>
							</div>

							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
										<button type="submit" class="btn btn-info">Đăng nhập</button>
								</div>
							</div>

							 <div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										{{--  Bạn chưa là thành viên? 
										<a href="">Đăng kí ngay</a>									  --}}
									</div>
								</div>
							</div> 
							@if(session('errors'))
                                <div class="alert alert-danger errors">
                                    <strong>{{session('errors')}}</strong>
                                </div>
                            @endif 
						</form>     
					</div>                     
				</div>  
			</div>
		</div>
	</div>
</div>
@endsection