<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\ErrorResponse;
class FilmController extends Controller
{
    public function index(): SuccessResponse|ErrorResponse
    {
        return new SuccessResponse();
    }

    public function store(Request $request): SuccessResponse|ErrorResponse
    {
        return new SuccessResponse([], Response::HTTP_CREATED);
    }

    public function show($id): SuccessResponse|ErrorResponse
    {
        $data = ['Error' => 'Error getting data.'];
        return new ErrorResponse($data);
    }

    public function update(Request $request, $id): SuccessResponse|ErrorResponse
    {
        return new SuccessResponse([], Response::HTTP_NO_CONTENT);
    }
}
