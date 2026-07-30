<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InformationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'      => $this->id_infomation,
            'title'   => $this->title_info,
            'content' => $this->content_info,
            'type'    => $this->type_info,
        ];
    }
}
