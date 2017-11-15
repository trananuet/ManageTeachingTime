<?php

namespace Modules\Base\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
    * Dashboard.
    * @author AnTV
    * @param  
    * @return view
    */
    public function index(){
        return view('base::dashboard.dashboard');
    }
    
}