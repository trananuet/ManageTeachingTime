<?php

namespace Modules\ManageCategory\Http\Controllers\Training;

use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
// use Modules\ManageCategory\Entities\Semester;
// use Modules\ManageCategory\Entities\SchoolYear;
use Modules\ManageCategory\Repositories\TrainingRepository;
// use Modules\ManageCategory\Repositories\SchoolYearRepository;
use Excel;
use Modules\ManageCategory\Entities\Training;


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

    /**
    * import file Excel in Training
    * @author NCC
    * @param $request
    * @return view
    */

    public function postImport(Request $request)
    {
        if($request->file('imported_file'))
        {
                $path = $request->file('imported_file')->getRealPath();
                $data = Excel::load($path, function($reader) {})->get();
                
            if(!empty($data) && $data->count())
            {
                foreach ($data->toArray() as $row)
                {
                    if(!empty($row))
                    {
                        if(!empty($row['name'])) {
                        $dataArray[] =
                        [
                        'name' => $row['name'],
                        ];
                        }
                        else 
                            { 
                               return back()->with('message','Sai tên trường dữ liệu !');
                            }
                    }
                } 
            if(!empty($dataArray))
            {             
                Training::insert($dataArray);
                $trainings = TrainingRepository::getAllTraining();
                return view('managecategory::Training.excel',['datas' => $data]);
            }
            }
        }
    }
}