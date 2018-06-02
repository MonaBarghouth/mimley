<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class Verify
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
        if (!empty(Auth::user()->verifyToken) && Auth::user()->status == 0){

            Session::flash('status','Registered! but verify your email to activate your account');
            return redirect('/verify');


        }
            return $next($request);



    }
}
