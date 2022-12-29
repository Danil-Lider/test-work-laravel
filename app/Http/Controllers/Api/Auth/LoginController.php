<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $have_in_db = $request->only(['email', 'password']);

        if(!$token = auth()->attempt($have_in_db)){
            return response()->json([ 'error' => true, 'message' => 'Incorrect Login/Password'], 401);
        }

        return response()->json(['token' => $token]);
    }
}
