<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Genre\GenreController as SingleController;
use Czim\Repository\ExtendedRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    protected $movies;

    public function __construct(ExtendedRepository $movies)
    {
        $this->movies = $movies;
    }

    public function index($movieId)
    {
        return $this->findMovie($movieId)->genres;
    }

    public function show($movieId, $genreId)
    {
        return app(SingleController::class)->show($genreId);
    }

    public function store($movieId, Request $request)
    {
        $genreId = $request->input('genre_id');
        return response($this->findMovie($movieId)->genres()->attach($genreId), 201);
    }

    public function destroy($movieId, $genreId)
    {
        return response($this->findMovie($movieId)->genres()->detach($genreId), 202);
    }

    private function findMovie($id)
    {
        return $this->movies->findOrFail($id);
    }
}
