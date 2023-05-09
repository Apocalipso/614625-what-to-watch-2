<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\ErrorResponse;
use App\services\PermissionService;
class FilmController extends Controller
{
    public function index(): SuccessResponse|ErrorResponse
    {
        return new SuccessResponse();
    }

    public function store(Request $request): SuccessResponse|ErrorResponse
    {
        if (!PermissionService::checkPermission()) {
            abort(Response::HTTP_FORBIDDEN, trans('auth.failed'));
        }

        return new SuccessResponse([], Response::HTTP_CREATED);
    }

    public function show($id): SuccessResponse|ErrorResponse
    {
        return new SuccessResponse();
    }

    public function update(Request $request,int $id): SuccessResponse|ErrorResponse
    {
        if (!PermissionService::checkPermission()) {
            abort(Response::HTTP_FORBIDDEN, trans('auth.failed'));
        }

        return new SuccessResponse();
    }
}
