@extends('base::layouts.master')
@section('nav')
	@include('base::layouts.nav')
@endsection
@section('css')
    <style>
        .table>thead>tr>th {
            vertical-align: inherit;
            text-align: center;
        }
        .table>tbody>tr>td {
            vertical-align: inherit;
            text-align: center;
        }
        .set-access-modal{
            background: #eeebf1;
        }
    </style>
@endsection
@section('content')
<div class="col-md-12 relative manage_teaching_time">
    <div class="col-md-3 manage_teaching_time_left" style="min-height: 700px;">
        @include('base::layouts.manager-left')
    </div>
    <div class="col-md-9 manage_teaching_time_right" style="min-height: 700px;">
        <div class="school-top row">
            <div class="col-md-3">
                <div class="form-group">
                    <h3>Năm học</h3>
                    <a href="" data-toggle="modal" data-target="#new-year">
                        <button type="button" class="btn btn-success add-school-years">
                            <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i>
                        </button>
                    </a>
                    <div class="modal fade" id="new-year" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="set-access-modal">
                                <h4 class="text-center" style="text-transform: uppercase;padding-top: 20px;">thêm năm học mới</h4><br>
                                <form action="{{route('school_year.save')}}" method="POSt" style="padding-left: 70px; padding-bottom: 50px;">
                                {{ csrf_field() }}
                                    <h4>Năm học: </h4>
                                    <input type="hidden" name="yearID" value="">
                                    <input type="text" name="school_years" id="" class="input-school-years form-control" style="width: 80%;"><br>
                                    <button class="btn btn-sm btn-primary" type="submit">Xác nhận</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  <div class="col-md-offset-3 col-md-6">
                <input type="text" placeholder="Tìm kiếm" class="form-control search-year">
            </div>  --}}
        </div>
        <div class="school-content-table">
            <form role="form" action ="{{route('school_year.remove')}}" method ='POST' accept-charset='utf-8' id="remove-school-year">
            {{ csrf_field() }}
            <table class="table table-hover table-condensed table-bordered" id="school-years">
                <thead class ="table-school-year">
                    <tr>
                        <th class="">#</th>
                        <th class="">Năm học</th>
                        <th class="">Sửa</th>
                        <th class="">
                            <input type="checkbox" id="checkbox-all" value="" class="check-box">
                            <div class="button-remove">
                                <button id="button" type="submit" class="btn btn-danger" >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button> 
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($school_years as $schoolyear)
                        <tr>
                            <td>{{++$loop->index}}</td>
                            <td>{{$schoolyear->name}}</td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#edit-year{{$schoolyear->yearID}}">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </td>
                            <td><input type="checkbox" name="checkbox[]" id="{{$schoolyear->yearID}}" value="{{$schoolyear->yearID}}" id="{{$schoolyear->yearID}}" class="check-box"></td>
                        </tr>
                        <div class="modal fade" id="edit-year{{$schoolyear->yearID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="set-access-modal">
                                    <h4 class="text-center" style="text-transform: uppercase;padding-top: 20px;">Sửa năm học</h4><br>
                                    <form action="{{route('school_year.save')}}" method="POSt" style="padding-left: 70px; padding-bottom: 50px;">
                                    {{ csrf_field() }}
                                        <div class="edit-school-year" style="margin-left: 80px;padding-bottom: 50px;">
                                            <h4>Năm học: </h4>
                                            <input type="hidden" name="yearID" value="{{$schoolyear->yearID}}">
                                            <input type="text" name="school_years" id="" class="input-school-years form-control" style="width: 80%;" value="{{$schoolyear->name}}"><br>
                                            <button class="btn btn-sm btn-primary" type="submit">Xác nhận</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            </form>
        </div>
    </div>    
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#school-years').DataTable();
    } );
</script>
@endsection
