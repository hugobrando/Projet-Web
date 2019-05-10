<?php

namespace App\Http\Middleware;

use Closure;

class Auth
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
        if(!auth()->check()){ //si l'utilisateur n'est pas connecté
            return redirect('/')->withError([
                'connect' => "Vous devez être connecté",
            ]);
        }

        return $next($request);
    }
}
