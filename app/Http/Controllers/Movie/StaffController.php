<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use Czim\Repository\ExtendedRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Staff\StaffController as SingleController;


class StaffController extends Controller
{
    protected $movies;

    public function __construct(ExtendedRepository $movies)
    {
        $this->movies = $movies;
    }

    public function index($id)
    {
        $movie = $this->findMovie($id);
        $staff = $movie->staff->map(static function ($staff) {
            return [
                'full_name' => $staff->present()->fullName,
                'image_url' => $staff->profile_image
            ];
        });
        $jobRoles = $movie->jobRoles->map(static function ($jobRole) {
            return [
                'title' => $jobRole->title
            ];
        });
        $combined = $staff->zip($jobRoles)->map(function ($arr) {
            return array_merge($arr[0], $arr[1]);
        });
        return $combined;
    }

    public function show($movieId, $staffId)
    {
        return app(SingleController::class)->show($staffId);
    }

    public function store(Request $request, $movieId)
    {
        $movie = $this->findMovie($movieId);
        [$staffId, $jobRoleId] = $request->only(['staff_id', 'job_role_id']);
        return response($movie->staff()->attach($staffId, ['job_role_id' => $jobRoleId]), 201);
    }

    public function destroy($movieId, $staffId)
    {
        return response($this->findMovie($movieId)->staff()->detach($staffId), 202);
    }

    private function findMovie($movieId)
    {
        return $this->movies->findOrFail($movieId);
    }
}
