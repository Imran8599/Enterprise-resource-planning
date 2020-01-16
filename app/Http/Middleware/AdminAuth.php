<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        session_start();
        if(Session::get('name') != '')
        {
            return $next($request);
        }
        else
            return redirect('login');
        
    }
}
