<?php

namespace Modules\ManageCategory\Http\Controllers\Title;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\ManageCategory\Entities\Title;
use Modules\ManageCategory\Repositories\TitleRepository;
use Excel;


class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getTitle()
    {
        $titles = TitleRepository::getAllTitle();
        return view('managecategory::Title.title',compact('titles'));
    }

    

    public function createEditTitle(Request $request)
    {
        $title = TitleRepository::saveTitle($request);
        if($title == true) {
            return back()->with('success','Đã cập nhật dữ liệu!');
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }


    public function delTitle(Request $request)
    {
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn chức danh nào.!!!'
        ]);
        $title = TitleRepository::removeTitle($request);
        if($title == true) {
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
                $data = Excel::load($path, function($reader)
                {
                })->get();

           if(!empty($data) && $data->count()) {
                foreach ($data->toArray() as $rows) {
                    if(!empty($rows)) {
                        foreach($rows as $row){
                            if(!empty($row['name']) && !empty($row['quota'])) {
                                $dataArray[] =
                                    [
                                        'name' => $row['name'],
                                        'active' => number_format($row['active'], 0, '.', ','),
                                        'quota' => $row['quota']
                                    ];
                            }
                            else
                            {
                                return back()->with('message','Dữ liệu chưa chính xác. Vui lòng kiểm tra lại tên trường dữ liệu hoặc dữ liệu !');
                            }
                        }
                    }
                } 
                if(!empty($dataArray))
                {
                        
                    Title::insert($dataArray);
                    return back()->with('success','Thêm thành công '.count($dataArray).' dữ liệu!');
                }
            }
        }

    }
}
