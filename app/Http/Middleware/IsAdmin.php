<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return RedirectResponse|Response|JsonResponse
     */
    public function handle(Request $request, Closure $next): RedirectResponse|Response|JsonResponse
    {
        $id = Auth::id();
        if(isAdmin($id)){
            return $next($request);
        }
        return redirect()->route('home')
            ->with('status', 'Permission denied! You aren\'t an admin.');
    }
}
