<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});
Route::get('/posts', [\App\Http\Controllers\Api\PostController::class, 'index'])->name('api.posts.index');
Route::post('/posts', [\App\Http\Controllers\Api\PostController::class, 'store'])->name('api.posts.store');
Route::get('/schedule/posts', [\App\Http\Controllers\Api\PostController::class, 'schedulesPost']);
Route::put('/schedule/posts', [\App\Http\Controllers\Api\PostController::class, 'schedule']);
