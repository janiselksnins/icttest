<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Attributes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller {

    public function login(Request $request) {
//echo Hash::make('1234');exit;
	try {
	    $validateUser = Validator::make($request->all(),
			    [
				'uid' => 'required',
				'password' => 'required'
	    ]);

	    if ($validateUser->fails()) {
		return response()->json([
			    'status' => false,
			    'message' => 'validation error',
			    'errors' => $validateUser->errors()
				], 401);
	    }

	    if (!Auth::attempt($request->only(['uid', 'password']))) {
		return response()->json([
			    'status' => false,
			    'message' => 'Uid & password does not match with our record.',
				], 401);
	    }

	    if (Auth::attempt($request->only(['uid', 'password']))) {
		$request->session()->regenerate();

		$user = User::where('uid', $request->uid)->first();
		$user->tokens()->delete();

		return response()->json([
			    'SID' => $user->createToken("API TOKEN")->plainTextToken
				], 200);
	    }
	} catch (\Throwable $th) {
	    return response()->json([
			'status' => false,
			'message' => $th->getMessage()
			    ], 500);
	}
    }

    public function logout(Request $request) {
	if (PersonalAccessToken::findToken($request->sid)) {
	    PersonalAccessToken::findToken($request->sid)->delete();
	    return response()->json([
			'status' => true,
			'message' => 'Session ended',
			    ], 200);
	} else {
	    return response()->json([
			'status' => false,
			'message' => 'Incorect or expired SID.',
			    ], 401);
	}
    }

}
