<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;

class Role {

  public function handle($request, Closure $next, String $role) {
    if (!Auth::check()) {
        return redirect('/home');
    }

    $user = Auth::user();
    
    if($user->role == $role){
        return $next($request);
    } else {
        return redirect('/home');
    }

  }
}