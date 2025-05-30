<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProjectResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'project_id' => $this->project_id,
            'reviewer' => [
                'id' => $this->reviewer_id,
                'type' => $this->reviewer_type,
                'data' => $this->whenLoaded('reviewer')
            ],
            'reviewed' => [
                'id' => $this->reviewed_id,
                'type' => $this->reviewed_type,
                'data' => $this->whenLoaded('reviewed')
            ],
            'rating' => $this->rating,
            'rating_description' => $this->rating_description,
            'comments' => $this->comments,
            'project' => $this->whenLoaded('project', function () {
                return new ProjectResource($this->project);
            }),
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
            'created_at_human' => $this->created_at?->diffForHumans(),
        ];

    }
}
