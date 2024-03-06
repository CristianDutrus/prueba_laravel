<?php

use App\HTTP\Controllers\APIController;
use App\HTTP\Controllers\EntitiesController;
use App\HTTP\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

// Third party
Route::get('/get-third-party', [APIController::class, 'getThirdPartyData']);
Route::get('/save-third-party', [APIController::class, 'saveThirdPartyData']);

// Entities Controller
Route::get('/get-entities', [EntitiesController::class, 'getEntities']);

// Categories Controller
Route::get('/get-categories', [CategoriesController::class, 'getCategories']);
