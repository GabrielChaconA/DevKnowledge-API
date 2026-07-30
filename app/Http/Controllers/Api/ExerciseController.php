<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExerciseResource;
use App\Models\Exercise;
use Illuminate\Http\JsonResponse;

class ExerciseController extends Controller
{
    /**
     * GET /api/exercises/{id}
     * Ejercicio individual con sus opciones de respuesta.
     */
    public function show(int $id): ExerciseResource|JsonResponse
    {
        $exercise = Exercise::with('options')->find($id);

        if (! $exercise) {
            return response()->json(['message' => 'Exercise not found.'], 404);
        }

        return new ExerciseResource($exercise);
    }
}
