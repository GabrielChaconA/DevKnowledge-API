<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseOptionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id_exercise_options,
            'text'       => $this->text_excercise,
            'is_correct' => (bool) $this->is_correct,
        ];
    }
}
