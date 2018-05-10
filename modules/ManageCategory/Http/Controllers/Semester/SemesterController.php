<?php

namespace Modules\ManageCategory\Http\Controllers\Semester;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\ManageCategory\Entities\Semester;
use Modules\ManageCategory\Entities\SchoolYear;
use Modules\ManageCategory\Repositories\SemesterRepository;
use Modules\ManageCategory\Repositories\SchoolYearRepository;
use Excel;

class SemesterController extends Controller
{
    /**
    * semester
    * @author AnTV
    * @return view
    */
    public function getSemester(){
      
        $school_years = SchoolYearRepository::get_school_active();
        $semesters = SemesterRepository::getAllSemester();
        return view('managecategory::Semester.semester',compact('school_years','semesters'));
    }

    /**
    * add edit semester
    * @author AnTV
    * @return view
    */
    public function createEditSemester(Request $request){
        $semester = SemesterRepository::saveSemester($request);
        if($semester == true) {
            return back()->with('success','Đã cập nhật dữ liệu!');
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }

    /**
    * remove school-years
    * @author AnTV
    * @param int $yearID
    * @return view
    */
    public function delSemester(Request $request){
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn học kỳ nào.!!!'
        ]);
        $semester = SemesterRepository::removeSemester($request);
        if($semester == true) {
            return redirect()->back()->with('success','Xóa dữ liệu thành công!');
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }
    
    /**
    * filter year
    * @author AnTV
    * @param $request yearID
    * @return view
    */
    public function filterYear(Request $request){
        $year = $request->year;
        $schoolYear = SchoolYear::find($year);
        $semesterFilter = SchoolYear::find($year)->semesters()->get();
        session()->flash('schoolYear', $schoolYear);
        session()->flash('semesterFilter', $semesterFilter);
        return redirect()->back();
    }


    /**
    * remove one semester
    * @author AnTV
    * @param $semesterID
    * @return view
    */
    // public function deleteOneSemester($semesterID){
    //     $semester = SemesterRepository::delSemester($semesterID);
    //     if($semester == true) {
    //         return redirect()->back();
    //     } else {
    //          return \Response::view('base::errors.500',array(),500);
    //     }
    // }


    /**
    * import database to excel
    * @author CongNC
    * @return database
    */


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
                            if(!empty($row['name'])) {
                                $dataArray[] =
                                    [
                                    'yearID' => $request->yearID,
                                    'name' => $row['name']
                                    ];
                            }
                            else
                            {
                                return back()->with('message','Dữ liệu chưa chính xác. Vui lòng kiểm tra lại tên trường dữ liệu hoặc dữ liệu !');
                            }
                        }
                    }
                } 
                if(!empty($dataArray)){             
                    Semester::insert($dataArray);
                    return back()->with('success','Thêm thành công '.count($dataArray).' dữ liệu!');
                }
            }
        }
    }

}