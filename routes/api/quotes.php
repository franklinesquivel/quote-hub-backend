<?php

use App\Http\Controllers\Quotes\CreateQuoteController;
use App\Http\Controllers\Quotes\GetUserFavoriteQuotesController;
use App\Http\Controllers\Quotes\Proposals\CreateQuoteProposalController;
use App\Http\Controllers\Quotes\Proposals\GetAllPendingForApprovalProposalsController;
use App\Http\Controllers\Quotes\Proposals\ReviewQuoteProposalController;

Route::post('/', CreateQuoteController::class);
Route::get('/favorite', GetUserFavoriteQuotesController::class);
Route::get('/proposal', GetAllPendingForApprovalProposalsController::class);
Route::post('/proposal', CreateQuoteProposalController::class);
Route::patch('/proposal/{quote_proposal}', ReviewQuoteProposalController::class);