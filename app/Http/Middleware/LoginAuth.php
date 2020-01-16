<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class LoginAuth
{
    public function handle($request, Closure $next)
    {
        session_start();
        if(Session::get('name')=='')
            return $next($request);
        else
            return redirect('/');
    }
}
