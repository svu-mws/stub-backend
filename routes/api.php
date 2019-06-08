<?php

use Illuminate\Support\Facades\Route;

Route::post('login', 'UserController@login');
Route::post('logout', 'UserController@logout');
Route::apiResource('users', 'UserController');
Route::namespace('Staff')->group(static function () {
    Route::apiResource('staff', 'StaffController');
    Route::apiResource('staff.movies', 'MovieController', ['except' => ['store', 'update']]);
    Route::apiResource('staff.job_roles', 'JobRoleController', ['except' => ['store', 'update']]);
});
Route::namespace('Movie')->group(static function () {
    Route::apiResource('movies', 'MovieController');
    Route::apiResource('movies.staff', 'StaffController', ['except' => ['update']]);
});

Route::apiResource('genres', 'GenresController');
Route::apiResource('job_roles', 'JobRoleController');
