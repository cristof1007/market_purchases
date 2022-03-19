<?php

namespace App\Http\Middleware;

use App\Models\Login;
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
        $registerLogin = Login::where('status', 1)
        ->where('id_user', $request->header('id'))
        ->where('token', $request->header('token'))
        ->first();

        // if ($registerLogin == null) {
        //     abort(403, 'Access denied');
        // }

        return $next($request);
    }
}
