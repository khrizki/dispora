<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogVisitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if (!$request->session()->has('visitor_logged')) {
    try {
        $ip = $request->ip();

        // Cek apakah IP sudah tercatat
        $alreadyExists = DB::table('visitors')
            ->where('ip_address', $ip)
            ->exists();

        if (!$alreadyExists) {
            DB::table('visitors')->insert([
                'ip_address' => $ip,
                'user_agent' => $request->header('User-Agent'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $request->session()->put('visitor_logged', true);
    } catch (\Exception $e) {
        Log::error('Visitors log error: ' . $e->getMessage());
    }
}

return $next($request);

    }
}
