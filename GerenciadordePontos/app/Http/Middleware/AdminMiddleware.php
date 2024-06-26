<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     // Método para verificar se o usuário é administrador.
    public function handle(Request $request, Closure $next): Response
    {
        // Caso não seja administrador é deslogada a sua sessão.
        if(auth()->user()->role != 'admin'){
            return redirect()->route('mark.destroy');
        }

        // Caso seja administrador acessa corretamente de acordo com a requisição.
        return $next($request);
    }
}
