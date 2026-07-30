<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TopicResource;
use App\Http\Resources\SubtopicResource;
use App\Models\Topic;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TopicController extends Controller
{
    /**
     * GET /api/topics
     * Lista todos los temas de programación.
     */
    public function index(): AnonymousResourceCollection
    {
        $topics = Topic::orderBy('id_topic')->get();

        return TopicResource::collection($topics);
    }

    /**
     * GET /api/topics/{id}
     * Detalle de un tema.
     */
    public function show(int $id): TopicResource|JsonResponse
    {
        $topic = Topic::find($id);

        if (! $topic) {
            return response()->json(['message' => 'Topic not found.'], 404);
        }

        return new TopicResource($topic);
    }

    /**
     * GET /api/topics/{id}/subtopics
     * Lista los subtemas de un tema.
     */
    public function subtopics(int $id): AnonymousResourceCollection|JsonResponse
    {
        $topic = Topic::find($id);

        if (! $topic) {
            return response()->json(['message' => 'Topic not found.'], 404);
        }

        $subtopics = $topic->subtopics()->orderBy('id_subtopic')->get();

        return SubtopicResource::collection($subtopics);
    }

    /**
     * GET /api/topics/{id}/full
     * Tema completo con todos sus subtemas y contenido.
     */
    public function full(int $id): TopicResource|JsonResponse
    {
        $topic = Topic::with([
            'subtopics.information',
            'subtopics.flashcards',
            'subtopics.exercises.options',
            'subtopics.questions.options',
        ])->find($id);

        if (! $topic) {
            return response()->json(['message' => 'Topic not found.'], 404);
        }

        return new TopicResource($topic);
    }
}
