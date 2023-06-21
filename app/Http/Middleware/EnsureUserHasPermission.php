<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasPermission
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$permission): Response
    {
        $response = Http::acceptJson()
                    ->withHeaders([
                        'Authorization' => request()->header('Authorization')
                    ])
                    ->get(config('microservices.available.micro_auth.url') . "/api/user/can/{$permission}");
        
        if ($response->status() == 200) 
        {
            return $next($request);
        }
        return Response()->json(json_decode($response),$response->status());
    }
}
