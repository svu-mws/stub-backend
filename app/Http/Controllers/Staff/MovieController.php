<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Czim\Repository\ExtendedRepository;
use App\Http\Controllers\Movie\MovieController as SingleController;


class MovieController extends Controller
{
    protected $staff;

    public function __construct(ExtendedRepository $staff)
    {
        $this->staff = $staff;
    }

    public function index($id)
    {
        return $this->staff->findOrFail($id)->movies;
    }

    public function show($staffId, $movieId)
    {
        return app(SingleController::class)->show($movieId);
    }

    public function destroy($staffId, $movieId)
    {
        return response($this->findStaff($staffId)->movies()->detach($movieId), 202);
    }

    private function findStaff($staffId)
    {
        return $this->staff->findOrFail($staffId);
    }
}
