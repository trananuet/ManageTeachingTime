@extends('base::layouts.master')
@section('nav')
    @include('base::layouts.nav')
@endsection
@section('content')
		<div class="col-xs-12 col-sm-6 col-md-8" style="height: 520px;">                    
					<div class="panel-body" >
						<h4 style="color: black;font-weight: bold;">THÔNG BÁO</h4><hr/>
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						{!! $contents !!}
					</div>                     
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4" style="height: 520px;">                    
				<div class="panel panel-info" >
					<div class="panel-body" >
						<h4 style="color: #007f7f;text-align: center;">ĐĂNG NHẬP</h4><hr/>
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
							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-7 pull-left" ><a class="alogin" href="#">Quên mật khẩu?</a></div>
								<div class="col-sm-5 controls pull-right">
										<button type="submit" class="btn btn-info" style="background: #007f7f;"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</button>
										
								</div>
								
								<div class="clearfix"></div>
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
@endsection