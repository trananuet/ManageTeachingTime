<?php

namespace Modules\ManageCategory\Http\Controllers\SchoolYear;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\ManageCategory\Entities\SchoolYear;
use Modules\ManageCategory\Entities\Training;
use Modules\ManageCategory\Repositories\SchoolYearRepository;
use Modules\ManageCategory\Repositories\TrainingRepository;
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
        $school_years = SchoolYearRepository::get_year_training();
        $trainings = TrainingRepository::getAllTraining();
        return view('managecategory::SchoolYear.schoolYear',compact('school_years','trainings'));
    }

    public function postImport(Request $request)
    {

        if($request->file('imported_file'))
        {
                $path = $request->file('imported_file')->getRealPath();
                $data = Excel::load($path, function($reader){

                })->get();

            if(!empty($data) && $data->count()) {
                foreach ($data->toArray() as $rows) {
                    if(!empty($rows)) {
                        foreach($rows as $row){
                            if($row['name'] != "" ) {
                                $dataArray[] =  [
                                                'trainingID' => $request->trainingID,
                                                'name' => $row['name'],
                                                'active' => number_format($row['active'], 0, '.', ',')
                                            ];
                            } else {
                                return back()->with('message','Dữ liệu chưa chính xác. Vui lòng kiểm tra lại tên trường dữ liệu hoặc dữ liệu !');
                            }
                        }
                    }
                }
                if(!empty($dataArray))
                {
                    SchoolYear::insert($dataArray);
                    return back()->with('success','Thêm thành công '.count($dataArray).' dữ liệu!');
                }
            }
        }
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
            return back()->with('success','Đã cập nhật dữ liệu!');
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }
    
    /**
    * remove with check all school-years
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
            return redirect()->back()->with('success','Xóa dữ liệu thành công!');
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }

    /**
    * remove one school-years
    * @author AnTV
    * @param $yearID
    * @return view
    */
    // public function deleteOneSchoolYear($yearID){
    //     $school_year = SchoolYearRepository::deleteSchoolYear($yearID);
    //     if($school_year == true) {
    //         return redirect()->back();
    //     } else {
    //          return \Response::view('base::errors.500',array(),500);
    //     }
    // }


    /**
    * filter import excel
    * @author AnTV
    * @param $request
    * @return view
    */

    /**
    * filter training
    * @author AnTV
    * @param $request yearID
    * @return view
    */
    public function filterTraining(Request $request){
        $training = $request->training;
        $trainingFilter = Training::find($training)->school_years()->get();
        $training = Training::find($training);
        session()->flash('trainingFilter', $trainingFilter);
        session()->flash('training', $training);
        return redirect()->back();
    }
    
}