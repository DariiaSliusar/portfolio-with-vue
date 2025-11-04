<?php

use App\Http\Controllers\api\AboutController;
use App\Http\Controllers\api\MediaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('abouts', [AboutController::class, 'edit']);
Route::post('abouts', [AboutController::class, 'update']);
//medias routes
 Route::get('/admin/medias', [MediaController::class, 'index']);
