<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubtopicResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id_subtopic,
            'name'         => $this->name_subtopic,
            'level'        => $this->level_subtopic,
            'information'  => InformationResource::collection($this->whenLoaded('information')),
            'flashcards'   => FlashcardResource::collection($this->whenLoaded('flashcards')),
            'exercises'    => ExerciseResource::collection($this->whenLoaded('exercises')),
            'questions'    => QuestionResource::collection($this->whenLoaded('questions')),
        ];
    }
}
