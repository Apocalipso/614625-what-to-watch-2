<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\ErrorResponse;
use App\Http\Requests\AddFilmRequest;
use App\Models\Film;
use App\Jobs\AddFilmJob;
class FilmController extends Controller
{
    public function index(): SuccessResponse|ErrorResponse
    {
        return new SuccessResponse();
    }

    public function store(AddFilmRequest $request): SuccessResponse|ErrorResponse
    {
        $this->authorize('create', Film::class);
        AddFilmJob::dispatch($request->imdbId);
        return new SuccessResponse([], Response::HTTP_CREATED);
    }

    public function show($id): SuccessResponse|ErrorResponse
    {
        return new SuccessResponse();
    }

    public function update(Request $request,int $id): SuccessResponse|ErrorResponse
    {
        $this->authorize('update', Film::class);

        return new SuccessResponse();
    }
}
