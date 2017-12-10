<?php

namespace Modules\User\Http\Middleware\MiddlewareManageSystem;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagePermissionMiddleware
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
        if(!Auth::user()->checkManagePermission())
        {
            return \Response::view('base::errors.403',array(),403);
        } else {
            return $next($request);
        }
    }
}
