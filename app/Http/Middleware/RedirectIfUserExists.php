<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class RedirectIfUserExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(
        $request,
        Closure $next
    ) {
        if (User::exists()) {
            return redirect()
                ->guest(route('login'))
                ->with('status', __('User registration disabled.'));
        }

        return $next($request);
    }
}
