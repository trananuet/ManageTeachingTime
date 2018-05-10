<?php

namespace Modules\ManageCategory\Http\Controllers\Faculty;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\ManageCategory\Entities\Faculty;
use Modules\ManageCategory\Repositories\FacultyRepository;
use Excel;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getFaculty()
    {
        $facultys = FacultyRepository::getAllFaculty();
        return view('managecategory::Faculty.faculty',compact('facultys'));
    }


    public function createEditFaculty(Request $request)
    {
        $faculty = FacultyRepository::saveFaculty($request);
        if($faculty == true) {
            return back()->with('success','Đã cập nhật dữ liệu!');
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }

    public function delFaculty(Request $request)
    {
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn khoa, phòng ban nào.!!!'
        ]);
        $faculty = FacultyRepository::removeFaculty($request);
        if($faculty == true) {
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
                    foreach($rows as $row)
                    {
                        if(!empty($row))
                        {
                            if(!empty($row['name'])) {
                                $dataArray[] =
                                [
                                'name' => $row['name'],
                                ];
                            } else  { 
                                return back()->with('message','Dữ liệu chưa chính xác. Vui lòng kiểm tra lại tên trường dữ liệu hoặc dữ liệu !');
                            }
                        }
                    }
                } 
                if(!empty($dataArray)){             
                    Faculty::insert($dataArray);
                    return back()->with('success','Thêm thành công '.count($dataArray).' dữ liệu!');
                }
            }
        }
    }

           

}
