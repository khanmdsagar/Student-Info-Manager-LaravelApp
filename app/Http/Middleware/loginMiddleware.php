<?php

namespace App\Http\Middleware;

use Closure;

class loginMiddleware
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
        $checkUserId = $request->session()->has('userId');

        if($checkUserId == true){
            return $next($request);
        }
        else{
            return redirect('/');
        }
        
    }
}
