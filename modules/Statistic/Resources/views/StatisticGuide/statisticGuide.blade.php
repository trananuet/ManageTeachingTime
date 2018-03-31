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
        table.dataTable tbody td {
            padding: 5px 10px;
        }
    </style>
@endsection
@section('content')
@include('base::layouts.manager-left')
    <h3>Giảng Viên Khóa Luận</h3>
    <hr>
    @if($errors->has('checkbox'))
        <div class="alert alert-danger">
            <span>{{$errors->first('checkbox')}}</span>
        </div>
    @endif 
    <div class="content-table relative">
        <table class="table table-hover table-condensed table-bordered table-data-guide" id="table-statistic-guide">
            <thead class ="table-school-year">
                <tr>
                    <th class="stt active-display">STT</th>
                    <th class="">Giảng viên</th>
                    @foreach($arr as $thesis)
                    <th id="{{$thesis}}">{{$thesis}}</th>
                    @endforeach
                    <th class="">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($array as $key => $thesis_lecturer)
                <tr>
                    <td class="active-display">{{++$loop->index}}</td>
                    <td>{{$key}}</td>
                    @foreach($arr as $thesis)
                        @php
                                for($i=0; $i < count($thesis_lecturer); $i++){
                                    if($thesis_lecturer[$i]['type'] == $thesis){
                                        $str = $thesis_lecturer[$i]['quantity'];
                                        
                                        break;
                                    }
                                    else {
                                        $str = "0";
                                    }
                                }
                        @endphp
                        <td> {{$str}}</td>
                    @endforeach
                    @php
                        $a = 'quantity';
                        $sum = sum_array($thesis_lecturer, $a);
                    @endphp
                    <td>{{$sum}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    <div class="col-md-4 add-btn1">
        <button data-toggle="modal" data-target="#modalCourseLecturer" class="btn btn-primary"><i class="fa fa-arrow-right" aria-hidden="true"></i> Xuất file</button>
    </div>
    <div class="space">&nbsp;</div>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#table-statistic-guide').dataTable( {
                "autoWidth": false
            });
        });
    </script>
@endsection
