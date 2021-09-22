<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckIfPdg
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
                return '/admin-dashboard';
                break;
            case 'employe':
                return redirect('/employe-dashboard');
                 break;
            

            }
        return $next($request);
    }
}
