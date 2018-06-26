<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfGuestAdmin
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
        if($request->cookie('logado') != true){
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
