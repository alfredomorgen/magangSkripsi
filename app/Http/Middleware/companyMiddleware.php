<?php

namespace App\Http\Middleware;

use Closure;

class companyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($re)
        return $next($request);
    }
}
