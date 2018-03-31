<?php 
namespace Modules\Data\Repositories;

use Illuminate\Http\Request;
use Modules\Data\Entities\DataGuide;
use DB;

class DataGuideRepository 
{

    /**
    * data guide
    * @author AnTV
    * @param 
    * @return static
    */

    public static function getDataGuide(){
        $data = DataGuide::selectRaw("data_guides.*,teachers.name as name_teacher,thesis.name as name_thesis")
                    ->leftjoin('teachers','teachers.id','=','data_guides.teacherID')
                    ->leftjoin('thesis','thesis.type','=','data_guides.type')->get();
        return $data;
    }

    
    /**
    * type guide
    * @author AnTV
    * @param 
    * @return static
    */
    public static function getType(){
        $types = DataGuide::selectRaw("thesis.name as name_thesis, thesis.type as type")
                            ->leftjoin('thesis','thesis.type','=','data_guides.type')->distinct('thesis.name')->get();
        return $types;
    }


    /**
    * them sua du lieu so lieu
    * @author AnTV
    * @param 
    * @return static
    */

    public static function save_data_guide(Request $request){
        DB::beginTransaction();
 		try {
            $teache_id = $request->teacherID;
            $types = $request->type;
            $data_type = DataGuideRepository::getType();
            $arr = [];
            foreach($data_type as $type){
                array_push($arr, $type->type);
            }
            if(isset($request->id)){
                $data_teachers = DataGuide::where('teacherID','=',$request->id)->get();
                    foreach($types as $key => $vale_quantity){
                        if($vale_quantity != 0){
                            $data_guides = DataGuide::where([
                                ['type','=',$arr[$key]],
                                ['teacherID','=',$request->id]
                                ])->get();
                            if(count($data_guides)>0){
                                foreach($data_guides as $data_guide){
                                    $data_guide->type = $arr[$key];
                                    $data_guide->teacherID = $teache_id;
                                    $data_guide->quantity = $vale_quantity;
                                    $data_guide->save();
                                }
                            } else {
                                $data_guide = new DataGuide();
                                $data_guide->type = $arr[$key];
                                $data_guide->teacherID = $teache_id;
                                $data_guide->quantity = $vale_quantity;
                                $data_guide->save();
                            }
                        } else {
                            $data_guides = DataGuide::where([
                                ['type','=',$arr[$key]],
                                ['teacherID','=',$request->id]
                                ])->get();
                            if(count($data_guides)>0){
                                foreach($data_guides as $data_guide){
                                    $data_guide->delete();
                                }
                            }
                        }
                    }
            } else {
                foreach($types as $key => $vale_quantity){
                    if($vale_quantity != 0){
                        $data_guide = new DataGuide();
                        $data_guide->type = $arr[$key];
                        $data_guide->teacherID = $teache_id;
                        $data_guide->quantity = $vale_quantity;
                        $data_guide->save();
                    }
                }
            }
            DB::commit();
            return true;
        } catch(\Exception $ex){
            DB::rollback();
			return false;
        }
    }

    /**
    * xoa cac du lieu huong dan
    * @author AnTV
    * @param Illuminate\Http\Request $request
    * @return boolean
    */
	public static function remove_data_guide(Request $request)
    {
		DB::beginTransaction();
		try {
	       $checkbox = $request->all();
            foreach($checkbox['checkbox'] as $teacherID) {
                $data_guides = DataGuide::where('teacherID','=',$teacherID)->get();
                foreach($data_guides as $data_guide){
                    if(!$data_guide) {
                        return false;
                    }
                    $data_guide->delete();
                }
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