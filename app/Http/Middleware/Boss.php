<?php

namespace App\Http\Middleware;

use Closure;

class Boss
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
        if(auth()->guard('boss')->check()){ //si l'utilisateur est connecté en tant que boss on accepte 
            return $next($request);
        }
        return redirect('/')->with([ // si non on redirige
                'access' => "Vous devez être connecté en tant que Boss !",
            ]);
    }
}
