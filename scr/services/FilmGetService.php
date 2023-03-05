<?php
namespace WhatToWatch\services;
use WhatToWatch\services\FilmRepositoryInterface;

class FilmGetService
{
    private $repository;

    public function __construct(FilmRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function save(string $filmId)
    {
        return $this->repository->save($filmId);
    }

    public function getInfo()
    {
        return $this->repository->getInfo();
    }

}