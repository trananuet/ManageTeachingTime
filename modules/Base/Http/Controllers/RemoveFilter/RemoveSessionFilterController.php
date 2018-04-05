<?php

namespace Modules\Base\Http\Controllers\RemoveFilter;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class RemoveSessionFilterController extends Controller
{
    /**
    * remove session.
    * @author AnTV
    * @param  
    * @return
    */
    public function removeSession(Request $request){
        session()->forget('data_teaches');
        return redirect()->back();
    }
    
}