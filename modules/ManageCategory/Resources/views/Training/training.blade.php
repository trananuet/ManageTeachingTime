@extends('base::layouts.master')
@section('nav')
	@include('base::layouts.nav')
@endsection
@section('content')
        <h3>Hệ đào tạo</h3>
        <hr>
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
            <div class="col-md-4 add-btn-oth">
                <button data-toggle="modal" data-target="#modalTraining" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
            </div>
            <!-- LINE MODAL -->
            <div class="modal fade" id="modalTraining" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="addExcel">
                        <ul class="nav nav-tabs nav-default" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thêm dữ liệu nhập tay</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Thêm dữ liệu từ excel</a></li>
                        </ul>
                    </div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">                                
                                <div class="modal-content" style="width: 100%;">
                                    <form method="POST" action="{{route('training.save')}}" id="formTrainingCreate">
                                    {{ csrf_field() }}
                                        <div class="modal-body">
                                            <!-- content goes here -->
                                            <input type="hidden" name="trainingID" value="">
                                            <div class="form-group row">
                                                <label for="trainingCreate" class="col-sm-3 col-form-label">Hệ đào tạo</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="trainings" class="form-control" id="trainingCreate" placeholder="Hệ đào tạo">
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
                                    <form action="{{route('training.import')}}" method="post" enctype="multipart/form-data" id="importExcel">
                                        {{csrf_field()}}
                                        
                                        <div class="modal-body">
                                            <!-- content goes here -->
                                            <input type="hidden" name="trainingID" value="">
                                            <div class="form-group row">
                                                <label for="trainingCreate" class="col-sm-3 col-form-label">Import File</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="imported_file"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="trainingCreate" class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <b>Trường dữ liệu {name}</b>
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
        <div class="school-content-table relative">
            <form method="POST" action="{{route('training.remove')}}">
                {{ csrf_field() }}
                <div class="box-remove-all">
                    <button type="submit" class="btn btn-primary btn-remove pull-right" id="" onclick="return confirm('Bạn chắc chắn muốn xóa hệ đào tạo đã chọn?');">Xóa</button>
                </div>
            <table class="table table-hover table-condensed table-bordered" id="table_training">
                <thead class ="table-school-year">
                    <tr>
                        <th class="stt active-display">STT</th>
                        <th class="">Hệ đào tạo</th>
                        <th class="cus">Tùy chọn</th>
                        <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trainings as $training)
                        <tr>
                            <td class="active-display">{{++$loop->index}}</td>
                            <td class="text-name">{{$training->name}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditTraining{{$training->trainingID}}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td class=""><input type="checkbox" name="checkbox[]" id="{{$training->trainingID}}" value="{{$training->trainingID}}" class="checkbox-remove"></td>
                </form>
                        </tr>
                        <div class="modal fade" id="modalEditTraining{{$training->trainingID}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ DANH MỤC</h4>
                                    </div>
                                    <form method="POST" action="{{route('training.save')}}" id="formTrainingCreate">
                                    {{ csrf_field() }}
                                        <div class="modal-body">
                                            <!-- content goes here -->
                                            <input type="hidden" name="trainingID" value="{{$training->trainingID}}">
                                            <div class="form-group row">
                                                <label for="trainingEdit" class="col-sm-3 col-form-label">Hệ đào tạo</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="trainings" class="form-control" id="trainingEdit" value="{{$training->name}}">
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
            $("#formTrainingCreate").validate({
                rules: {
                        trainings: "required",
                    },
                messages: {
                        trainings: "Vui lòng điền Hệ đào tạo."                    

                }
            });
        });
    </script>
    <script>   
        $(function() {
            $("#importExcel").validate({
                rules: {
                        imported_file: "required",
                    },
                messages: {
                        imported_file: "Vui lòng nhập file."                    

                }
            });
        });
    </script>  
@endsection
