<?php

use Illuminate\Support\Facades\Route;


$nested_array_except = ['except' => ['update']];

Route::post('login', 'UserController@login');
Route::post('logout', 'UserController@logout');
Route::apiResource('users', 'UserController');
Route::namespace('Staff')->group(static function () use ($nested_array_except) {
    Route::apiResource('staff', 'StaffController');
    Route::apiResource('staff.movies', 'MovieController', $nested_array_except);
    Route::apiResource('staff.job_roles', 'JobRoleController', $nested_array_except);
});
Route::namespace('Movie')->group(static function () use ($nested_array_except) {
    Route::apiResource('movies', 'MovieController');
    Route::apiResource('movies.staff', 'StaffController', $nested_array_except);
});

Route::namespace('Genre')->group(static function () use ($nested_array_except) {
    Route::apiResource('genres', 'GenreController');
    Route::apiResource('genres.movie', 'MovieController', $nested_array_except);
});

Route::namespace('JobRole')->group(static function () use ($nested_array_except) {
    Route::apiResource('job_roles', 'JobRoleController');
});

