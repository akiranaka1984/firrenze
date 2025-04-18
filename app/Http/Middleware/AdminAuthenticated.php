<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class AdminAuthenticated
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
        if( Auth::check() )
        {
            if ( Auth::user()->isAdmin() ) {
                 return $next($request);
            }else{
                return redirect(route('admin.login'));
            }
        }

        abort(404);  // for other user throw 404 error
    }
}
