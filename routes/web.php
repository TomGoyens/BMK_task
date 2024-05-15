<?php

use Illuminate\Support\Facades\Route;

Route::get('api/films', [\App\Http\Controllers\Api\FilmController::class, 'index']);
Route::get('api/films/{id}', [\App\Http\Controllers\Api\FilmController::class, 'show']);
Route::get('api/people', [\App\Http\Controllers\Api\PeopleController::class, 'index']);

Route::get('{any?}', function () {
    return view('welcome');
})->where('any', '.*');
