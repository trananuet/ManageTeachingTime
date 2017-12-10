<?php

namespace Modules\User\Http\Middleware\MiddlewareManageCategory;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageCourseLecturerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::user()->checkManageCourseLecturer())
        {
            return \Response::view('base::errors.403',array(),403);
        } else {
            return $next($request);
        }
    }
}
