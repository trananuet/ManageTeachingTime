@extends('base::layouts.master')
@section('nav')
	@include('base::layouts.nav')
@endsection
@section('content')
<div class="col-md-12 relative manage_teaching_time">
    <div class="col-md-3 manage_teaching_time_left">
        @include('base::layouts.manager-left')
    </div>
    <div class="col-md-9 manage_teaching_time_right">
    <h3>HỆ THỐNG QUẢN LÝ GIỜ GIẢNG CỦA GIẢNG VIÊN</h3>
    </div>    
</div>
@endsection
