<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use Czim\Repository\ExtendedRepository;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    protected $movies;

    public function __construct(ExtendedRepository $movies)
    {
        $this->movies = $movies;
    }

    public function index()
    {
        return $this->movies->all();
    }

    public function store(Request $request)
    {
        return response($this->movies->create($request->all()), 201);
    }

    public function show($id)
    {
        return $this->movies->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        return response($this->movies->update($request->all(), $id), 204);
    }

    public function destroy($id)
    {
        return response($this->movies->delete($id), 202);
    }
}
