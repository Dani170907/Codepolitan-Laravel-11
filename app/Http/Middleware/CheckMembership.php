<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMembership
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->input('membership') !== true) {
            return redirect(to: '/pricing'); // Jika bukan member, arahkan ke halaman harga
        }

        // Log sebelum request diproses
        \Illuminate\Support\Facades\Log::info('Before Request:', [
            'url' => $request->url(),
            'params' => $request->all(),
        ]);

        $response = $next($request); // Lanjutkan request ke route berikutnya

        sleep(2); // Delay 2 detik sebelum mengembalikan response

        // Log setelah request selesai diproses
        \Illuminate\Support\Facades\Log::info('After Request:', [
            'status' => $response->getStatusCode(),
            'content' => $response->getContent(),
        ]);

        return $response;
    }
}
