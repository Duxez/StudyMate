<?php

namespace App\Http\Middleware;

use Closure;

class DeadlineManager
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
        if(auth()->user()->hasRole("deadline manager")) {
            return $next($request);
        }

        return redirect("home")->with("error", "You don't have access");
    }
}
