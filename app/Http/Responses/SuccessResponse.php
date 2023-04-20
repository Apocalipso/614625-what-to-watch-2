<?php

namespace App\Http\Responses;

use Symfony\Component\HttpFoundation\Response;
use App\Http\Responses\AbstractResponse;
class SuccessResponse extends AbstractResponse
{
    /** формирование ответа
     * @return array
     */
    protected function makeResponseData(): array
    {
        return [
            'data' => $this->prepareData()
        ];
    }
}
