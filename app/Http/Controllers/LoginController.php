<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController extends Controller
{
    /**
     * @param LoginRequest $request
     * @throws \Exception
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth('api')->attempt($credentials)) {
            throw new \Exception('Invalid login or password.', JsonResponse::HTTP_UNAUTHORIZED);
        }

        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ];

        return response()->json($data, JsonResponse::HTTP_OK);
    }

    /**
     * @return JsonResponse
     * @throws \Exception
     */
    public function logout()
    {
      try {
          JWTAuth::invalidate(JWTAuth::getToken());
      } catch (JWTException $exception) {
          throw new \Exception('Sorry, the user cannot be logged out', JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
      }

      return response()->json(null, JsonResponse::HTTP_OK);
    }
}