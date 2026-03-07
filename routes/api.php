<?php

use App\Http\Controllers\Api\OpenAiController;
use App\Http\Controllers\Api\TestApiController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

// API маршрут для общения с GPT
Route::post('/ask-gpt', [OpenAiController::class, 'askGPT']);

// API маршруты для тестирования слов
Route::get('/test', [TestApiController::class, 'index']);
Route::post('/check', [TestApiController::class, 'check']);