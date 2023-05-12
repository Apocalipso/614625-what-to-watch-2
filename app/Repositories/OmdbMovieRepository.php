<?php

namespace App\repositories;

use App\Repositories\MovieRepositoryInterface;


class OmdbMovieRepository implements MovieRepositoryInterface
{
    private const OMDB_URI = 'http://www.omdbapi.com/';

    private $httpClient;

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function findById(string $imdbId): ?array
    {
        $query = [
            'i' => $imdbId,
            'apikey' => '8aadef61',
        ];

        $response = $this->httpClient->request('GET', self::OMDB_URI, ['query' => $query]);

        $body = $response->getBody();

        return json_decode($body->getContents(), true);
    }
}
