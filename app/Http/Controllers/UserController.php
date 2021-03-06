<?php

namespace App\Http\Controllers;


use Czim\Repository\ExtendedRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $users;

    public function __construct(ExtendedRepository $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        $users = $this->users->all();
        $users = $users->map(static function ($user) {
            return $user->present()->flatten();
        });
        return $users;
    }

    public function store(Request $request)
    {
        $user = $this->users->create($request->all());
        $token = auth()->login($user);
        return $this->respondWithToken($token);
    }

    public function show($id)
    {
        return $this->users->findOrFail($id)->present()->flatten();
    }

    public function update(Request $request, $id)
    {
        return response($this->users->update($request->all(), $id), 204);
    }

    public function destroy($id)
    {
        return response($this->users->delete($id), 202);
    }


    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
