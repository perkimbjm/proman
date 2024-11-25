<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class FilamentAuth extends Middleware
{
    // protected function authenticate($request, array $guards): void
    // {
    //     if (! $request->user()) {
    //         redirect()->route('login');
    //     }

    //     // Opsional: tambahkan pengecekan apakah user boleh akses Filament
    //     if (! $request->user() instanceof FilamentUser) {
    //         abort(403);
    //     }

    //     $this->auth->shouldUse('sanctum');
    // }
}