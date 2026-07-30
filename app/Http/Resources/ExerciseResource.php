<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'      => $this->id_exercise,
            'title'   => $this->tittle_excersice,
            'content' => $this->content_excercise,
            'type'    => $this->type,
            'options' => ExerciseOptionResource::collection($this->whenLoaded('options')),
        ];
    }
}
