<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response= $next($request);  
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Credentials','true');
        $response->headers->set('Access-Control-Max-Age','1000');
        $response->headers->set('Access-Control-Allow-Headers','X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding');
        $response->headers->set('Access-Control-Allow-Methods','PUT, POST, GET, OPTIONS, DELETE');
        return $response;
    }
}
