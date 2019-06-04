<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\AuthenticatedShowOnlyController;
use Czim\Repository\ExtendedRepository;

class MovieController extends AuthenticatedShowOnlyController
{
    protected $staff;

    public function __construct(ExtendedRepository $staff)
    {
        parent::__construct();
        $this->staff = $staff;
    }

    public function index($id)
    {
        return $this->staff->findOrFail($id)->movies;
    }

    public function show($staffId, $movieId)
    {
        return $this->findStaff($staffId)->movies()->findOrFail($movieId);
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
