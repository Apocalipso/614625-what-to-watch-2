<?php
require 'vendor/autoload.php';
use WhatToWatch\services\FilmGetService;

$film = new FilmGetService();

$film->save('tt3896198');
$film->getInfo();
echo $film->showInfo();
