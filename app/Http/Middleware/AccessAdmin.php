<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class AccessAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->hasAnyRoles(['admin','author'])){
            return $next($request);
        }
        return redirect('/');
        
        
    }

    
}
