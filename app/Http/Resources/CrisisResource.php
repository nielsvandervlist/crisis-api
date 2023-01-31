<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CrisisResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            $this->mergeWhen($request->get('company'), function () use ($request) {
                return [
                    'company' => $this->company,
                ];
            }),
            $this->mergeWhen($request->get('participants'), function () use ($request) {
                return [
                    'participants' => $this->company->participants,
                ];
            }),
            $this->mergeWhen($request->get('timeline'), function () use ($request) {
                return [
                    'timeline' => [
                        'data' => $this->timeline,
                    ]
                ];
            }),
            $this->mergeWhen($request->get('guest'), function () use ($request) {
                return [
                    'posts' => $this->timeline->timelinePosts,
                ];
            }),
        ];
    }
}
