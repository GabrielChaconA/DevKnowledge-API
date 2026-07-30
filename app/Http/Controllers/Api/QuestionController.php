<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
    /**
     * GET /api/questions/{id}
     * Pregunta individual con sus opciones de respuesta.
     */
    public function show(int $id): QuestionResource|JsonResponse
    {
        $question = Question::with('options')->find($id);

        if (! $question) {
            return response()->json(['message' => 'Question not found.'], 404);
        }

        return new QuestionResource($question);
    }
}
