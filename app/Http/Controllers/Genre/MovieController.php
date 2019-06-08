<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use Czim\Repository\ExtendedRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Movie\MovieController as SingleController;

class MovieController extends Controller
{
    protected $genres;

    public function __construct(ExtendedRepository $genres)
    {
        $this->genres = $genres;
    }


    public function index($genreId)
    {
        return $this->findGenre($genreId)->movies;
    }

    public function store(Request $request, $genreId)
    {
        return response($this->findGenre($genreId)->movies()->attach($request->input('movie_id')), 201);
    }

    public function show($genreId, $movieId)
    {
        return app(SingleController::class)->show($movieId);
    }

    public function destroy($genreId, $movieId)
    {
        return response($this->findGenre($genreId)->movies()->detach($movieId), 202);
    }

    private function findGenre($genreId)
    {
        return $this->genres->findOrFail($genreId);
    }
}
