<?php

namespace App\repositories;

use App\repositories\MovieRepositoryInterface;

class ImdbHtmlAcademyRepository implements MovieRepositoryInterface
{
    private const IMDB_URI = 'http://guide.phpdemo.ru/api/films/';

    private $httpClient;

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function findById(string $imdbId): ?array
    {
        $response = $this->httpClient->request('GET', self::IMDB_URI . $imdbId);

        $body = $response->getBody();

        return json_decode($body->getContents(), true);
    }
}
