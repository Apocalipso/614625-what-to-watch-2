<?php
require 'vendor/autoload.php';
use WhatToWatch\services\FilmGetService;

$interface = new WhatToWatch\services\OmdbFilmRepository();

$film = new FilmGetService($interface);

$film->save('tt3896198');
echo $film->getInfo();
