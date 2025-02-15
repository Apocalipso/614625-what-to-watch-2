<?php

namespace App\services;

use App\Repositories\MovieRepositoryInterface;
use App\Repositories\ImdbHtmlAcademyRepository;
use App\Models\Actor;
use App\Models\Film;
use App\Models\Genre;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FilmService
{
    public function __construct(
        private readonly MovieRepositoryInterface $movieRepository = new ImdbHtmlAcademyRepository(new Client()),
    ) {
    }

    public function searchFilm(string $imdbId): array|null
    {
        return $this->movieRepository->findById($imdbId);
    }

    private function createFilm(array $filmData): Film
    {
        return new Film([
            'title' => $filmData['name'],
            'poster_image' => $filmData['poster'],
            'description' => $filmData['desc'],
            'director' => $filmData['director'],
            'run_time' => $filmData['run_time'],
            'released' => $filmData['released'],
            'imdb_id' => $filmData['imdb_id'],
            'status' => FILM::PENDING,
            'video_link' => $filmData['video'],
        ]);
    }

    public function saveFilm(array $filmData): void
    {
        try {
            $actorsId = [];
            $genresId = [];
            $actors = $filmData['actors'];
            $genres = $filmData['genres'];

            DB::beginTransaction();

            if (is_iterable($actors)) {
                foreach ($actors as $actor) {
                    $actorsId[] = Actor::firstOrCreate(['name' => $actor])->id;
                }
            }

            if (is_iterable($genres)) {
                foreach ($genres as $genre) {
                    $genresId[] = Genre::firstOrCreate(['title' => $genre])->id;
                }
            }

            $film = $this->createFilm($filmData);
            $film->save();

            $film->actors()->attach($actorsId);
            $film->genres()->attach($genresId);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::warning($exception->getMessage());
        }
    }
}
