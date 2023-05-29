<?php

use App\Http\Controllers\Categories\GetAllCategoriesController;
use App\Http\Controllers\Categories\SyncUserCategoriesController;

Route::post('/sync', SyncUserCategoriesController::class);
Route::get('/all', GetAllCategoriesController::class);
