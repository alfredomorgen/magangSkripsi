<?php

namespace App\Http\Middleware;

use Closure;
use App\Constant;
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
        if(Auth::user()->role == Constant::user_company )
        {
            return $next($request);
        }

        return redirect('/home');
    }
}
