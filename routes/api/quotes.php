<?php

use App\Http\Controllers\Quotes\CreateQuoteController;
use App\Http\Controllers\Quotes\GetUserFavoriteQuotesController;

Route::post('/', CreateQuoteController::class);
Route::get('/favorite', GetUserFavoriteQuotesController::class);
