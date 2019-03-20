<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class RedirectIfNotAdmin
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
        $user = $request->user();
            // throw new \Exception("Error Processing Request", 1);
        
        if ($user=="") {
            return redirect()->route('login');
        }else{
            if ($user && $user->userType==1) {
                return $next($request);
            }else{
                // dd($user);
                Auth::logout();
                return redirect()->back();
            }
        }
    }
}   