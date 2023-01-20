<?php

namespace App\Http\Resources;

use App\Clients\Spaces;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->url,
            'crisis_id' => $this->crisis_id,
            'user_id' => $this->crisis_id,
            'inserted' => $this->inserted,
        ];
    }
}
