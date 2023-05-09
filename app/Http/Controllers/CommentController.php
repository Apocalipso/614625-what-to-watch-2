<?php
namespace App\Http\Controllers;

use App\Http\Responses\ErrorResponse;
use App\Http\Responses\SuccessResponse;
use App\Models\Comment;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
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
        $comment = Comment::find($id);

        if (PermissionService::checkPermission($comment)) {
            return new SuccessResponse();
        }

        abort(Response::HTTP_FORBIDDEN, trans('auth.failed'));
    }

    public function destroy(int $id): SuccessResponse|ErrorResponse
    {
        $comment = Comment::find($id);

        if (PermissionService::checkPermission($comment)) {
            return new SuccessResponse([], Response::HTTP_NO_CONTENT);
        }

        abort(Response::HTTP_FORBIDDEN, trans('auth.failed'));
    }
}
