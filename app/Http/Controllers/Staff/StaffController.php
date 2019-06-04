<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\AuthenticatedShowOnlyController;
use Czim\Repository\ExtendedRepository;
use Barryvdh\Debugbar\Facade as DebugBar;
use Illuminate\Http\Request;

class StaffController extends AuthenticatedShowOnlyController
{

    protected $staff;

    public function __construct(ExtendedRepository $staff)
    {
        parent::__construct();
        $this->staff = $staff;
    }


    public function index()
    {
        return $this->staff->all();
    }

    public function show($id)
    {
        DebugBar::info('test');
        return $this->staff->findOrFail($id);
    }

    public function store(Request $request)
    {
        return response($this->staff->create($request->all()), 201);
    }

    public function update(Request $request, $id)
    {
        return response($this->staff->update($request->all(), $id), 204);
    }

    public function destroy($id)
    {
        return response($this->staff->delete($id), 202);
    }
}
