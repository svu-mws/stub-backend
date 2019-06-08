<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Czim\Repository\ExtendedRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\JobRoleController as SingleController;

class JobRoleController extends Controller
{

    protected $staff;

    public function __construct(ExtendedRepository $staff)
    {
        parent::__construct();
        $this->staff = $staff;
    }

    public function index($id)
    {
        return $this->staff->findOrFail($id)->jobRoles;
    }

    public function store(Request $request, $id)
    {
        return response($this->findStaff($id)->jobRoles()->attach($request->input('job_role_id')), 201);
    }

    public function show($staffId, $jobRoleId)
    {
        return app(SingleController::class)->show($jobRoleId);
    }

    public function destroy($staffId, $jobRoleId)
    {
        return response($this->findStaff($staffId)->jobRoles()->detach($jobRoleId), 202);
    }

    private function findStaff($staffId)
    {
        return $this->staff->findOrFail($staffId);
    }

}
