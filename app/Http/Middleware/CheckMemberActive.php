<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckMemberActive
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user sudah login, rolenya 'member', dan data membernya ada
        if (Auth::check() && Auth::user()->role === 'member' && Auth::user()->member) {
            
            // Jika status masih pending, blokir akses dan lempar ke halaman waiting
            if (Auth::user()->member->status === 'pending') {
                return redirect()->route('member.waiting');
            }
        }

        return $next($request);
    }
}