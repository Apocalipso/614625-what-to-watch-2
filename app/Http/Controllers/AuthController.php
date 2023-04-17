<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\ErrorResponse;

class AuthController extends Controller
{
    public function register(Request $request) : SuccessResponse|ErrorResponse
    {
        return new SuccessResponse([], Response::HTTP_CREATED);
    }

    public function login(Request $request): SuccessResponse|ErrorResponse
    {
        return new ErrorResponse([], Response::HTTP_UNAUTHORIZED, 'Ошибка авторизации.');
    }

    public function logout(): SuccessResponse|ErrorResponse
    {
        return new SuccessResponse([], Response::HTTP_NO_CONTENT);
    }
}
