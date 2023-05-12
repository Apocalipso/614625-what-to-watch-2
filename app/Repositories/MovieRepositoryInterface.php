<?php
namespace App\Repositories;

interface MovieRepositoryInterface
{
    public function findById(string $id);
}
