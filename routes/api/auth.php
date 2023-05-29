<?php

use App\Http\Controllers\Auth\CreateUserAccessTokenController;

Route::post('/get-token', CreateUserAccessTokenController::class);

Route::get('/me', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');