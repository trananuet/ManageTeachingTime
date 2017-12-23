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
            return back();
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
                  'name' => $row['name'],
                  'quota' => $row['quota']
                ];
              }
          } 
          if(!empty($dataArray))
          {
                  
            Thesis::insert($dataArray);
            return back();
           }
         }
       }

    }   
}
