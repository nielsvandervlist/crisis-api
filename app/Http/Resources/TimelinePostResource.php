<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimelinePostResource extends JsonResource
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
            'time' => $this->time,
            'online' => $this->online,
            'post_id' => $this->post_id,
            'timeline_id' => $this->timeline_id,
            $this->mergeWhen($request->get('post'), function () use ($request) {
                return [
                    'post' => $this->post,
                ];
            })
        ];
    }
}
