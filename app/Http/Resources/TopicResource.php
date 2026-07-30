<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id_topic,
            'name'        => $this->name_topic,
            'description' => $this->description,
            'subtopics'   => SubtopicResource::collection($this->whenLoaded('subtopics')),
        ];
    }
}
