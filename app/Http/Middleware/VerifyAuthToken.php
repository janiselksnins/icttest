<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;



class VerifyAuthToken {

    public function handle(Request $request, Closure $next) {
	if (!PersonalAccessToken::findToken($request->sid)){
		return response()->json([
			    'status' => false,
			    'message' => 'Incorect or expired SID.',
				], 403);
		exit;
	    }

	return $next($request);
    }

}
