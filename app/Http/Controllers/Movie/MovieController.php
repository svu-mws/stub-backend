<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\AuthenticatedShowOnlyController;
use Czim\Repository\ExtendedRepository;
use Illuminate\Http\Request;

class MovieController extends AuthenticatedShowOnlyController
{
    protected $movies;

    public function __construct(ExtendedRepository $movies)
    {
        parent::__construct();
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
