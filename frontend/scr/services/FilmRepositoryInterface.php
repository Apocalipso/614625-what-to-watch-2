<?php
namespace WhatToWatch\services;
interface FilmRepositoryInterface
{
    public function save($id);
    public function getInfo();
}