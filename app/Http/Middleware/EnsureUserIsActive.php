<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if (! $user->is_admin) {
            if ($user->status == 'pending') {
                return back()->withError('Your account has not been verified, so you cannot perform this action.');
            } elseif ($user->status == 'declined') {
                return back()->withError('Your account verification document were declined as they did no meet our verification criteria. Contact support.');
            } elseif ($user->status == 'suspended') {
                return back()->withError('Your account has not been suspended. Contact support if our judgement is inaccurate');
            }
        }

        return $next($request);
    }
}
