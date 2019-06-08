<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Czim\Repository\ExtendedRepository;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    protected $staff;

    public function __construct(ExtendedRepository $staff)
    {
        $this->staff = $staff;
    }

    public function index()
    {
        return $this->staff->all();
    }

    public function show($id)
    {
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
