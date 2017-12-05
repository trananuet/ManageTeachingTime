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
@include('base::layouts.manager-left')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="box-top row">
                <h3>Chức danh</h3>
                <hr>
                @if($errors->has('checkbox'))
                    <div class="alert alert-danger">
                        <span>{{$errors->first('checkbox')}}</span>
                    </div>
                @endif 
                <div class="row">
                    <div class="add-btn col-md-2">
                        <button data-toggle="modal" data-target="#modalTraining" class="btn btn-primary"><b>+ Thêm</b></button>
                    </div>
                </div>
                <!-- LINE MODAL -->
                <div class="modal fade" id="modalTraining" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thêm dữ liệu nhập tay</a></li>
                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Thêm dữ liệu từ Excel</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">                                
                                    <div class="modal-content" style="width: 100%;">
                                        <div class="modal-header">
                                            <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ DANH MỤC</h4>
                                        </div>
                                        <form method="POST" action="{{route('title.save')}}" id="formSemesterCreate">
                                        {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <div class="form-group row">
                                                    <label for="titleCreate" class="col-sm-3 col-form-label">Tên</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="Name" class="form-control" id="titleCreate" placeholder="Họ và tên">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="titleCreate" class="col-sm-3 col-form-label">Định mức</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="Dinhmuc" class="form-control" id="titleCreate" placeholder="Định mức">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
	                                                <label for="activeTitlesCreate" class="col-sm-3 col-form-label">Kích hoạt: </label>
	                                                <div class="col-sm-9">
	                                                    <input class="checkbox-common" type="checkbox" name="active" value ="1" id="activeTitlesCreate">
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
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile">
                                
                                    <div class="modal-content" style="width: 100%;">
                                        <div class="modal-header">
                                            <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">Thêm dữ liệu từ excel</h4>
                                        </div>
                                        <form action="{{route('training.import')}}" method="post" enctype="multipart/form-data" id="importExcel">
                                            {{csrf_field()}}
                                            
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <input type="hidden" name="trainingID" value="">
                                                <div class="form-group row">
                                                    <label for="trainingCreate" class="col-sm-3 col-form-label">Import File</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="imported-file"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                                    <div class="btn-group col-md-3" role="group">
                                                        <button class="btn btn-primary" name="import" style="width: 50%;margin-left: 50%;" type="submit">Import</button>
                                                    </div>
                                                    <div class="btn-group col-md-3" role="group">
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal"  role="button" style="width: 50%;margin-right: 50%;">Hủy</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="school-content-table relative">
                <form method="POST" action="{{route('title.remove')}}">
                    {{ csrf_field() }}
                    <div class="box-remove-all">
                        <button type="submit" class="btn btn-primary btn-remove pull-right" id="" onclick="return confirm('Bạn chắn chắn muốn xóa chức danh đã chọn?');">Xóa</button>
                    </div>
                <table class="table table-hover table-condensed table-bordered" id="table_training">
                    <thead class ="table-school-year">
                        <tr>
                            <th class="stt active-display">STT</th>
                            <th class="">Tên</th>
                            <th class="">Định mức</th>
                            <th class="">Kích hoạt</th>
                            <th class="cus">Tùy chọn</th>
                            <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($titles as $title)
                            <tr>
                                <td class="active-display">{{++$loop->index}}</td>
                                <td>{{$title->titleName}}</td>
                                <td>{{$title->DinhMuc}}</td>
                                @if($title->active == 1)
                                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                @else
                                        <td></td>
                                @endif
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditTraining{{$title->titleID}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td class=""><input type="checkbox" name="checkbox[]" id="{{$title->titleID}}" value="{{$title->titleID}}" class="checkbox-remove"></td>
                 </form>
                            </tr>
                            <div class="modal fade" id="modalEditTraining{{$title->titleID}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">CHỈNH SỬA DANH MỤC</h4>
                                        </div>
                                        <form method="POST" action="{{route('title.save')}}" id="formtitleEdit">
                                            {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <!-- content goes here -->
                                                    <input type="hidden" name="titleID" value="{{$title->titleID}}">
                                                    <div class="form-group row">
                                                        <label for="titleEdit" class="col-sm-3 col-form-label">Tên</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="Name" class="form-control" id="titleEdit" placeholder="Tên" value="{{$title->titleName}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="titleEdit" class="col-sm-3 col-form-label">Định mức</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="Dinhmuc" class="form-control" id="titleEdit" placeholder="Định mức" value="{{$title->DinhMuc}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="activeYearsEdit" class="col-sm-3 col-form-label">Active</label>
                                                        <div class="col-sm-9">
                                                            @php
                                                                if($title->active == 1){
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
            $('#table_training').dataTable( {
                "autoWidth": false
            });
        });
    </script>
   <script>   
        $(function() {
            $("#importExcel").validate({
                rules: {
                    imported-file: "required"
                    },
                messages: {
                    imported-file: "Vui lòng nhập file."
                }
            });
        });
    </script>
@endsection