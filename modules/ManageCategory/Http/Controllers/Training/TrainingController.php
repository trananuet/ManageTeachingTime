<?php

namespace Modules\ManageCategory\Http\Controllers\Training;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
// use Modules\ManageCategory\Entities\Semester;
// use Modules\ManageCategory\Entities\SchoolYear;
use Modules\ManageCategory\Repositories\TrainingRepository;
// use Modules\ManageCategory\Repositories\SchoolYearRepository;

class TrainingController extends Controller
{
    /**
    * semester
    * @author AnTV
    * @return view
    */
    public function getTraining(){
        $trainings = TrainingRepository::getAllTraining();
        return view('managecategory::Training.training',compact('trainings'));
    }

    /**
    * create edit training
    * @author AnTV
    * @param $request
    * @return view
    */
    public function createEditTraining(Request $request){
        $training = TrainingRepository::saveTraining($request);
        if($training == true) {
            return back();
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }
    
    /**
    * remove with check all training
    * @author AnTV
    * @param $request
    * @return view
    */
    public function delTraining(Request $request){
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn hệ đào tạo nào.!!!'
        ]);
        $training = TrainingRepository::removeTraining($request);
        if($training == true) {
            return redirect()->back();
        } else {
             return \Response::view('base::errors.500',array(),500);
        }
    }
}