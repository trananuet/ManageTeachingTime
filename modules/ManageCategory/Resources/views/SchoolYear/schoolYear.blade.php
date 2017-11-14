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
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('content')
@include('base::layouts.manager-left')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="box-top row">
                <div class="col-md-12">
                    <div class="form-group">
                        <hr>
                        <h3>Năm học</h3>
                        <hr>
                        <button data-toggle="modal" data-target="#modalSchoolYear" class="btn btn-primary">Thêm năm học</button>
                        <!-- LINE MODAL -->
                        <div class="modal fade" id="modalSchoolYear" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                    <div class="modal-header" style="background: #cbffd1">
                                        <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ DANH MỤC</h4>
                                    </div>
                                    <form method="POST" action="{{route('school_year.save')}}" id="formSchoolYearCreate">
                                    {{ csrf_field() }}
                                        <div class="modal-body">
                                            <!-- content goes here -->
                                            <div class="form-group row">
                                                <label for="schoolYearCreate" class="col-sm-3 col-form-label">Năm học: </label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="school_years" class="form-control" id="schoolYearCreate" placeholder="Năm học">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="activeYearsCreate" class="col-sm-3 col-form-label">Active</label>
                                                <div class="col-sm-9">
                                                    <input class="checkbox-common" type="checkbox" name="active" value ="1" id="activeYearsCreate">
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="modal-footer">
                                            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                                <div class="btn-group col-md-3" role="group">
                                                    <button type="submit" id="saveImage" class="btn btn-primary btn-hover-green" data-action="save" role="button" style="width: 50%;margin-left: 50%;">Lưu</button>
                                                </div>
                                                <div class="btn-group col-md-3" role="group">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal"  role="button" style="width: 50%;margin-right: 50%;">Hủy</button>
                                                </div>
                                                <div class="btn-group btn-delete hidden" role="group">
                                                    <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
            </div>
            @if($errors->has('checkbox'))
                <div class="alert alert-danger">
                    <strong>{{$errors->first('checkbox')}}</strong>
                </div>
            @endif
            <div class="school-content-table relative">
                <form method="POST" action="{{route('school_year.remove')}}">
                {{ csrf_field() }}
                <button id="button" type="submit" class="btn btn-danger removeSchoolYear">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button> 
                <table class="table table-hover table-condensed table-bordered " id="school-years">
                    <thead class ="table-school-year">
                        <tr>
                            <th class="">STT</th>
                            <th class="">Năm học</th>
                            <th class="">Tùy chọn</th>
                            <th class=""><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove" style="margin-left: 8px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($school_years as $schoolyear)
                            <tr>
                                <td>{{++$loop->index}}</td>
                                <td>{{$schoolyear->name}}</td>
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditSchoolYear{{$schoolyear->yearID}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                <td><input type="checkbox" name="checkbox[]" id="{{$schoolyear->yearID}}" value="{{$schoolyear->yearID}}" class="checkbox-remove"></td>
                            </tr>
                </form>
                            <div class="modal fade" id="modalEditSchoolYear{{$schoolyear->yearID}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                        <div class="modal-header" style="background: #cbffd1">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ DANH MỤC</h4>
                                        </div>
                                        <form method="POST" action="{{route('school_year.save')}}" id="formSchoolYearEdit">
                                        {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <input type="hidden" name="yearID" value="{{$schoolyear->yearID}}">
                                                <div class="form-group row">
                                                    <label for="schoolYearEdit" class="col-sm-3 col-form-label">Năm học</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="school_years" class="form-control" id="schoolYearEdit" placeholder="Năm học" value="{{$schoolyear->name}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="activeYearsEdit" class="col-sm-3 col-form-label">Active</label>
                                                    <div class="col-sm-9">
                                                        {{--  <input type="text" name="active" class="form-control" id="activeYearsEdit" placeholder="Active" value="{{$schoolyear->active}}" required>  --}}
                                                        @php
                                                            if($schoolyear->active == 1){
                                                                $selectBtn = 'checked';
                                                            } else {
                                                                $selectBtn = null;
                                                            }
                                                        @endphp
                                                        <input class="checkbox-common" type="checkbox" name="active" value ="1" id="activeYearsEdit" {{$selectBtn}}>
                                                    </div>
                                                </div>
                                                </div>
                                            <div class="modal-footer">
                                                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                                    <div class="btn-group col-md-3" role="group">
                                                        <button type="submit" id="saveImage" class="btn btn-primary btn-hover-green" data-action="save" role="button" style="width: 50%;margin-left: 50%;">Lưu</button>
                                                    </div>
                                                    <div class="btn-group col-md-3" role="group">
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal"  role="button" style="width: 50%;margin-right: 50%;">Hủy</button>
                                                    </div>
                                                    <div class="btn-group btn-delete hidden" role="group">
                                                        <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
<script src="{{asset('/node_modules/validatejs/jquery.validate.min.js')}}"></script>
<script>   
    $(function() {
        $("#formSchoolYearCreate").validate({
            rules: {
                school_years: "required"
                },
            messages: {
                school_years: "Vui lòng điền năm học."
            }
        });
    });
</script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection