<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\ErrorResponse;
use App\services\PermissionService;


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

    public function update(Request $request,int $id): SuccessResponse|ErrorResponse
    {
        if (!PermissionService::checkPermission() ) {
            abort(Response::HTTP_FORBIDDEN, trans('auth.failed'));
        }
        return new SuccessResponse();
    }

    public function destroy($id): SuccessResponse|ErrorResponse
    {
        return new ErrorResponse([], Response::HTTP_NOT_FOUND);
    }
}
