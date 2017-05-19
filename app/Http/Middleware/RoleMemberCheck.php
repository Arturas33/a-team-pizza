<?php

namespace App\Http\Middleware;

use Closure;

class RoleMemberCheck
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
        $userRoles = auth()->user()->role->pluck('id')->toArray();

        //dd(auth()->user()->role()->pluck('id'));
        if (in_array('member', $userRoles) || in_array('super-admin', $userRoles)) {
            return $next($request);
        } else {
            abort(403, 'Access denied');
        }
    }

}
