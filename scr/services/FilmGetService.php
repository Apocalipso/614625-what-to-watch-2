<?php
namespace WhatToWatch\services;

use GuzzleHttp;

interface FilmRepository {
    public function save($id);
    public function getInfo();
    public function showInfo();
}

class FilmGetService implements FilmRepository
{
    private $id;
    private $info;
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
        $this->info = $response->getBody();
    }

    public function showInfo()
    {
        return $this->info;
    }
}