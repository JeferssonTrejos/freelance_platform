<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class SkillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->_id,
            'name' => $this->name,
            'category' => $this->category ?? null,

            'projects' => $this->whenLoaded('projects'),
            'freelancers' => $this->whenLoaded('freelancers'),
        ];
    }
}
