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
    <br>
    <h3>Chức Danh</h3>
    <hr>
    @if($errors->has('checkbox'))
        <div class="alert alert-danger">
            <span>{{$errors->first('checkbox')}}</span>
        </div>
    @endif
    @if(Session::has('message'))
        <div class="alert alert-danger">
            <span>{{Session::get('message')}}</span>
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success">
            <span>{{Session::get('success')}}</span>
        </div>
    @endif
    <div class="add-btn-oth col-md-4">
        <button data-toggle="modal" data-target="#modalTitle" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
    </div>
        <!-- LINE MODAL -->
    <div class="modal fade" id="modalTitle" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="addExcel">
                <ul class="nav nav-tabs nav-default" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thêm dữ liệu nhập tay</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Thêm dữ liệu từ excel</a></li>
                </ul>
            </div>
            <div>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">                                
                        <div class="modal-content" style="width: 100%;">
                            <form method="POST" action="{{route('title.save')}}" id="formTitleCreate">
                            {{ csrf_field() }}
                                <div class="modal-body">
                                    <!-- content goes here -->
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Tên</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Tên chức danh">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quota" class="col-sm-3 col-form-label">Định mức</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="quota" class="form-control" id="quota" placeholder="Định mức">
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
                            <form action="{{route('title.import')}}" method="post" enctype="multipart/form-data" id="importExcel">
                                {{csrf_field()}}
                                
                                <div class="modal-body">
                                    <!-- content goes here -->
                                    <div class="form-group row">
                                        <label for="trainingCreate" class="col-sm-3 col-form-label">Import File</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="imported_file"/>
                                        </div>
                                    </div>
                                
                                <div class="form-group row">
                                    <label for="trainingCreate" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <b>Trường dữ liệu {name,active,quota}</b>
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
                                </div>
                            </form>
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
                        <td>{{$title->name}}</td>
                        <td>{{$title->quota}}</td>
                        @if($title->active == 1)
                                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                        @else
                                <td></td>
                        @endif
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditTraining{{$title->id}}">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                        </td>
                        <td class=""><input type="checkbox" name="checkbox[]" id="{{$title->id}}" value="{{$title->id}}" class="checkbox-remove"></td>
            </form>
                    </tr>
                    <div class="modal fade" id="modalEditTraining{{$title->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                                            <input type="hidden" name="id" value="{{$title->id}}">
                                            <div class="form-group row">
                                                <label for="titleEdit" class="col-sm-3 col-form-label">Tên</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" class="form-control" id="titleEdit" placeholder="Tên" value="{{$title->name}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="titleEdit" class="col-sm-3 col-form-label">Định mức</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="quota" class="form-control" id="titleEdit" placeholder="Định mức" value="{{$title->quota}}" required>
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
        <div class="space">&nbsp;</div>

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
            $("#formTitleCreate").validate({
                rules: {
                        name: "required", 
                        quota: "required"
                    },
                messages: {
                        name: "Vui lòng điền tên chức danh.",
                        quota: "Vui lòng điền định mức."
                }
            });
        });
    </script> 
    <script>   
        $(function() {
            $("#importExcel").validate({
                rules: {
                        imported_file: "required"
                    },
                messages: {
                        imported_file: "Vui lòng nhập File."
                }
            });
        });
    </script> 
@endsection
