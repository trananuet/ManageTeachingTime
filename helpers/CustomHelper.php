<?php

use Modules\User\Entities\RoleFunction;
use Modules\User\Entities\UserRole;
use Illuminate\Support\Facades\Auth;
    /**
     * quan ly năm học
     * @author AnTV
     * @param name_role duoc thiet lap trong defineHelper
     * @return boolean
     */
    if(!function_exists('check_role')){
        function check_role($name_role){
            $listRole = UserRole::leftjoin('roles','roles.id','=','user_roles.role_id')
                                ->leftjoin('role_functions','role_functions.role_id','=','roles.id')
                                ->leftjoin('functions','role_functions.function_id','=','functions.id')
                                ->where('user_id', Auth::user()->id)
                                ->get();
            $check = false;
            for ($i=0; $i < count($listRole) ; $i++) { 
                if($listRole[$i]->name_function == $name_role){
                    $check = true;
                    break;
                }
            }
            return $check;
        }
    }



    /**
    * get role function
    * @author AnTV 
    * @param  $id $role_id
    * @return array $array
    */
    if(!function_exists('get_role_function')){
        function get_role_function($role_id) {
            $array = [];
            $role_function = RoleFunction::where('role_id',$role_id)->get();
            foreach($role_function as $role_func){
                $function_id = $role_func->function_id;
                array_push($array, $function_id);
            } 
            return $array;
        }
    }

        /**
    * if role_function selected hasn't had, then add it
    * @author AnTV
    * @param  object $role_function_select
    * @param  object $role_function_find
    * @param  query $role
    * @return object $languageFind
    */
    if(!function_exists('add_functions')){
        // foreach , for : add request functions
        function add_functions($role_function_select, $role_function_find, $role) {
            // Return variable
            foreach($role_function_select as $key => $value){
                $check = false;
                for($i=0 ;$i < count($role_function_find);$i++){
                    if($role_function_find[$i]->id == $value){
                        $check =  false;
                        break;
                    }else{
                        $check = true;
                    }
                }
                if($check == false) {
                    $role_function_find = $role->functions()->get();
                }
                else {
                    $role_funciton_new = new RoleFunction();
                    $role_funciton_new->role_id = $role->id;
                    $role_funciton_new->function_id = $value;
                    $role_funciton_new->save();
                    $role_function_find = $role->functions()->get();
                }
            }
            return $role_function_find;
        }
    }

    /**
    * if role_fucntion different from function selected, then remove it
    *
    * @author AnTV
    * @param  object $role_function_select
    * @param  object $role_function_find
    * @param  query $role
    * @return object $languageFind
    */
    if(!function_exists('remove_function')){
        // foreach , for : remove role_function other with request
        function remove_function($role_function_select, $role_function_find, $role) {
            // Return variable
            foreach($role_function_find as $valueFind){
                $check = false;
                for($i = 0; $i < count($role_function_select); $i++) {
                    if ($role_function_select[$i] == $valueFind->id) {
                        $check = false;
                        break;
                    }
                    else {
                        $check = true;
                    }
                }
                if ($check == false) {
                     $role_function_find = $role->functions()->get();
                }
                else {
                    $role_function_find = RoleFunction::where([
                                                        ['role_id',$role->id], 
                                                        ['function_id',$valueFind->id]
                                                    ])->delete();
                    $role_function_find = $role->functions()->get();
                }
            }
            return $role_function_find;
        }
    }


    /**
    * sum
    *
    * @author AnTV
    * @param  
    * @param  
    * @param  
    * @return sum
    */
    if(!function_exists('sum_array')){
        function sum_array($array, $a) {
            // Return variable
            $sum = 0;
            for($i=0; $i < count($array); $i++){
                $sum += $array[$i][$a];
            }
            return $sum;
        }
    }