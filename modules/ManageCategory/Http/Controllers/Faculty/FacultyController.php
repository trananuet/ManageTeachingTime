<?php

namespace Modules\ManageCategory\Http\Controllers\Faculty;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\ManageCategory\Entities\Faculty;
use Modules\ManageCategory\Repositories\FacultyRepository;

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
            return back();
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
            return redirect()->back();
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

          if(!empty($data) && $data->count())
          {
            foreach ($data->toArray() as $row)
            {
              if(!empty($row))
              {
                $dataArray[] =
                [
                  'name' => $row['name']
                ];
              }
          } 
          if(!empty($dataArray))
          {
                  
            Faculty::insert($dataArray);
            return back();
           }
         }
       }

    }


}
