<?php

use App\Http\Controllers\Auth\CreateUserAccessTokenController;
use App\Http\Controllers\Auth\GetAuthUserController;

Route::post('/get-token', CreateUserAccessTokenController::class);
Route::get('/me', GetAuthUserController::class);