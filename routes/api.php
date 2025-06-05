<?php

use App\Http\Controllers\Api\OpenAiController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

Route::post('/ask-gpt', [OpenAiController::class, 'askGPT']);
