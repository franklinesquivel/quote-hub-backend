<?php

use App\Http\Controllers\Auth\CreateUserAccessTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/get-token', CreateUserAccessTokenController::class);

    Route::get('/me', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
});

Route::get('/admin-test', fn() => [])->middleware(['auth:sanctum', 'abilities:is-admin']);