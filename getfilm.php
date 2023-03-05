<?php
require 'vendor/autoload.php';
use WhatToWatch\services\FilmGetService;
use WhatToWatch\services\OmdbFilmRepository;

$repository = new OmdbFilmRepository();
$film = new FilmGetService($repository);
$film->save('tt3896198');
echo $film->getInfo();
