<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        if(Auth::attempt($request->all())){
            $user = Auth::user();
            return response()->json([
                'user' => $user,
                'token' => $user->createToken()->plainTextToken,
            ]);
        }

        return response()->json([], 402);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): JsonResponse
    {
        Auth::user()->tokens()->delete();

        return response()->json(status: 200);
    }
}
