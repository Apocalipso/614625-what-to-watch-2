<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\repositories\ImdbHtmlAcademyRepository;
use GuzzleHttp\Client;

class ImdbHtmlAcademyRepositoryTest extends TestCase
{
    public function test_find_film_by_id()
    {

        $httpClient = new Client();
        $repository = new ImdbHtmlAcademyRepository($httpClient);
        $successData = [
            "imdb_id",
            "name",
            "desc",
            "director",
            "actors",
            "run_time",
            "released",
            "genres",
            "poster",
            "icon",
            "background",
            "video",
            "preview",
        ];

        $imdbId = 'tt0111161';

        $responseData = $repository->findById($imdbId);

        foreach ($successData as $key) {
            $this->assertArrayHasKey($key, $responseData);
        }
    }
}
