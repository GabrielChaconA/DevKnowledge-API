<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FlashcardResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'    => $this->id_flashcards,
            'front' => $this->front,
            'back'  => $this->back,
        ];
    }
}
