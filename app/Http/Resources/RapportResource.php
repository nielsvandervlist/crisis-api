<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RapportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'reaction_score' => $this->reaction_score,
            'sharing_score' => $this->sharing_score,
            'content_score' => $this->content_score,
            'crisis_id' => $this->crisis_id,

        ];
    }
}
