<?php
namespace WhatToWatch\services;

use WhatToWatch\services\FilmRepository;
use GuzzleHttp;

class OmdbFilmRepository implements FilmRepositoryInterface
{
    private $apiKey = '6defab64';
    private $site = 'https://www.omdbapi.com';

    public function save($id)
    {
        $this->id = $id;
    }

    public function getInfo()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get($this->site . '/?apikey=' . $this->apiKey . '&i=' . $this->id);
        return $response->getBody();
    }
}