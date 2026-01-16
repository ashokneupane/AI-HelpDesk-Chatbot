<?php

use App\Http\Controllers\DialogFlowController;
use Illuminate\Support\Facades\Route;

Route::post('/dialogflow-webhook', [DialogFlowController::class, 'handle']);

// Route::post('/dialogflow-webhook', [DialogFlowController::class, 'handle']);


