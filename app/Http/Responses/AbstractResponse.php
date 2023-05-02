<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
abstract class AbstractResponse implements Responsable
{
    protected mixed $data = [];
    public int $code;

    /**
     * @param mixed $data
     * @param int $code
     */
    public function __construct(mixed $data = [], int $code = Response::HTTP_OK)
    {
        $this->data = $data;
        $this->code = $code;
    }

    /**
     * @param $request
     * @return JsonResponse|Response
     */
    public function toResponse($request): Response
    {
        return response()->json($this->makeResponseData(), $this->code);
    }

    /**
     * @return array|null
     */
    protected function prepareData(): array
    {
        if ($this->data instanceof Arrayable) {
            return $this->data->toArray();
        }
        return $this->data;
    }

    /**
     * @return array|null
     */
    abstract protected function makeResponseData(): array;
}
