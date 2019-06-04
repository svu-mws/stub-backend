<?php


namespace App\Http\Controllers;


class AuthenticatedShowOnlyController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'show']]);
    }
}
