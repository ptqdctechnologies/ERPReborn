<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class APIPerformanceMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Catat waktu mulai
        $start = microtime(true);

        // Proses request
        $response = $next($request);

        // Hitung durasi
        $duration = microtime(true) - $start;
        $durationMs = round($duration * 1000, 2);

        // Log jika durasi melebihi threshold (misal 500ms)
        if ($durationMs > 500) {
            Log::warning("Slow API detected", [
                'uri' => $request->getUri(),
                'method' => $request->getMethod(),
                'duration_ms' => $durationMs,
                'params' => $request->all()
            ]);
        }

        // Tambahkan header X-API-Time ke response
        $response->headers->set('X-API-Time', $durationMs . 'ms');

        return $response;
    }
}