<?php

use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/repositories/sync', [RepositoryController::class, 'fetchStarredRepositories']);

Route::post('/repositories/{repositoryId}/tags', [TagController::class, 'addTag']);
Route::delete('/repositories/{repositoryId}/tags/{tagId}', [TagController::class, 'removeTag']);
Route::get('/repositories/search', [TagController::class, 'searchByTag']);

