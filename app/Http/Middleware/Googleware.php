<?php

namespace App\Http\Middleware;
//use App\Providers\RouteServiceProviderS;
use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Googleware
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
    
     if (!Auth::guard('google')->check()) {
            session()->flash('Chat','Kindly Provide Login details');
               return redirect('login');
             }

              return $next($request);
    
 
    }
}
