<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckIfEmploye
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
        
        $role = Auth::user()->role;
        
        switch ($role) {
            case 'admin':
                
                return redirect ('/admin-dashboard');
                
                break;
                
            case 'pdg':
                
                return redirect('/pdg-dashboard');
                 break;

            }
            return $next($request);
           
        
    }
    
}
