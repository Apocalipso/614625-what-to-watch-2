<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\ErrorResponse;

class GenreController extends Controller
{
    public function index(): SuccessResponse|ErrorResponse
    {
        return new SuccessResponse();
    }

    public function store(Request $request): SuccessResponse|ErrorResponse
    {
        return new SuccessResponse([], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id): SuccessResponse|ErrorResponse
    {
        return new SuccessResponse([], Response::HTTP_NO_CONTENT);
    }

    public function destroy($id): SuccessResponse|ErrorResponse
    {
        return new ErrorResponse([], Response::HTTP_NOT_FOUND);
    }
}
