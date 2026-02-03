<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('users', \App\Http\Controllers\GameController::class);
Route::resource('games', \App\Http\Controllers\GameController::class);
Route::resource('ratings', \App\Http\Controllers\RatingController::class);
Route::resource('comments', \App\Http\Controllers\CommentController::class);

