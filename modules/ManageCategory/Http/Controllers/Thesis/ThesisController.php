<?php

namespace Modules\ManageCategory\Http\Controllers\Thesis;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\ManageCategory\Entities\Thesis;
use Modules\ManageCategory\Repositories\ThesisRepository;
use Excel;

class ThesisController extends Controller
{
    
    public function getThesis()
    {
        $thesis = ThesisRepository::getAllThesis();
        return view('managecategory::Thesis.thesis',compact('thesis'));
    }

    

    public function createEditThesis(Request $request)
    {
        $thesis = ThesisRepository::saveThesis($request);
        if($thesis == true) {
            return back()->with('success','Đã cập nhật dữ liệu!');
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }


    public function delThesis(Request $request)
    {
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn khóa luận nào.!!!'
        ]);
        $thesis = ThesisRepository::removeThesis($request);
        if($thesis == true) {
            return redirect()->back()->with('success','Xóa dữ liệu thành công!');
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }

    public function postImport(Request $request)
    {
        if($request->file('imported_file'))
        {
                $path = $request->file('imported_file')->getRealPath();
                $data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count())
            {
                foreach ($data->toArray() as $rows)
                {
                    foreach($rows as $row){
                        if(!empty($row))
                        {
                            if(!empty($row['name']) 
                                && !empty($row['type'])
                                && !empty($row['quota']))
                            {
                                $dataArray[] =
                                [
                                'type' => number_format($row['type'], 0, '.', ','),
                                'name' => $row['name'],
                                'quota' => $row['quota'],
                                ];
                            } else  { 
                                return back()->with('message','Dữ liệu chưa chính xác. Vui lòng kiểm tra lại tên trường dữ liệu hoặc dữ liệu !');
                            }
                        }
                    }
                } 
                if(!empty($dataArray)){             
                    Thesis::insert($dataArray);
                    return back()->with('success','Thêm thành công '.count($dataArray).' dữ liệu!');
                }
            }
        }
    }
}
