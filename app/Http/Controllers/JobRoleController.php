<?php

namespace App\Http\Controllers;

use Czim\Repository\ExtendedRepository;
use Illuminate\Http\Request;

class JobRoleController extends AuthenticatedShowOnlyController
{
    protected $jobRoles;

    public function __construct(ExtendedRepository $jobRoles)
    {
        parent::__construct();
        $this->jobRoles = $jobRoles;
    }

    public function index()
    {
        return $this->jobRoles->all();
    }

    public function store(Request $request)
    {
        return response($this->jobRoles->create($request->all()), 201);
    }

    public function show($id)
    {
        return $this->jobRoles->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        return response($this->jobRoles->update($request->all(), $id), 204);
    }

    public function destroy($id)
    {
        return response($this->jobRoles->delete($id), 201);
    }

}
