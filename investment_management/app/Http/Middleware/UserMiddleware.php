<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);

        if($request->session()->has('user_login'))
        {
        }
        else 
        {
            $request->session()->flash('errormessage','Session Time Out , Please Login Again');
            return redirect('user_login');
        }
    }
}
