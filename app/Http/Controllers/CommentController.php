<?php
namespace App\Http\Controllers;

use App\Http\Responses\ErrorResponse;
use App\Http\Responses\SuccessResponse;
use App\Models\Comment;
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

        $this->authorize('update', $comment);
        return new ApiSuccessResponse();
    }

    public function destroy(int $id): SuccessResponse|ErrorResponse
    {
        $comment = Comment::find($id);

        $this->authorize('delete', $comment);
        return new ApiSuccessResponse([], Response::HTTP_NO_CONTENT);
    }
}
