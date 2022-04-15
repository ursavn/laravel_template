<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|String
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->hasRole('super-admin') || auth()->user()->active == ON) {
            return $next($request);
        }
        $isApiRequest = in_array('api',$request->route()->getAction('middleware'));
        if ($isApiRequest || $request->wantsJson()) {
            return response()->json(['message' => 'Your account is inactive'], 403);
        }
        return redirect()->route('home');
    }
}
