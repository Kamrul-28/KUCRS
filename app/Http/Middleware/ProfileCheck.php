<?php

namespace App\Http\Middleware;

use App\Models\UserDetails;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProfileCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (UserDetails::where('user_id', Auth::user()->id)->exists() || Auth::user()->role_id <= 2) {
            return $next($request);
        }

        return redirect()->route('profile.userProfile')->with('warning', 'Please Update Profile First');
    }
}
