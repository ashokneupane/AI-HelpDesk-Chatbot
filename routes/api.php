<?php

use App\Http\Controllers\DialogFlowController;
use Illuminate\Support\Facades\Route;

// Route::post(uri: '/dialogflow-webhook', [DialogFlowController::class, 'handle']);

Route::get('/dialogflow-webhook', function(){
    return 'hello';
});

