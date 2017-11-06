@extends('layouts.master')
@section('nav')
	@include('layouts.nav')
@endsection
@section('content')
<div class="col-md-12 relative manage_teaching_time">
    <div class="col-md-3 manage_teaching_time_left" style=" min-height: 400px">
        @include('layouts.manager-left')
    </div>
    <div class="col-md-9 manage_teaching_time_right" style=" min-height: 400px">
    <h3>HỆ THỐNG QUẢN LÝ GIỜ GIẢNG CỦA GIẢNG VIÊN</h3>
    </div>    
</div>
@endsection
