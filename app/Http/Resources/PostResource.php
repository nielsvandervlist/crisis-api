<?php

namespace App\Http\Resources;

use App\Clients\Spaces;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'online' => $this->online,
            'thumbnail' => Spaces::url($this->thumbnail),
            'description' => $this->description,
            'post_type_id' => $this->post_type_id,
            'updated_at' => $this->updated_at
        ];
    }
}
