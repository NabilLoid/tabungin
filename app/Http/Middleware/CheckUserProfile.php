<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserProfile
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login
        if ($user = auth()->user()) {
            // Daftar kolom yang harus dicek
            $requiredColumns = ['name', 'email', 'phone']; // Ganti dengan kolom Anda

            // Cek jika ada kolom yang NULL
            foreach ($requiredColumns as $column) {
                if (is_null($user->$column)) {
                    // Redirect ke halaman pengisian data
                    return redirect()->route('profile.edit')->with('warning', 'Silakan lengkapi profil Anda.');
                }
            }
        }

        // Jika semua data lengkap, lanjutkan request
        return $next($request);
    }
}
