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
use Modules\Data\Entities\DataGuide;

class StatisticGuideController extends Controller
{
    public function getStatisticGuide()
    {
        // $data = DataGuideRepository::getDataGuide();
        if(Auth::user()->checkTeacher()){
            $data = DataGuide::selectRaw("data_guides.*,teachers.name as name_teacher,thesis.name as name_thesis")
            // ->leftjoin('semesters','semesters.semesterID','=','data_teaches.semesterID')
            ->leftjoin('teachers','teachers.id','=','data_guides.teacherID')
            ->leftjoin('thesis','thesis.type','=','data_guides.type')
            ->where('teachers.account',Auth::user()->email)
            ->get();
        } else {
            $data = DataGuideRepository::getDataGuide();
        }
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
