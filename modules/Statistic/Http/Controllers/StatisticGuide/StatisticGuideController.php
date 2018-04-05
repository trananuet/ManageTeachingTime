<?php

namespace Modules\Statistic\Http\Controllers\StatisticGuide;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
// use Modules\Statistic\Entities\ThesisLecturer;
use Modules\Statistic\Repositories\ThesisLecturerRepository;
use Modules\ManageCategory\Repositories\ThesisRepository;
use Modules\ManageCategory\Repositories\TeacherRepository;
use Modules\ManageCategory\Repositories\TrainingRepository;
use Illuminate\Support\Facades\Auth;
use Modules\Data\Repositories\DataGuideRepository;

class StatisticGuideController extends Controller
{
    public function getStatisticGuide()
    {
        $data = DataGuideRepository::getDataGuide();
        $types = DataGuideRepository::getType();
        $arr = [];
        foreach($types as $type){
            array_push($arr, $type->name_thesis);
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
        return view('statistic::StatisticGuide.statisticGuide',compact('data','types','arr','array','teachers'));
    }
}
