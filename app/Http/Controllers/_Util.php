<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class _Util
{
    public static function getCurrentApiUser(Request $request) {
        $user = User::where('active', 1)
        ->where('id', $request->header('id'))
        ->where('remember_token', $request->header('token'))
        ->first();
        return $user;
    }
}
