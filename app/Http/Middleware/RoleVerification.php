<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$rolesId)
    {
        if(Auth::check()){
            foreach($rolesId as $roleId){            
                if(Auth::user()->role_id == $roleId ){
                    return $next($request);
                }
            }
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
}
