<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionOptionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id_question_option,
            'text'       => $this->texto_options,
            'is_correct' => (bool) $this->is_correct,
        ];
    }
}
