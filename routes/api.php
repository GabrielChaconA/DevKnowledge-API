<?php

use App\Http\Controllers\Api\HealthController;
use App\Http\Controllers\Api\TopicController;
use App\Http\Controllers\Api\SubtopicController;
use App\Http\Controllers\Api\ExerciseController;
use App\Http\Controllers\Api\QuestionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| DevKnowledge API Routes
|--------------------------------------------------------------------------
*/

// Health Check (para Render)
Route::get('/health', HealthController::class);

// Topics
Route::prefix('topics')->group(function () {
    Route::get('/', [TopicController::class, 'index']);
    Route::get('/{id}', [TopicController::class, 'show']);
    Route::get('/{id}/subtopics', [TopicController::class, 'subtopics']);
    Route::get('/{id}/full', [TopicController::class, 'full']);
});

// Subtopics
Route::prefix('subtopics')->group(function () {
    Route::get('/{id}', [SubtopicController::class, 'show']);
    Route::get('/{id}/information', [SubtopicController::class, 'information']);
    Route::get('/{id}/flashcards', [SubtopicController::class, 'flashcards']);
    Route::get('/{id}/exercises', [SubtopicController::class, 'exercises']);
    Route::get('/{id}/questions', [SubtopicController::class, 'questions']);
    Route::get('/{id}/full', [SubtopicController::class, 'full']);
});

// Exercises
Route::get('/exercises/{id}', [ExerciseController::class, 'show']);

// Questions
Route::get('/questions/{id}', [QuestionController::class, 'show']);
