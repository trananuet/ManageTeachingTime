<?php 
namespace Modules\ManageCategory\Repositories;

use Modules\ManageCategory\Entities\Training;
use Illuminate\Http\Request;
use DB;

class TrainingRepository 
{

    /**
    * training
    * @author AnTVư
    * @return static
    */
    public static function getAllTraining()
    {
        $training = Training::all(); 
        return $training;
    }

    /**
    * save training
    * @author AnTV
    * @return static
    */
    public static function saveTraining(Request $request)
    {
        DB::beginTransaction();
		try {
            if(isset($request->trainingID)) {
                $training = Training::findorFail($request->trainingID);
                $training->name = $request->trainings;
                $training->save();
                DB::commit();
                return true;
            } else {   
                $training = new Training();
                $training->name = $request->trainings;
                $training->save();
                DB::commit();
                return true;
            }
        }
        catch(\Exception $ex) { 
			DB::rollback();
			return false;
		}
    }

    /**
    * remove check training
    * @author AnTV
    * @param Illuminate\Http\Request $request
    * @return Modules\ManageCategory\Repositories\TrainingRepository|static boolean
    */
	public static function removeTraining(Request $request)
    {
		DB::beginTransaction();
		try {
			$checkbox = $request->all();
			foreach($checkbox['checkbox'] as $id) {
				$training = Training::where('trainingID', $id);
				if(!$training) {
					return false;
				}
				$training->delete();
			}
			DB::commit();
			return true;
		}
		catch(\Exception $ex) {
			DB::rollback();
			return false;
		}
	}
    
}