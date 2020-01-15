<?php

namespace App\Http\Middleware;

use Closure;

class Ladmin
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
        if(!\Session::has('admin')){
            return redirect('login')->with('error', 'Anda Belum Login !');
        }
        return $next($request);
    }
}
