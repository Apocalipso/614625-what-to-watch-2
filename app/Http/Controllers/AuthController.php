<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\ErrorResponse;
use \App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) : SuccessResponse|ErrorResponse
    {
        $params = $request->safe()->except('file');

        $params['password'] = Hash::make($params['password']);

        $user = User::create($params);

        $token = $user->createToken('auth-token');

        $data = [
            'user' => $user,
            'token' => $token->plainTextToken,
        ];

        return new SuccessResponse($data, Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request): SuccessResponse|ErrorResponse
    {
        if (!Auth::attempt($request->validated())) {
            abort(Response::HTTP_UNAUTHORIZED, trans('auth.failed'));
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            abort(Response::HTTP_UNAUTHORIZED, trans('auth.failed'));
        }

        $token = $user->createToken('auth-token');

        $data = ['token' => $token->plainTextToken];
        return new SuccessResponse($data);
    }

    public function logout(): SuccessResponse|ErrorResponse
    {
        Auth::user()->tokens()->delete();
        return new SuccessResponse([], Response::HTTP_NO_CONTENT);
    }
}
