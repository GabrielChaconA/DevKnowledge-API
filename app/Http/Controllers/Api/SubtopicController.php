<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubtopicResource;
use App\Http\Resources\InformationResource;
use App\Http\Resources\FlashcardResource;
use App\Http\Resources\ExerciseResource;
use App\Http\Resources\QuestionResource;
use App\Models\Subtopic;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubtopicController extends Controller
{
    /**
     * GET /api/subtopics/{id}
     * Detalle de un subtema.
     */
    public function show(int $id): SubtopicResource|JsonResponse
    {
        $subtopic = Subtopic::find($id);

        if (! $subtopic) {
            return response()->json(['message' => 'Subtopic not found.'], 404);
        }

        return new SubtopicResource($subtopic);
    }

    /**
     * GET /api/subtopics/{id}/information
     * Contenido teórico del subtema.
     */
    public function information(int $id): AnonymousResourceCollection|JsonResponse
    {
        $subtopic = Subtopic::find($id);

        if (! $subtopic) {
            return response()->json(['message' => 'Subtopic not found.'], 404);
        }

        return InformationResource::collection($subtopic->information);
    }

    /**
     * GET /api/subtopics/{id}/flashcards
     * Flashcards del subtema.
     */
    public function flashcards(int $id): AnonymousResourceCollection|JsonResponse
    {
        $subtopic = Subtopic::find($id);

        if (! $subtopic) {
            return response()->json(['message' => 'Subtopic not found.'], 404);
        }

        return FlashcardResource::collection($subtopic->flashcards);
    }

    /**
     * GET /api/subtopics/{id}/exercises
     * Ejercicios del subtema con sus opciones de respuesta.
     */
    public function exercises(int $id): AnonymousResourceCollection|JsonResponse
    {
        $subtopic = Subtopic::find($id);

        if (! $subtopic) {
            return response()->json(['message' => 'Subtopic not found.'], 404);
        }

        $exercises = $subtopic->exercises()->with('options')->get();

        return ExerciseResource::collection($exercises);
    }

    /**
     * GET /api/subtopics/{id}/questions
     * Preguntas del subtema con sus opciones de respuesta.
     */
    public function questions(int $id): AnonymousResourceCollection|JsonResponse
    {
        $subtopic = Subtopic::find($id);

        if (! $subtopic) {
            return response()->json(['message' => 'Subtopic not found.'], 404);
        }

        $questions = $subtopic->questions()->with('options')->get();

        return QuestionResource::collection($questions);
    }

    /**
     * GET /api/subtopics/{id}/full
     * Todo el contenido de un subtema en una sola respuesta.
     */
    public function full(int $id): SubtopicResource|JsonResponse
    {
        $subtopic = Subtopic::with([
            'information',
            'flashcards',
            'exercises.options',
            'questions.options',
        ])->find($id);

        if (! $subtopic) {
            return response()->json(['message' => 'Subtopic not found.'], 404);
        }

        return new SubtopicResource($subtopic);
    }
}
