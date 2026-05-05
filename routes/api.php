<?php

use App\Http\Controllers\Api\v1\ApiPostController;
use App\Http\Controllers\Api\v1\ApiRoutineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('v1/posts', ApiPostController::class)
    ->middlewareFor(['index', 'show'], ['auth:sanctum', 'abilities:posts:read'])
    ->middlewareFor(['store'], ['auth:sanctum', 'abilities:posts:create'])
    ->middlewareFor(['update'], ['auth:sanctum', 'abilities:posts:update'])
    ->middlewareFor(['destroy'], ['auth:sanctum', 'abilities:posts:delete']);

Route::apiResource('v1/routines', ApiRoutineController::class)
    ->middlewareFor(['index', 'show'], ['auth:sanctum', 'abilities:routines:read'])
    ->middlewareFor(['store'], ['auth:sanctum', 'abilities:routines:create'])
    ->middlewareFor(['update'], ['auth:sanctum', 'abilities:routines:update'])
    ->middlewareFor(['destroy'], ['auth:sanctum', 'abilities:routines:delete']);