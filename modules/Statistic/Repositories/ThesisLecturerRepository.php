<?php 
namespace Modules\Statistic\Repositories;

use Modules\ManageCategory\Entities\Teacher;
use Modules\ManageCategory\Entities\Training;
use Modules\ManageCategory\Entities\Thesis;
use Modules\Statistic\Entities\ThesisLecturer;
use Illuminate\Http\Request;
use DB;

class ThesisLecturerRepository 
{

    public static function getAllThesisLecturer()
    {
       	$thesis_lecturers =ThesisLecturer::selectRaw("thesis_lecturers.*,teachers.name as teacherName")
                    // ->leftjoin('trainings','trainings.trainingID','=','thesis_lecturers.trainingID')
                    ->leftjoin('teachers','teachers.id','=','thesis_lecturers.teacherID')
                    // ->leftjoin('thesis','thesis.id','=','thesis_lecturers.thesisID')
                    ->get();
        return $thesis_lecturers;
    }

    public static function saveThesisLecturer(Request $request)
    {
        DB::beginTransaction();
		try {
            if(isset($request->id)){
                $thesis_lecturers = ThesisLecturer::where('id', $request->id)->firstOrFail();
                $thesis_lecturers->teacherID = $request->teacherID;
                $thesis_lecturers->khoa_luan = $request->khoa_luan;
                $thesis_lecturers->luan_van = $request->luan_van;
                $thesis_lecturers->luan_an = $request->luan_an;
                $thesis_lecturers->nien_luan = $request->nien_luan;
                $thesis_lecturers->sum_thesis = $request->sum_thesis;
                $thesis_lecturers->save();
                DB::commit();
                return true;
            } else {   
                $thesis_lecturers = new ThesisLecturer();
                $thesis_lecturers->teacherID = $request->teacherID;
                $thesis_lecturers->khoa_luan = $request->khoa_luan;
                $thesis_lecturers->luan_van = $request->luan_van;
                $thesis_lecturers->luan_an = $request->luan_an;
                $thesis_lecturers->nien_luan = $request->nien_luan;
                $thesis_lecturers->sum_thesis = $request->sum_thesis;
                $thesis_lecturers->save();
                DB::commit();
                return true;
            }
        }
        catch(\Exception $ex) {
			DB::rollback();
			return false;
		}
    }

    public static function removeThesisLecturer(Request $request)
    {
		DB::beginTransaction();
		try {
			$checkbox = $request->all();
			foreach($checkbox['checkbox'] as $id) {
				$thesis_lecturers = ThesisLecturer::where('id', $id);
				if(!$thesis_lecturers){
					return false;
				}
				$thesis_lecturers->delete();
			}
			DB::commit();
			return true;
		}
		catch(\Exception $ex){
			DB::rollback();
			return false;
		}
	}

}