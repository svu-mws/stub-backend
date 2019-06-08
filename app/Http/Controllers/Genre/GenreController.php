<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use Czim\Repository\ExtendedRepository;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    protected $genres;

    public function __construct(ExtendedRepository $genres)
    {
        $this->genres = $genres;
    }

    public function index()
    {
        return $this->genres->all();
    }

    public function store(Request $request)
    {
        return response($this->genres->create($request->all()), 201);
    }

    public function show($genreId)
    {
        return $this->genres->findOrFail($genreId);
    }

    public function update(Request $request, $genreId)
    {
        return response($this->genres->findOrFail($genreId)->update($request->all()), 204);
    }

    public function destroy($genreId)
    {
        return response($this->genres->delete($genreId), 202);
    }
}
