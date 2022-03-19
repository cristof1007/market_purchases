<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class VerifyToken
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $registerLogin = User::where('active', 1)
        ->where('id', $request->header('id'))
        ->where('remember_token', $request->header('token'))
        ->first();

        if ($registerLogin == null) {
            abort(403, 'Access denied');
        }

        return $next($request);
    }
}
