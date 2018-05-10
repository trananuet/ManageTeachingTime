<?php

namespace Modules\Data\Http\Controllers\Guide;;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Statistic\Entities\ThesisLecturer;
use Modules\Statistic\Repositories\ThesisLecturerRepository;
use Modules\ManageCategory\Repositories\ThesisRepository;
use Modules\ManageCategory\Repositories\TeacherRepository;
use Modules\ManageCategory\Repositories\TrainingRepository;
use Modules\Data\Repositories\DataGuideRepository;
use Illuminate\Support\Facades\Auth;
use Modules\Data\Entities\DataGuide;
use Excel;

class GuideController extends Controller
{
    public function getGuide()
    {

        $data = DataGuideRepository::getDataGuide();
        // $types = DataGuideRepository::getType();
        $types = ThesisRepository::getAllThesis();
        $arr = [];
        foreach($types as $type){
            array_push($arr, $type->name);
        }
        $array = [];
        foreach($data as $keyvalue){
            $array[$keyvalue->name_teacher][] = [
                "id"=>$keyvalue->teacherID,
                "type" => $keyvalue->name_thesis,
                "quantity" =>$keyvalue->quantity
            ];
        }
        // $thesis = ThesisRepository::getAllThesis();
        $teachers = TeacherRepository::getAllTeacher();
        return view('data::Guide.guide',compact('data','types','arr','array','teachers'));
    } 


    public function createGuide(Request $request)
    {
        $data_guide = DataGuideRepository::save_data_guide($request);
        if($data_guide == true) {
            return back()->with('success','Đã cập nhật dữ liệu!');
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }

    public function removeGuide(Request $request){
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn giảng viên nào.!!!'
        ]);
        $data_guide = DataGuideRepository::remove_data_guide($request);
        if($data_guide == true) {
            return redirect()->back()->with('success','Xóa dữ liệu thành công!');
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }
}