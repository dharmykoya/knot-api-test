<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function signup(RegisterUserRequest $request)
    {
        try {
            $newUser = $this->authService->registerUser($request->validated());
        } catch (\Exception $exception) {
            return response()->internalServerError('Something went wrong ,please contact support');
        }

        $newUser['token'] = $newUser->createToken('API Token')->accessToken;

        return  response()->created($newUser);
    }
}
