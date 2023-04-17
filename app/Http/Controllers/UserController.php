<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\ErrorResponse;


class UserController extends Controller
{
    public function show($id): SuccessResponse|ErrorResponse
    {
        return new ErrorResponse([], Response::HTTP_NOT_FOUND);
    }

    public function update(Request $request, $id): SuccessResponse|ErrorResponse
    {
        return new SuccessResponse();
    }
}
