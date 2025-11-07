<?php

use App\Http\Controllers\api\AboutController;
use App\Http\Controllers\api\MediaController;
use App\Http\Controllers\api\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('abouts', [AboutController::class, 'edit']);
Route::post('abouts', [AboutController::class, 'update']);
//medias routes
Route::get('medias', [MediaController::class, 'index']);
Route::post('medias', [MediaController::class, 'store']);
Route::delete('medias/{media}', [MediaController::class, 'destroy']);
//services routes
Route::get('services', [ServiceController::class, 'index']);
Route::post('services', [ServiceController::class, 'store']);
Route::post('services/{service}', [ServiceController::class, 'update']);
Route::delete('services/{service}', [ServiceController::class, 'destroy']);
