<?php

use Modules\User\Entities\RoleFunction;


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