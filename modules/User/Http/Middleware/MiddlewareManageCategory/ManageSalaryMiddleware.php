<?php

namespace Modules\User\Http\Middleware\MiddlewareManageCategory;

use Closure;
use Illuminate\Http\Request;

class ManageSalaryMiddleware
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
        return $next($request);
    }
}
