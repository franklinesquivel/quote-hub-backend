<?php


use App\Constants\UserTypesAbilitiesConstant;
use App\Http\Controllers\QuoteProposal\CreateQuoteProposalController;
use App\Http\Controllers\QuoteProposal\GetAllQuoteProposalsController;
use App\Http\Controllers\QuoteProposal\ReviewQuoteProposalcontroller;


Route::post('/', CreateQuoteProposalController::class)
    ->middleware(['auth:sanctum', 'abilities:is-user']);


Route::middleware(['auth:sanctum', 'abilities:is-admin'])->group(function () {
    Route::get('/', GetAllQuoteProposalsController::class);
    Route::patch('/{quote_proposal}', ReviewQuoteProposalcontroller::class);
});