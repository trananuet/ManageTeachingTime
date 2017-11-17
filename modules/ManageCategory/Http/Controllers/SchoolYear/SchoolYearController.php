<?php

namespace Modules\ManageCategory\Http\Controllers\SchoolYear;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\ManageCategory\Entities\SchoolYear;
use Modules\ManageCategory\Repositories\SchoolYearRepository;
use Excel;
use Illuminate\Support\Facades\Input;

class SchoolYearController extends Controller
{
    /**
    * school year
    * @author AnTV
    * @return view
    */
    public function getSchoolYear(){
        $school_years = SchoolYearRepository::getAllSchoolYear();
        return view('managecategory::SchoolYear.schoolYear',compact('school_years'));
    }

     /**
    * add edit school-years
    * @author AnTV
    * @param $request
    * @return view
    */
    public function createEditSchoolYear(Request $request){
        // dd($request->active);
        $school_year = SchoolYearRepository::saveSchoolYear($request);
        if($school_year == true) {
            return back();
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }
    
    /**
    * remove school-years
    * @author AnTV
    * @param $request
    * @return view
    */
    public function delSchoolYear(Request $request){
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn năm học nào.!!!'
        ]);
        $school_year = SchoolYearRepository::removeSchoolYear($request);
        if($school_year == true) {
            return redirect()->back();
        } else {
             return \Response::view('base::errors.500',array(),500);
        }
    }

    /**
    * filter import excel
    * @author AnTV
    * @param $request
    * @return view
    */
    public function postImport(Request $request)
    {
        $this->validate($request, [
            'imported-file' => 'required'
        ],[
            'imported-file.required' => 'Bạn chưa chọn file'
        ]);
      if($request->file('imported-file'))
      {
                $path = $request->file('imported-file')->getRealPath();
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
                  'active' => $row['active']
                ];
              }
          } 
          if(!empty($dataArray))
          {             
            SchoolYear::insert($dataArray);
            return redirect()->back()->with('thongbao','Import thành công');
           }
         }
       }
    }
}